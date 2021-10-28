@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <h5>Demande de création de compte</h5>
                    <hr class="mt-4">

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

                        <button type="submit" class="btn btn-primary">Envoyer la demande</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
