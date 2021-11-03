@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Ajouter un chapitre</h1>
        <form method="post" action="{{route('chapitresStore')}}">
            @csrf
            <div class="form-group">
                <label>Nom du chapitre</label>
                <input type="text" required class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Contenu du chapitre</label>
                <textarea name="detailsChapitre" class="form-control" rows="5" required ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <a
            href="{{route('chapitresList')}}"
            class="btn btn-secondary"
        >Retourner à la liste des chapitres</a>
    </div>
@endsection
