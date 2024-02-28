<?php

namespace App\Http\Controllers;
use App\Models\gestionaire;
use App\Models\agence;
use Illuminate\Http\Request;

class gestionairecontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestionaires = gestionaire::latest()->paginate(5);

        return view('gestionaire.index',compact('gestionaires'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Charger toutes les agences pour les afficher dans le formulaire
        $agences = Agence::all();
        return view('gestionaire.create', compact('agences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'gestionairename' => 'required',
        'agence_id' => 'required',
        'gestionairepost' => 'required',
    ]);

    // Création d'un nouvel objet gestionnaire avec les données du formulaire
    $gestionaire = new gestionaire();
    $gestionaire->gestionairename = $request->gestionairename;
    $gestionaire->agence_id = $request->agence_id;
    $gestionaire->gestionairepost = $request->gestionairepost;
    $gestionaire->save();

    return redirect()->route('gestionaire.index')
                    ->with('success', 'Gestionnaire créé avec succès.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gestionaire  $gestionaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gestionaires = gestionaire::where('id',$id)->first();

        // dd($gestionaire);
        return view('gestionaire.show',compact('gestionaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gestionaire  $gestionaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agences = agence::all();
        $gestionaires = gestionaire::where('id',$id)->first();
        return view('gestionaire.edit',compact('gestionaires','agences'));
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

       /* $request->validate([
            'gestionairename' => 'required',
            'gestionairepost' => 'required',
            'agence_id' => 'required',
        ]);*/
        $gestionaires = gestionaire::where('id',$id)->first();
        $gestionaires->update($request->all());

        return redirect()->route('gestionaire.index')
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
        $gestionaires = gestionaire::where('id',$id)->first();
        $gestionaires->delete();

        return redirect()->route('gestionaire.index')
                        ->with('success','gestionaire deleted successfully');
    }
}
