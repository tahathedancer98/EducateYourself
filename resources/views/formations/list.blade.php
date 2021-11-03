@extends('layouts.layout')

@section('content')

    @if(sizeof($formations) && \Illuminate\Support\Facades\Auth::check())
        <div class="row" style="margin:5em;">
            <div class="col-md-6">
                <div class="card">

                    <h1 style="color: darkolivegreen">Toutes les formations</h1>
                    <p>Découvrez un domaine spécifique à travers une formation détaillée qui vous guidera dans votre apprentissage.</p>
                    <a href="{{route('formationAdd')}}" class="btn btn-primary">Ajouter une nouvelle formation</a>
                    <img src="{{asset('storage/educate.png')}}"
                         class="card-img-top"
                         height="280"
                         style="object-fit: cover"
                    >
                </div>
            </div>
            <div class="col-md-6">
                Recherche :
            </div>
            @foreach($formations as $formation)
                <div class="col-md-4">
                        <div class="card" id="listCards">
                            <a href="{{route('formationDetails', $formation->id)}}" style="text-decoration:none;">
                                <img src="{{asset("storage/$formation->image")}}"
                                     class="card-img-top"
                                     height="200"
                                     style="object-fit: cover"
                                />
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#E8D5B5;">{{$formation->nom}}</h5>
                                    <p class="card-text" style="color:#AFA8BA;">{{$formation->prix}} €</p>
                                    <h6 class="card-title" style="color:#DEEEF3;">Catégories</h6>
                                    <div>
                                        @foreach($formation->categories as $categorie)
                                            <span style="color:#AFA8BA;"> {{$categorie->name}} /</span>
                                        @endforeach
                                    </div>
                                    <span style="color:#DEEEF3;">{{count($formation->chapitres)}} Chapitre(s)</span>
                                    <div class="d-flex">
                                        <form method="post" action="{{route('formationDelete', $formation->id)}}" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>
            @endforeach
        </div>

    @else

    @endif

@endsection
