@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="get" action="{{route('rechercheNom')}}">
                    @csrf
                    {{-- Recherche par Nom --}}
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Rechercher par nom</button>
                </form>
            </div>
            <div class="col-md-4">
                <form method="GET" action="{{route('rechercheType')}}">
                    @csrf
                    {{-- Recherche par Type --}}
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Rechercher par Prénom</button>
                </form>
            </div>
            <div class="col-md-4">
                <form method="get" action="{{route('rechercheCategorie')}}">
                    @csrf
                    {{-- Recherche par Catégories --}}
                    <div class="form-group">
                        <label>Catégories</label>
                        <input type="text" class="form-control" name="categorie" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Rechercher par Catégorie</button>
                </form>
            </div>
        </div>
    </div>

@endsection
