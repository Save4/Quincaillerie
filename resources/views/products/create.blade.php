@extends('layouts.layout')
@section('content')
@section('title', 'Produit | ' . config('app.name'))
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-head">
                            <h4 style="float: left">Order Products</h4>
                            <a href="" style="float: right" class="btn btn-primary" data-toggle="modal"
                                data-target="#addproduct">
                                <i class="fa fa-plus"></i>Add new Products</a>
                        </div>
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <table class="table table-bordered table-left">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Categorie</th>
                                            <th>Produit</th>
                                            <th>Description</th>
                                            <th>Marque</th>
                                            <th>Prix</th>
                                            <th>Quantite</th>
                                            <th>Alert du stock</th>
                                            <th>Magasin</th>
                                            <th>Fournisseur</th>
                                            <th>Action</th>
                                            <th> <a href="#" class="btn btn-sm btn-primary rounded-circle add_more"><i
                                                        class="fa fa-plus-circle"></i></a> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="addMoreProduct">
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select name="monnaie_id[]" id="monnaie_id" class="form-control monnaie_id">
                                                    <option value="">Selectionne un monnaie</option>
                                                    @foreach ($monnaies as monnaie)
                                                        <option data-monnaie="{{ $monnaie->nom_monnaie }}"
                                                            value="{{ $monnaie->id }}">{{ $monnaie->nom_monnaie }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="product_name[]" id="product_name"
                                                    class="form-control product_name">
                                            </td>
                                            <td>
                                                <textarea name="description[]" id="description" cols="" rows=""
                                                    class="form-control description"></textarea>
                                            </td>
                                            <td>
                                                <input type="text" name="brand[]" id="brand" class="form-control brand">
                                            </td>
                                            <td>
                                                <input type="number" name="price[]" id="price" class="form-control price">
                                            </td>
                                            <td>
                                                <input type="number" name="quantity[]" id="quantity"
                                                    class="form-control quantity">
                                            </td>
                                            <td>
                                                <select name="magasin_id[]" id="magasin_id" class="form-control magasin_id">
                                                    <option value="">Selectectionne magasin</option>
                                                    @foreach ($magasins as $magasin)
                                                        <option data-magasin="{{ $magasin->nom_magasin }}"
                                                            value="{{ $magasin->id }}">{{ $magasin->nom_magasin }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="fournisseur_id[]" id="fournisseur_id" class="form-control fournisseur_id">
                                                    <option value="">Selectionne un fournisseur</option>
                                                    @foreach ($fournisseurs as $fournisseur)
                                                        <option data-nom_fournisseur="{{ $fournisseur->nom_fournisseur }}"
                                                            value="{{ $fournisseur->id }}">{{ $fournisseur->nom_fournisseur }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="unite_id[]" id="unite_id" class="form-control unite_id">
                                                    <option value="">Selectionne unite</option>
                                                    @foreach ($unites as $unite)
                                                        <option data-nom_unite="{{ $unite->nom_unite }}"
                                                            value="{{ $unite->id }}">{{ $unite->nom_unite}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="total_amount[]" id="total"
                                                    class="form-control total_amount">
                                            </td>
                                            <td><a href="#" class="btn btn-sm btn-danger delete rounded-circle"><i
                                                        class="fa fa-times-circle"></i></a></td>

                                        </tr>
                                    </tbody>
                                    <tfoot>hi</tfoot>

                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
