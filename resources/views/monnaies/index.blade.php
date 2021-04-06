@extends('layouts.layout')
@section('content')
@section('title', 'Monnaie | ' . config('app.name'))

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-head">
                            <h4 style="float: left">Ajouter une monnaie</h4>
                            <a href="" style="float: right" class="btn btn-primary" data-toggle="modal"
                                data-target="#addmonnaie">
                                <i class="fa fa-plus"></i>Ajout d'une monnaie</a>
                        </div>
                        <div class="card-body">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Monnaie</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monnaies as $key => $monnaie)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $monnaie->nom_monnaie }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                        data-target="#editmonnaie{{ $monnaie->id }}"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#deletemonnaie{{ $monnaie->id }}"><i
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
    <div class="modal right fade" id="addmonnaie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Ajout d'unite</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('monnaies.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Monnaie</label>
                            <input type="text" name="nom_monnaie" id="" class="form-control" placeholder="monnaie"
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

    <div class="modal right fade" id="editmonnaie{{ $monnaie->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Modifier l'unite</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('monnaies.update', $monnaie->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Unite</label>
                            <input type="text" name="nom_monnaie" id="" value="{{ $monnaie->nom_monnaie }}"
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

    <div class="modal right fade" id="deletemonnaie{{ $monnaie->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Supprimer unite</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('monnaies.destroy', $monnaie->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <p>Tu es sur de vouloir supprimer  {{ $monnaie->nom_monnaie }} ?</p>
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