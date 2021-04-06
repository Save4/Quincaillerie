<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:magasin-list|magasin-create|magasin-edit|magasin-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:magasin-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:magasin-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:magasin-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magasins = Magasin::all();
        return view('magasins.index', ['magasins' => $magasins]);
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
            'nom_magasin' => ['required',  'max:255', 'string', 'unique:magasins,nom_magasin'],
            'phone' => ['required',  'max:255', 'string', 'unique:magasins,phone'],
            'email' => ['required',  'max:255', 'string', 'unique:magasins,email']
        ]);
        Magasin::create($request->all());
        return redirect()->back()->with('success', 'Enregistrement reussie avec succees!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function show(Magasin $magasin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function edit(Magasin $magasin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magasin $magasin)
    {
        $request->validate([
            'nom_magasin' => ['required',  'max:255', 'string', 'unique:magasins,nom_magasin'],
            'phone' => ['required',  'max:255', 'string', 'unique:magasins,phone'],
            'email' => ['required',  'max:255', 'string', 'unique:magasins,email']
        ]);
        $magasin->update($request->all());
        return redirect()->back()->with('success', 'Modification reussie avec succees!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magasin $magasin)
    {
        $magasin->delete();
        return redirect()->back()->with('success', 'Suppression reussie avec succees!!!');
    }
}
