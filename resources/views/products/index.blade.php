@extends('layouts.layout')
@section('content')
@section('title', 'Produit | ' . config('app.name'))
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-head">
                            <h4 style="float: left">Ajouter un produit</h4>
                            <a href="" style="float: right" class="btn btn-primary" data-toggle="modal"
                                data-target="#addproduct">
                                <i class="fa fa-plus"></i>Add new Products</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-responsive">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Categorie</th>
                                        <th>Produit</th>
                                        <th>Description</th>
                                        <th>Marque</th>
                                        <th>Prix</th>
                                        <th>Quantite</th>
                                        <th>Alert du stock</th>
                                        <th>Magasin</th>
                                        <th>Fournisseur</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->nom_monnaie }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->brand }}</td>
                                            <td>{{ number_format($product->price, 0) }}FraBu</td>
                                            <td>{{ $product->quantity }}{{ $product->nom_unite }}</td>
                                            <td>
                                                @if ($product->alert_stock >= $product->quantity) <span
                                                        class="badge badge-danger">Low Stock >
                                                        {{ $product->alert_stock }}{{ $product->nom_unite }}</span>
                                                @else<span
                                                        class="badge badge-success">{{ $product->alert_stock }}{{ $product->nom_unite }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $product->nom_magasin }}</td>
                                            <td>{{ $product->nom_fournisseur }}</td>
                                            <!-- <td>
                                                    <div class="btn-group">
                                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                            data-target="#editproduct{{ $product->id }}"><i
                                                                class="fa fa-edit"></i>Edit</a>
                                                        <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                                            data-target="#deleteproduct{{ $product->id }}"><i
                                                                class="fa fa-trash"></i>Delete</a>
                                                    </div>
                                                </td>-->
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="" data-toggle="modal"
                                                            data-target="#editproduct{{ $product->id }}"><i
                                                                class="fas fa-pencil-alt m-r-5"></i>
                                                            Modifier</a>
                                                        <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ban_user"><i
                                                                    class="fas fa-user-slash m-r-5"></i> Bloquer</a>-->
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                            data-target="#deleteproduct{{ $product->id }}"><i
                                                                class="fas fa-trash m-r-5"></i> Supprimer</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- modal of adding product -->
    <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Ajouter un produit</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Unite de mesure</label>
                                    <select class="form-control @error('nom_unite') is-danger @enderror" name="unite_id"
                                        id="unite_id"">
                                            <option>Selectionnne unite de mesure</option>
                                             @foreach ($unites as $unite)
                                        <option value="{{ $unite->id }}">{{ $unite->nom_unite }}</option>
                                        @endforeach
                                        @error('unite_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>

                            </div>
                            <div class=" col-sm-6">
                                <div class="form-group">
                                    <label for="">Categorie</label>
                                    <select class="form-control @error('nom_monnaie') is-danger @enderror" name="monnaie_id"
                                        id="monnaie_id"">
                                            <option>Selectionnne la categorie</option>
                                             @foreach ($monnaies as $monnaie)
                                        <option value="{{ $monnaie->id }}">{{ $monnaie->nom_monnaie }}</option>
                                        @endforeach
                                        @error('monnaie_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Magasin</label>
                                    <select class="form-control @error('nom_magasin') is-danger @enderror" name="magasin_id"
                                        id="magasin_id"">
                                            <option>Selectionnne le magasin</option>
                                             @foreach ($magasins as $magasin)
                                        <option value="{{ $magasin->id }}">{{ $magasin->nom_magasin }}</option>
                                        @endforeach
                                        @error('magasin_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>

                            </div>
                            <div class=" col-sm-6">
                                <div class="form-group">
                                    <label for="">Fournisseur</label>
                                    <select class="form-control @error('nom_fournisseur') is-danger @enderror"
                                        name="fournisseur_id" id="fournisseur_id"">
                                                                            <option>Selectionnne le fournisseur</option>
                                                                                     @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom_fournisseur }}
                                        </option>
                                        @endforeach
                                        @error('fournisseur_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Produit</label>
                                    <input type="text" name="product_name" id=""
                                        class="form-control @error('product_name') is-danger @enderror"
                                        placeholder="Producct" aria-describedby="helpId">
                                    @error('prodact_name')
                                        <div class="alert alert-danger">{{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Alert Stock</label>
                                    <input type="number" class="form-control @error('alert_stock') is-danger @enderror"
                                        name="alert_stock" id="" aria-describedby="HelpId" placeholder="Stock">
                                    @error('alert_stock')
                                        <div class="alert alert-danger">{{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Marque</label>
                                    <input type="text" name="brand" id=""
                                        class="form-control @error('brand') is-danger @enderror" placeholder="Brand"
                                        aria-describedby="helpId">
                                    @error('brand')
                                        <div class="alert alert-danger">{{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Prix</label>
                                    <input type="number" name="price" id=""
                                        class="form-control @error('price') is-danger @enderror" placeholder="price"
                                        aria-describedby="helpId">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantite</label>
                                    <input type="number" class="form-control @error('quantity') is-danger @enderror"
                                        name="quantity" id="" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" cols="30" rows="2"
                                        class="form-control @error('description') is-danger @enderror"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="" name="" id="" class="btn btn-primary btn-block">Enregistre</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- modal of edit product-->

    <div class="modal right fade" id="editproduct{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Modifier un produit</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Unite de mesure</label>
                                    <select class="form-control @error('nom_unite') is-danger @enderror" name="unite_id"
                                        id="unite_id"">
                                        @foreach ($unites as $unite)
                                        <option value="{{ $unite->id }}" {!! $product->unite_id == $unite->id ? 'selected="selected"' : '' !!}>
                                            {{ $unite->nom_unite }}</option>
                                        @endforeach
                                        @error('unite_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                        @error('unite_id')
                                            <code> {{ $message }}</code>
                                        @enderror
                                    </select>
                                </div>

                            </div>
                            <div class=" col-sm-6">
                                <div class="form-group">
                                    <label for="">Categorie</label>
                                    <select class="form-control @error('nom_monnaie') is-danger @enderror" name="monnaie_id"
                                        id="monnaie_id"">
                                                                                     @foreach ($monnaies as $monnaie)
                                        <option value="{{ $monnaie->id }}" {!! $product->monnaie_id == $monnaie->id ? 'selected="selected"' : '' !!}>
                                            {{ $monnaie->nom_monnaie }}</option>
                                        @endforeach
                                        @error('monnaie_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                        @error('monnaie_id')
                                            <code> {{ $message }}</code>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Magasin</label>
                                    <select class="form-control @error('nom_magasin') is-danger @enderror" name="magasin_id"
                                        id="magasin_id">
                                        @foreach ($magasins as $magasin)
                                            <option value="{{ $magasin->id }}" {!! $product->magasin_id == $magasin->id ? 'selected="selected"' : '' !!}>
                                                {{ $magasin->nom_magasin }}</option>
                                        @endforeach
                                        @error('magasin_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>

                            </div>
                            <div class=" col-sm-6">
                                <div class="form-group">
                                    <label for="">Fournisseur</label>
                                    <select class="form-control @error('nom_fournisseur') is-danger @enderror"
                                        name="fournisseur_id" id="fournisseur_id">
                                        @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->id }}" {!! $product->fournisseur_id == $fournisseur->id ? 'selected="selected"' : '' !!}>
                                                {{ $fournisseur->nom_fournisseur }}</option>
                                            </option>
                                        @endforeach
                                        @error('fournisseur_id')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Produit</label>
                                    <input type="text" name="product_name" id="" class="form-control" placeholder=""
                                        aria-describedby="helpId" value="{{ $product->product_name }}">
                                    @error('product_name')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Alert Stock</label>
                                    <input type="number" class="form-control" name="alert_stock" id=""
                                        aria-describedby="HelpId" placeholder="" value="{{ $product->alert_stock }}">
                                    @error('alert_stock')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Marque</label>
                                    <input type="text" name="brand" id="" class="form-control" placeholder=""
                                        value="{{ $product->brand }}" aria-describedby="helpId">
                                    @error('brand')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Prix</label>
                                    <input type="number" name="price" id="" class="form-control" placeholder=""
                                        value="{{ $product->price }}" aria-describedby="helpId">
                                    @error('price')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantite</label>
                                    <input type="number" class="form-control" name="quantity" id="" placeholder=""
                                        value="{{ $product->quantity }}">
                                    @error('quantity')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" cols="30" rows="2"
                                        class="form-control">{{ $product->description }}</textarea>
                                    @error('description')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning btn-block">Modifier</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- modal of delete product-->

    <div class="modal right fade" id="deleteproduct{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Supprimer un produit</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <p>Tu es sur de vouloir supprimer {{ $product->product_name }} ?</p>
                        <div class="modal-footer">
                            <button type="" name="" id="" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="" id="" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
