<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Facture;
use App\Models\Operation;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        // Récupérer toutes les factures depuis la base de données
        $factures = Facture::all();
        $comptes = Compte::all();
        // Passer les factures à la vue pour les afficher
        return view('facture.index', compact('factures','comptes'));
    }
    public function create()
{
    $comptes = Compte::all();
    return view('facture.create', compact('comptes'));
}
    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'compte_id' => 'required|exists:comptes,id',
            'numero' => 'required|unique:factures',
            'nom_beneficiaire' => 'required',
            'montant' => 'required|numeric|min:0',
            'date_emission' => 'required|date',
        ]);

        // Créer une nouvelle facture avec le champ paye initialisé à false
        $facture = new Facture();
        $facture->compte_id = $request->compte_id;
        $facture->numero = $request->numero;
        $facture->nom_beneficiaire = $request->nom_beneficiaire;
        $facture->montant = $request->montant;
        $facture->date_emission = $request->date_emission;
        $facture->paye = false; // Initialisation du champ paye à false
        $facture->save();

        // Redirection avec un message de succès
        return redirect()->route('facture.index')->with('success', 'La facture a été créée avec succès.');
    }
    public function payerFacture(Request $request, $id)
{
    // Recherche de la facture par son identifiant
    $facture = Facture::findOrFail($id);

    // Recherche du compte associé à la facture
    $compte = Compte::findOrFail($facture->compte_id);

    // Vérification du solde du compte
    if ($compte->solde < $facture->montant) {
        return back()->with('error', 'Solde insuffisant pour payer la facture.');
    }

    // Création de l'opération de paiement de la facture
    Operation::create([
        'compte_id' => $compte->id,
        'operationlibelle' => 'Paiement de facture',
        'operation_date' => now(),
        'montant_debit' => $facture->montant,
    ]);

    // Déduction du montant de la facture du solde du compte
    $compte->solde -= $facture->montant;
    $compte->save();

    // Marquer la facture comme payée
    $facture->paye = true;
    $facture->save();

    return redirect()->route('operation.index')->with('success', 'Facture payée avec succès.');
}
}
