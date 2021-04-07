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
        return view('categories.index', [
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
            'nom_categorie' => ['required',  'max:255', 'string', 'unique:categories,nom_categorie']
        ]);
        Category::create($request->all());
        return redirect()->back()->with('success', 'Enregistrement reussie avec succees!!!');
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
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categorie)
    {
        //
        $request->validate([
            'nom_categorie' => ['required',  'max:255', 'string', 'unique:categories,nom_categorie']
        ]);
        $categorie->update($request->all());
        return redirect()->back()->with('success', 'Modification reussie avec succees!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorie)
    {
        //
        $categorie->delete();
        return redirect()->back()->with('success', 'Suppression reussie avec succees!!!');
    }
}
