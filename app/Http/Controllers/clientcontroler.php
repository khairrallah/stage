<?php

namespace App\Http\Controllers;
use App\Models\client;
use Illuminate\Http\Request;

class clientcontroler extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $clients = client::latest()->paginate(5);

       return view('client.index',compact('clients'))
           ->with(request()->input('page'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {

       return view('client.create');
   }
   public function create1()
   {
       $client = client::all();

       return view('compte.create',compact('clients'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $valide = $request->validate([

           'clientename'=> 'required',
            'clientadresse'=> 'required',
            'clienttype'=> 'required',
            'codepostal'=> 'required',
            'clientville'=> 'required',
            'numtel'=> 'required',

       ]);

       client::create($valide);

       return redirect()->route('client.index')
                       ->with('success','client created successfully.');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\agence  $agence
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $client = client::where('id',$id)->first();

       // dd($client);
       return view('client.show',compact('clients'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\agence  $agence
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $clients = client::where('id',$id)->first();
       return view('client.edit',compact('clients'));
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
        'clientename'=> 'required',
        'clientadresse'=> 'required',
        'clienttype'=> 'required',
        'codepostal'=> 'required',
        'clientville'=> 'required',
        'numtel'=> 'required',
       ]);
       $client = client::where('id',$id)->first();
       $client->update($request->all());

       return redirect()->route('client.index')
                       ->with('success','client updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\client  $agence
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $client = client::where('id',$id)->first();
       $client->delete();

       return redirect()->route('client.index')
                       ->with('success','client deleted successfully');
   }

}
