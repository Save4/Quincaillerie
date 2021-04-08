@extends('layouts.layout')
@section('content')
@section('title', 'Fournisseur | ' . config('app.name'))

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-head">
                            <h4 style="float: left">Ajouter un fournisseur</h4>
                            <a href="" style="float: right" class="btn btn-primary" data-toggle="modal"
                                data-target="#addfournisseur">
                                <i class="fa fa-plus"></i>Ajouter un fournisseur</a>
                        </div>
                        <div class="card-body">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fournisseur</th>
                                        <th>Adresse</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fournisseurs as $key => $fournisseur)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $fournisseur->nom_fournisseur }}</td>
                                            <td>{{ $fournisseur->adresse }}</td>
                                            <td>{{ $fournisseur->email }}</td>
                                            <td>{{ $fournisseur->phone }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                        data-target="#editfournisseur{{ $fournisseur->id }}"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#deletefournisseur{{ $fournisseur->id }}"><i
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
    <div class="modal right fade" id="addfournisseur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Ajout d'unite</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fournisseurs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Fournisseur</label>
                            <input type="text" name="nom_fournisseur" id="" class="form-control" placeholder="fournisseur"
                                aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" id="" class="form-control" placeholder="Adresse"
                                aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="email"
                                aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Telephone</label>
                            <input type="text" name="phone" id="" class="form-control" placeholder="Telephone"
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

    <div class="modal right fade" id="editfournisseur{{ $fournisseur->id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Modifier un fournisseur</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Fournisseur</label>
                            <input type="text" name="nom_fournisseur" id="" value="{{ $fournisseur->nom_fournisseur }}"
                                class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" id="" value="{{ $fournisseur->adresse }}"
                                class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" value="{{ $fournisseur->email }}" class="form-control"
                                placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Telephone</label>
                            <input type="text" name="phone" id="" value="{{ $fournisseur->phone }}" class="form-control"
                                placeholder="" aria-describedby="helpId">
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

    <div class="modal right fade" id="deletefournisseur{{ $fournisseur->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Supprimer fournisseur</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <p>Tu es sur de vouloir supprimer {{ $fournisseur->nom_fournisseur }} ?</p>
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
