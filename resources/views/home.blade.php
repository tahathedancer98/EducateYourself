@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 5em">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                  <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                Apprenez avec <b>EducateYoursef</b> gratuitement.
                            </span>
                        </h1>
                        <div class="row">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="col-md-6">
                                    Bienvenue <span style="color: crimson">{{\Illuminate\Support\Facades\Auth::User()->prenom}}</span>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <a href="{{route('contact')}}">
                                        <button class="btn btn-info">
                                            Demander un compte
                                        </button>
                                    </a>
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="col-md-6">
                                    <a href="{{route('formationList')}}">
                                        <button class="btn btn-light" style="background-color: #e3f2fd;">
                                            Voir les formations
                                        </button>
                                    </a>
                                </div>
                                @else
                                    <div class="col-md-6">
                                        <a href="{{route('formationListVisiteurs')}}">
                                            <button class="btn btn-light" style="background-color: #e3f2fd;">
                                                Voir les formations
                                            </button>
                                        </a>
                                    </div>
                                @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>Développez-vous et améliorez vos compétences dans différentes catégories</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{asset('storage/form.png')}}"
                     class="card-img-top"
                     style="object-fit: cover">
            </div>
        </div>
    </div>

@endsection
