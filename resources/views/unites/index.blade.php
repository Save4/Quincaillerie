@extends('layouts.layout')
@section('content')
@section('title', 'Unite de mesure | ' . config('app.name'))

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-head">
                            <h4 style="float: left">Ajouter une unite de mesure</h4>
                            <a href="" style="float: right" class="btn btn-primary" data-toggle="modal"
                                data-target="#addunite">
                                <i class="fa fa-plus"></i>Ajout d'unite</a>
                        </div>
                        <div class="card-body">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Unite</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unites as $key => $unite)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $unite->nom_unite }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                        data-target="#editunite{{ $unite->id }}"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#deleteunite{{ $unite->id }}"><i
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
    <div class="modal right fade" id="addunite" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="staticBackdropLabel">Ajout d'unite</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('unites.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Unite</label>
                            <input type="text" name="nom_unite" id="" class="form-control" placeholder="unite"
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

    <div class="modal right fade" id="editunite{{ $unite->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Modifier l'unite</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('unites.update', $unite->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Unite</label>
                            <input type="text" name="nom_unite" id="" value="{{ $unite->nom_unite }}"
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

    <div class="modal right fade" id="deleteunite{{ $unite->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Supprimer unite</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('unites.destroy', $unite->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <p>Tu es sur de vouloir supprimer  {{ $unite->nom_unite }} ?</p>
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
