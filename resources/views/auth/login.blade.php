@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="#" method="" class="row g-3">
                        <h4>Connexion</h4>
                        <hr class="mt-4">
                        <div class="col-12">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="email" required>
                        </div>
                        <div class="col-12">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="mot de passe" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
