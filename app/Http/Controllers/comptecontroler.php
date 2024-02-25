<?php

namespace App\Http\Controllers;
use App\Models\agence;
use App\Models\client;
use App\Models\compte;
use App\Models\operation;
use Illuminate\Http\Request;

class comptecontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comptes = compte::latest()->paginate(5);

        return view('compte.index',compact('comptes'))
            ->with(request()->input('page'));
    }
    public function compteoperations($id)
    {
        $operations = Operation::where('compte_id',$id)->get();
        return view('operation.index', compact('operations',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Charger toutes les agences pour les afficher dans le formulaire
        $agences = agence::all();
        $clients = client::all();
        return view('compte.create', compact('agences','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{


    // Création d'un nouvel objet gestionnaire avec les données du formulaire

    $compte = new compte();
    $compte->numcompte = $request->numcompte;
    $compte->typecompte = $request->typecompte;
    $compte->dateouverture = $request->dateouverture;
    $compte->solde = $request->solde;
    $compte->datevalid = $request->datevalid;
    $compte->agence_id = $request->agence_id;
    $compte->client_id = $request->client_id;
    $compte->save();

    return redirect()->route('compte.index')
                    ->with('success', 'compte créé avec succès.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gestionaire  $gestionaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $compte = compte::where('id',$id)->first();
        $agences = agence::all();
        $clients = client::all();
        return view('compte.show',compact('compte','agences','clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gestionaire  $gestionaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compte = compte::where('id',$id)->first();
        $agences = agence::all();
        $clients = client::all();
        return view('compte.edit',compact('compte','agences','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gestionaire  $gestionaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $comptes = compte::where('id',$id)->first();
        $comptes->update($request->all());

        return redirect()->route('compte.index')
                        ->with('success','gestionaire updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gestionaire  $gestionaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comptes = compte::where('id',$id)->first();
        $comptes->delete();

        return redirect()->route('compte.index')
                        ->with('success','compte deleted successfully');
    }
}
