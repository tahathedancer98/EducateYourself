@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Modifier un chapitre</h1>
        <form method="post" action="{{route('chapitreUpdate', $chapitre->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nom du chapitre</label>
                <input type="text" class="form-control" name="name" value="{{$chapitre->name}}">
            </div>
            <div class="form-group">
                <label>Contenu du chapitre</label>
                <textarea name="detailsChapitre" class="form-control" rows="5" >{{$chapitre->detailsChapitre}}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
        <a
            href="{{route('chapitresList')}}"
            class="btn btn-primary"
        >Retourner à la liste des chapitres</a>
    </div>
@endsection
