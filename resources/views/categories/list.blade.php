@extends('layouts.layout')

@section('content')

    <div class="container">
        <h1>Les catégories</h1>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 d-flex border border-info" style="margin: 1em;padding: 0.5em;">
                    <div class="form-group">
                        <input type="text" name="content" required class="form-control" value="{{$category->name}}">
                    </div>
                    <form method="post" action="{{route('categorieUpdate', $category->id)}}">
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn btn-warning btn-sm" value="Modifier">
                    </form>
                    <form method="post" action="{{route('categorieDelete', $category->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                    </form>

                </div>
            @endforeach

        </div>

        <a href="{{route('categorieAdd')}}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>

@endsection
