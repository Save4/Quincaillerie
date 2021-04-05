<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:categorie-list|categorie-create|categorie-edit|categorie-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:categorie-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:categorie-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:categorie-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        //
        $categories = Category::all();
        return view('categories.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom_categorie' => ['required',  'max:255','string', 'unique:categories,nom_categorie']
            ]);
        $categorie = new Category();
        $categorie->nom_categorie = $request->nom_categorie;
        $categorie->save();
        return redirect('categories')->with('status','Enregistrement reussie avec succees!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $categorie = Category::find($id);
        return view('categories.edit',[
            'categorie' => $categorie
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(['nom_categorie' => ['required',  'max:255', 'string', 'unique:categories,nom_categorie']
        ]);
        $categorie = Category::find($id);

        $categorie->nom_categorie = $request->get('nom_categorie');

        $categorie->save();

        return redirect('categories')->with('status','Modification reussie avec succees!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $categorie = Category::find($id);
        $categorie->delete();
        return redirect('categories')->with('status','Suppression reussie avec succees!!!');
    }
}
