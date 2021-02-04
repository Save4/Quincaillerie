@extends('layouts.layout')

@section('content')

  @section('title','Marque | '.config('app.name'))

    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('marques.index') }}">Marques</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editer la marque</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="/marques/{{$marque->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="form-header text-uppercase">
                                <i class="fa fa-user-circle-o"></i>
                                Modifier la marque
                            </h4>
                            <div class="form-group row">
                                <label for="input-1" class="col-sm-2 col-form-label">Nom marque</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nom_marque" value="{{ $marque->nom_marque }}"
                                        class="form-control" id="input-1" required>
                                        @error('nom_marque')
                                        <code> {{ $message }}</code>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-footer">
                               <a href="{{url('marques')}}"> <button type="button" class="btn btn-primary shadow-primary m-1"><i class="fa fa-backward"></i>
                                    Retour</button></a>
                                <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                    Reinitialiser</button>
                                <button type="submit" onclick="return confirm('Voulez vous modifier la marque ?')" class="btn btn-success shadow-success m-1"><i
                                        class="fa fa-check-square-o"></i>
                                    Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
@endsection
