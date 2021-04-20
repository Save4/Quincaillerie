<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Monnaie;
use App\Models\Unite;
use App\Models\Fournisseur;
use App\Models\Magasin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('monnaies', 'products.monnaie_id', 'monnaies.id')
            ->join('unites', 'products.unite_id', 'unites.id')
            ->join('fournisseurs', 'products.fournisseur_id', 'fournisseurs.id')
            ->join('magasins', 'products.magasin_id', 'magasins.id')
            ->select('monnaies.*', 'unites.*', 'fournisseurs.*', 'magasins.*', 'products.*')
            ->get();
        $monnaies = Monnaie::all();
        $unites = Unite::all();
        $fournisseurs = fournisseur::all();
        $magasins = magasin::all();
        return view('products.index', [
            'products' => $products,
            'monnaies' => $monnaies,
            'fournisseurs'=> $fournisseurs,
            'unites' => $unites,
            'magasins'=>$magasins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $monnaies = Monnaie::all();
        $unites = Unite::all();
        $fournisseurs = Fournisseur::all();
        $magasins = Magasin::all();
        return view('products.create', [
            'monnaies' => $monnaies,
            'unites'=> $unites,
            'magasins'=>$magasins,
            'fournisseurs' => $fournisseurs
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
        
        Product::create($request->all());
        return redirect()->back()->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
