<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:unite-list|unite-create|unite-edit|unite-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:unite-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:unite-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:unite-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unites = Unite::all();
        return view('unites.index', ['unites' => $unites]);
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
            'nom_unite' => ['required',  'max:255', 'string', 'unique:unites,nom_unite']
        ]);
        Unite::create($request->all());
        return redirect()->back()->with('success', 'Enregistrement reussie avec succees!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function show(Unite $unite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(Unite $unite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unite $unite)
    {
        $request->validate([
            'nom_unite' => ['required',  'max:255', 'string', 'unique:unites,nom_unite']
        ]);
        $unite->update($request->all());
        return redirect()->back()->with('success', 'Modification reussie avec succees!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unite $unite)
    {
        $unite->delete();
        return redirect()->back()->with('success','Suppression reussie avec succees!!!');
    }
}
