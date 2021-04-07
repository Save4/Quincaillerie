@extends('layouts.layout')
@section('content')
@section('title', 'Categories | ' . config('app.name'))

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-head">
                        <h4 style="float: left">Ajouter une categorie</h4>
                        <a href="" style="float: right" class="btn btn-primary" data-toggle="modal"
                            data-target="#addcategorie">
                            <i class="fa fa-plus"></i>Ajoute d'une categorie</a>
                    </div>
                    <div class="card-body">
                        <table id="default-datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Categorie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $categorie)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $categorie->nom_categorie }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#editcategorie{{ $categorie->id }}"><i
                                                        class="fa fa-edit"></i>Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deletecategorie{{ $categorie->id }}"><i
                                                        class="fa fa-trash"></i>Delete</a>
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
<div class="modal right fade" id="addcategorie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="staticBackdropLabel">Ajouter une categorie</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Categorie</label>
                        <input type="text" name="nom_categorie" id="" class="form-control" placeholder="categorie"
                            aria-describedby="helpId">
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

<div class="modal right fade" id="editcategorie{{ $categorie->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="staticBackdropLabel">Modifier la categorie</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Categorie</label>
                        <input type="text" name="nom_categorie" id="" value="{{ $categorie->nom_categorie }}"
                            class="form-control" placeholder="" aria-describedby="helpId">
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

<div class="modal right fade" id="deletecategorie{{ $categorie->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="staticBackdropLabel">Supprimer categorie</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <p>Tu es sur de vouloir supprimer  {{ $categorie->nom_categorie }} ?</p>
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
