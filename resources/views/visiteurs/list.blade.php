@extends('layouts.layout')

@section('content')

    @if(sizeof($formations))
        <div class="row" style="margin:5em;">
            <div class="col-md-6">
                <div class="card">
                    <h1 style="color: darkolivegreen">Toutes les formations</h1>
                    <p>Découvrez un domaine spécifique à travers une formation détaillée qui vous guidera dans votre apprentissage.</p>
                    <img src="{{asset('storage/educate.png')}}"
                         class="card-img-top"
                         height="280"
                         style="object-fit: cover"
                    >
                </div>
            </div>
            <div class="col-md-6">
                <div class="header" id="headerVisiteurs">
                    <p>Apprenez GRATUITEMENT.</p>
                </div>
                <div>
                    <a href="{{route('recherche')}}" class="btn btn-success">Rechercher des formations</a>
                </div>
            </div>
        </div>
        <div class="row" style="margin:5em;">

            @if(!empty($recherche))
                <div class="row"><div class="offset-md-6 col-md-4">{{$recherche}}</div></div>
                <div class="row">
                    <div class="offset-md-6 col-md-4">
                        <a
                            href="{{route('formationListVisiteurs')}}"
                            class="btn btn-primary"
                        >Retourner à la liste des formations</a>
                    </div>
                </div>
            @endif
            @foreach($formations as $formation)
                <div class="col-md-4">
                    <div class="card" id="listCards">
                        <a href="{{route('formationDetailVisiteurs', $formation->id)}}" style="text-decoration:none;">
                            <img class="card-img-top" alt="" src="{{asset("storage/$formation->image")}}" style="object-fit: cover" height="200">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#E8D5B5;">{{$formation->nom}}</h5>
                                <p class="card-text" style="color:#AFA8BA;">{{$formation->presentation}}</p>
                                <h6 class="card-title" style="color:#DEEEF3;">Catégories</h6>
                                <p style="color:#AFA8BA;">-
                                    @foreach($formation->categories as $categorie)
                                        <span>{{$categorie->name}} - </span>
                                    @endforeach
                                </p>
                                <p style="color:#37889F;">{{count($formation->categories)}} Chapitres</p>
                                <div style="color:#CDBFE2;">{{$formation->duree}} heure(s)</div>
                            </div>

                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else

    @endif

@endsection
