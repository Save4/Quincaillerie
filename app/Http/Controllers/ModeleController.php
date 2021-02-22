<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Modele;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles = DB::table('modeles')

                   ->join('categories','modeles.categorie_id','categories.id')
                   ->join('marques','modeles.marque_id','marques.id')
                   ->select('categories.*','marques.*','modeles.*')
                   ->get();
        $categories = Categorie::all();
        $marques = Marque::all();
        return view('modeles.index',[
            'modeles' => $modeles,
            'categories' => $categories,

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
        $categories = Categorie::all();
        $marques = Marque::all();
        return view('modeles.create',[
            'categories' => $categories,

            'marques' => $marques
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nom_modele' => ['required','string','max:255','unique:modeles,nom_modele'],
        'categorie_id' => 'required',
        'marque_id' => 'required',
        ]);

        $modele =new Modele();
        $modele->nom_modele = $request->nom_modele;
        $modele->categorie_id = $request->categorie_id;
        $modele->marque_id = $request->marque_id;

        $modele->save();
        return redirect('modeles')->with('status','Enregistrement reussie avec succees!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele $modele)
    {
        $categories = Categorie::all();


        $marques = Marque::all();
        $modele = Modele::find($modele->id);
        return view('modeles.edit',[
            'modele' => $modele,


            'categories' => $categories,

            'marques' => $marques
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modele $modele)
    {
        $request->validate(['nom_modele' => ['required','string','max:255','unique:modeles,nom_modele'],
        'categorie_id' => 'required',
        'marque_id' => 'required',
        ]);

        $modele->nom_modele = $request->nom_modele;

        $modele->categorie_id = $request->categorie_id;

        $modele->marque_id = $request->marque_id;
        $modele->save();
        return redirect('modeles')->with('status','Modification reussie avec succees!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele $modele)
    {
         $modele = modele::find($modele->id);
        $modele->delete();
        return redirect('modeles')->with('status','Suppression reussie avec succees!!');
    }
}
