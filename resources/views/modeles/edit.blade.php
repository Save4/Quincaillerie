@extends('layouts.layout')

@section('content')

@section('title', 'Produits | ' . config('app.name'))


    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <!-- <h4 class="page-title">Form Bordered</h4> -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('modeles') }}">Modeles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier le modele</li>
                </ol>
            </div>

        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="/modeles/{{ $modele->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="form-header text-uppercase">
                                <i class="fa fa-user-circle-o"></i>
                                Modifier le modele
                            </h4>

                            <div class="form-group row">

                                <label for="input-1" class="col-sm-2 col-form-label"> Categorie</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="categorie_id" id="categorie_id">
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}" {!! $modele->categorie_id == $categorie->id
                                                ? 'selected="selected"' : '' !!}>
                                                {{ $categorie->nom_categorie }}</option>
                                        @endforeach
                                        @error('categorie_id')
                                            <code> {{ $message }}</code>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="input-1" class="col-sm-2 col-form-label">Marque</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="marque_id" id="marque_id">
                                        @foreach ($marques as $marque)
                                             <option value="{{ $marque->id }}" {!! $modele->marque_id == $marque->id
                                                ? 'selected="selected"' : '' !!}>
                                                {{ $marque->nom_marque }}</option>
                                        @endforeach
                                        @error('marque_id')
                                            <code> {{ $message }}</code>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-1" class="col-sm-2 col-form-label">Modele</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nom_modele" value="{{ $modele->nom_modele }}"
                                        class="form-control" id="input-1">
                                    @error('nom_modele')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-footer">
                                <a href="{{url('modeles')}}"> <button type="button" class="btn btn-primary shadow-primary m-1"><i class="fa fa-backward"></i>
                                    Retour</button></a>                                
                                    <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                    REINITIALISER</button>
                                <button type="submit" onclick="return confirm('Voulez vous modifier le produit ?')"
                                    class="btn btn-success shadow-success m-1"><i class="fa fa-check-square-o"></i>
                                    MODIFIER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
@endsection
