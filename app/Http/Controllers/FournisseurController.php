<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:fournisseur-list|fournisseur-create|fournisseur-edit|fournisseur-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:fournisseur-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fournisseur-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:fournisseur-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', ['fournisseurs' => $fournisseurs]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_fournisseur' => ['required',  'max:255', 'string', 'unique:fournisseurs,nom_fournisseur']
        ]);
        Fournisseur::create($request->all());
        return redirect()->back()->with('success', 'Enregistrement reussie avec succees!!!');
    }

    public function show(Fournisseur $fournisseur)
    {
        //
    }

    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom_fournisseur' => ['required',  'max:255', 'string', 'unique:fournisseurs,nom_fournisseur'],
            'adresse' => ['required',  'max:255', 'string', 'unique:fournisseurs,adresse'],
            'email' => ['required',  'max:255', 'string', 'unique:fournisseurs,email'],
            'phone' => ['required',  'max:255', 'string', 'unique:fournisseurs,phone']
        ]);
        $fournisseur->update($request->all());
        return redirect()->back()->with('success', 'Modification reussie avec succees!!!');
    }

    
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->back()->with('success','Suppression reussie avec succees!!!');
    }
}
