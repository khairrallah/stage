<?php

namespace App\Http\Controllers;
use App\Models\agence;
use Illuminate\Http\Request;

class agencecontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agences = agence::latest()->paginate(5);

        return view('agence.index',compact('agences'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('agence.create');
    }
    public function create1()
    {
        $agences = Agence::all();

        return view('gestionaire.create',compact('agences'));
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
            'agencename' => 'required',
            'agenceadresse' => 'required',
        ]);

        agence::create($request->all());

        return redirect()->route('agence.index')
                        ->with('success','agence created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agences = agence::where('id',$id)->first();

        // dd($agence);
        return view('agence.show',compact('agences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agences = agence::where('id',$id)->first();
        return view('agence.edit',compact('agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'agencename' => 'required',
            'agenceadresse' => 'required',
        ]);
        $agences = agence::where('id',$id)->first();
        $agences->update($request->all());

        return redirect()->route('agence.index')
                        ->with('success','agence updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agences = agence::where('id',$id)->first();
        $agences->delete();

        return redirect()->route('agence.index')
                        ->with('success','agence deleted successfully');
    }

}
