<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{    
     function __construct()
    {
         $this->middleware('permission:marque-list|marque-create|marque-edit|marque-delete', ['only' => ['index','show']]);
         $this->middleware('permission:marque-create', ['only' => ['create','store']]);
         $this->middleware('permission:marque-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:marque-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $marques = Marque::all();
        return view('marques.index',[
            'marques' => $marques
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marques.create');
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
            'nom_marque' => ['required',  'max:255','string', 'unique:marques,nom_marque']
            ]);
        $marque = new Marque();
        $marque->nom_marque = $request->nom_marque;
        $marque->save();
        return redirect('marques')->with('status','Enregistrement reussie avec succees!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marque = Marque::find($id);
        return view('marques.edit',[
            'marque' => $marque]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate(['nom_marque' => ['required',  'max:255', 'string', 'unique:marques,nom_marque']
        ]);
        $marque = Marque::find($id);

        $marque->nom_marque = $request->get('nom_marque');

        $marque->save();

        return redirect('marques')->with('status','Modification reussie avec succees!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $id)
    {
       $marque = Marque::find($id);
        $marque->delete();
        return redirect('marques')->with('status','Suppression reussie avec succees!!!');

    }
}
