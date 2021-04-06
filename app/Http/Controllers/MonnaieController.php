<?php

namespace App\Http\Controllers;

use App\Models\Monnaie;
use Illuminate\Http\Request;

class MonnaieController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:monnaie-list|monnaie-create|monnaie-edit|monnaie-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:monnaie-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:monnaie-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:monnaie-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monnaies = Monnaie::all();
        return view('monnaies.index', ['monnaies' => $monnaies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nom_monnaie' => ['required',  'max:255', 'string', 'unique:monnaies,nom_monnaie']
        ]);
        Monnaie::create($request->all());
        return redirect()->back()->with('success', 'Enregistrement reussie avec succees!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monnaie  $monnaie
     * @return \Illuminate\Http\Response
     */
    public function show(Monnaie $monnaie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monnaie  $monnaie
     * @return \Illuminate\Http\Response
     */
    public function edit(Monnaie $monnaie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monnaie  $monnaie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monnaie $monnaie)
    {
        $request->validate([
            'nom_monnaie' => ['required',  'max:255', 'string', 'unique:monnaies,nom_monnaie']
        ]);
        $monnaie->update($request->all());
        return redirect()->back()->with('success', 'Modification reussie avec succees!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monnaie  $monnaie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monnaie $monnaie)
    {
        $monnaie->delete();
        return redirect()->back()->with('success','Suppression reussie avec succees!!!');
    }
}
