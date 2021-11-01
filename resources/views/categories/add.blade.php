@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Ajouter une catégorie</h1>
        <form method="post" action="{{route('categorieStore')}}">
            @csrf
            <div class="form-group">
                <label>Nom de la catégorie</label>
                <input type="text" required class="form-control" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
