@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form method="post" action="{{route('login')}}" class="row g-3">
                        @csrf
                        <h4>Connexion</h4>
                        <hr class="mt-4">
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">Se connecter</button>
                        </div>
                    </form>

                    @if(session('error'))
                        <div class="col-md-4 offset-md-4">
                            <div class="login-form bg-light mt-4 p-4">
                                <div class="alert alert-error" style="background-color: crimson;color: #e3f2fd">
                                    {{ session('error') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
