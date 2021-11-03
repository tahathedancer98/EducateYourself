@extends('layouts.layout')

@section('content')

    <div class="container">
        <h1>Les chapitres</h1>
        <div class="row">
            @foreach($chapitres as $chapitre)
                <div class="col-md-4 d-flex border border-info" style="margin: 1em;padding: 0.5em;">
                    <div class="form-group">
                        <input type="text" name="content" required class="form-control" value="{{$chapitre->name}}">
                    </div>
                    <form method="get" action="{{route('chapitreDetail', $chapitre->id)}}">
                        @csrf
                        <input type="submit" class="btn btn-warning btn-sm" value="Détails">
                    </form>
                    <form method="post" action="{{route('chapitreDelete', $chapitre->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                    </form>

                </div>
            @endforeach

        </div>

        <a href="{{route('chapitresAdd')}}" class="btn btn-primary">Ajouter un chapitre</a>
    </div>

@endsection
