@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Formulaire de demande de création de compte</h2>

        <form method="post" action="{{route('sendMail')}}">
            @csrf
            {{-- Prénom --}}
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control" name="prenom" required>
            </div>
            {{-- Nom --}}
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="nom" required>
            </div>
            {{-- Email --}}
            <div class="form-group">
                Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer le message</button>
        </form>
    </div>
@endsection
