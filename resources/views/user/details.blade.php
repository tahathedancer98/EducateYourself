@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form method="post" action="{{route('editPassword', $user->id)}}" class="row g-3">
                        @csrf
                        @method('PUT')
                        <h4>Mot de passe</h4>
                        <hr class="mt-4">
                        <div class="col-12">
                            <label>Ancien Mot de passe</label>
                            <input type="password" name="old_password" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>Nouveau Mot de passe</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>Confirmer le nouveau Mot de passe</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                @if(session('mdp'))
                    <div class="col-md-4 offset-md-4">
                        <div class="login-form bg-light mt-4 p-4">
                            <div class="alert alert-error" style="background-color: crimson;color: #e3f2fd">
                                {{ session('mdp') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if(session('ok'))
                    <div class="col-md-4 offset-md-4">
                        <div class="login-form bg-light mt-4 p-4">
                            <div class="alert alert-success" style="background-color: #74D8C3;color: #1a202c">
                                {{ session('ok') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if($errors->any())
                    <span class="text-danger">{{$errors->first()}}</span>
                @endif
            </div>
            <div class="col-md-3 ">
                <div class="login-form bg-light mt-4 p-4">
                    <form method="post" action="{{route('editProfil', $user->id)}}" class="row g-3">
                        @csrf
                        @method('PUT')
                        <h4>Profil</h4>
                        <hr class="mt-4">
                        <div class="col-12">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control" required value="{{$user->nom}}">
                        </div>
                        <div class="col-12">
                            <label>Prenom</label>
                            <input type="text" name="prenom" class="form-control" required value="{{$user->prenom}}">
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required value="{{$user->email}}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
