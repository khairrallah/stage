<?php

namespace App\Http\Controllers;

use App\Models\compte;
use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{

    public function index()
    {
        $operations = Operation::all();
        return view('operation.index', compact('operations',));
    }
    public function showDepositForm()
{
    $comptes = Compte::all();
    return view('operation.deposit', compact('comptes'));
}
public function showWithdrawForm()
{
    $comptes = Compte::all();
    return view('operation.withdraw', compact('comptes'));
}
    public function showTransferForm()
    {
        $comptes = compte::all();
        return view('operation.transfer', compact('comptes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'compte_id' => 'required|exists:comptes,id',
            'operationlibelle'=>'required',
            'operation_date' => 'required|date',
            'montant_debit' => 'nullable|numeric',
            'montant_credit' => 'nullable|numeric',
        ]);

        operation::create($request->all());

        return redirect()->route('operation.index')
                        ->with('success', 'Operation created successfully.');
    }
    public function show($id)
    {
        $operation = operation::where('id',$id)->first();

        // dd($gestionaire);
        return view('operation.show',compact('operation'));
    }
    public function edit($id)
    {
        // Trouver l'opération avec l'ID donné
        $comptes = compte::all();
        $operation = Operation::findOrFail($id);

        // Retourner la vue d'édition avec les données de l'opération
        return view('operation.edit', compact('operation','comptes'));
    }
    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $request->validate([
            'compte_id' => 'required|exists:comptes,id',
            'operationlibelle' => 'required|string',
            'operation_date' => 'required|date',
            'montant_debit' => 'nullable|numeric',
            'montant_credit' => 'nullable|numeric',
        ]);

        // Trouver l'opération à mettre à jour
        $operation = Operation::findOrFail($id);

        // Mettre à jour les données de l'opération
        $operation->compte_id = $request->input('compte_id');
        $operation->operationlibelle = $request->input('operationlibelle');
        $operation->operation_date = $request->input('operation_date');
        $operation->montant_debit = $request->input('montant_debit');
        $operation->montant_credit = $request->input('montant_credit');

        // Enregistrer les modifications dans la base de données
        $operation->save();

        // Rediriger avec un message de succès
        return redirect()->route('operation.index', $operation->id)->with('success', 'Opération mise à jour avec succès.');
    }
    public function deposit(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'compte_id' => 'required|exists:comptes,id',
            'montant' => 'required|numeric|min:0',
        ]);

        // Créer une nouvelle opération de dépôt
        Operation::create([
            'compte_id' => $request->input('compte_id'),
            'operationlibelle' => 'depot',
            'operation_date' => now(),
            'montant_credit' => $request->input('montant'),
        ]);

        // Mettre à jour le solde du compte
        $compte_id=$request->input('compte_id');
        $compte = Compte::find($compte_id)->first();
        $depot=$request->input('montant');
        $montant=$compte->solde ;
        $newsolde=$depot+$montant;
        $compte->solde = $newsolde;
        $compte->save();

        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()->route('operation.index')->with('success', 'Dépôt effectué avec succès.');
    }

    public function withdraw(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'compte_id' => 'required|exists:comptes,id',
            'montant' => 'required|numeric|min:0',
        ]);
        $compte_id=$request->input('compte_id');
        // Vérifier si le solde du compte est suffisant pour le retrait
        $compte = Compte::find($compte_id)->first();
        $retrait=$request->input('montant');
        if ($compte->solde < $retrait ) {
            return back()->with('error', 'Solde insuffisant pour effectuer le retrait.');
        }

        // Créer une nouvelle opération de retrait
        Operation::create([
            'compte_id' => $compte_id,
            'operationlibelle' => 'Retrait',
            'operation_date' => now(),
            'montant_debit' => $retrait,
        ]);

        // Mettre à jour le solde du compte
        $montant=$compte->solde ;
        $newsolde=$montant-$retrait;
        $compte->solde = $newsolde;
        $compte->save();

        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()->route('operation.index')->with('success', 'Retrait effectué avec succès.');
    }

    public function transfer(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'source_compte_id' => 'required|exists:comptes,id',
            'destination_compte_id' => 'required|exists:comptes,id',
            'montant' => 'required|numeric|min:0',
        ]);

        // Vérifier si le solde du compte source est suffisant pour le transfert
        $source_id=$request->input('source_compte_id');
        $sourceCompte = Compte::find($source_id)->first();
        $montant=$request->input('montant');
        if ($sourceCompte->solde < $montant) {
            return back()->with('error', 'Solde insuffisant pour effectuer le transfert.');
        }

        // Créer une nouvelle opération de transfert sortant
        Operation::create([
            'compte_id' => $source_id,
            'operationlibelle' => 'Transfert sortant',
            'operation_date' => now(),
            'montant_debit' => $montant,
        ]);
       $destination_id= $request->input('destination_compte_id');
        // Créer une nouvelle opération de transfert entrant
        Operation::create([
            'compte_id' => $destination_id,
            'operationlibelle' => 'Transfert entrant',
            'operation_date' => now(),
            'montant_credit' => $montant,
        ]);

        // Mettre à jour les soldes des comptes source et destination
        $sourcesolde=$sourceCompte->solde;
        $withdraw=$sourcesolde-$montant;
        $sourceCompte->solde = $withdraw;

        $destinationCompte = Compte::where('id',$destination_id)->first();
        $solde=$destinationCompte->solde;
        $newsolde= $solde+$montant;
        $destinationCompte->solde = $newsolde;
        $destinationCompte->save();
        $sourceCompte->save();


        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()->route('operation.index')->with('success', 'Transfert effectué avec succès.');
    }
}



