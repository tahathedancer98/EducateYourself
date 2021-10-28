@extends('layouts.layout')

@section('content')

    {{--sizeof($formations)--}}
    @if(1 > 0)
        <div class="row" style="margin:5em;">
            <div class="col-md-6">
                <div class="card">

                    <h1 style="color: darkolivegreen">Toutes les formations</h1>
                    <p>Découvrez un domaine spécifique à travers une formation détaillée qui vous guidera dans votre apprentissage.</p>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="{{route('formationAdd')}}" class="btn btn-primary">Ajouter une nouvelle formation</a>
                    @endif
                    <img src="{{asset('storage/educate.png')}}"
                         class="card-img-top"
                         height="280"
                         style="object-fit: cover"
                    >
                </div>
            </div>
            <div class="col-md-6">
                Recherche :
                <form method="get" action="{{route('formationDetailsNOM', 'Repellat ipsam qui veniam delectus.')}}"
                      enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" required name="nom" class="form-control" >
                        <button type="submit" class="btn btn-secondary">Valider</button>
                    </div>
                </form>
            </div>
            @foreach($formations as $formation)
                <div class="col-md-4">
                        <div class="card">
                            <img src="{{asset("storage/$formation->image")}}"
                                 class="card-img-top"
                                 height="200"
                                 style="object-fit: cover"
                            />
                            <div class="card-body">
                                <a href="{{route('formationDetails', $formation->id)}}" style="text-decoration:none; color: darkolivegreen; ">
                                    <h5 class="card-title">{{$formation->nom}}</h5>
                                </a>
                                <p>{{$formation->prix}} €</p>
                                <h6>Catégories :</h6>
                                <div>
                                    @foreach($formation->categories as $categorie)
                                        <span>{{$categorie->name}}</span>
                                    @endforeach
                                </div>
                                <h6>Chapitres :</h6>
                                <div>
                                    @foreach($formation->chapitres as $chapitre)
                                        <span>{{$chapitre->name}}</span>
                                    @endforeach
                                </div>
                                {{--
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary">Détails</a>

                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        <form method="post" action="{{route('postDelete', $post->id)}}" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                        </form>
                                    @endif

                                </div>
                                --}}
                            </div>
                        </div>
                </div>
            @endforeach
        </div>

    @else

    @endif

@endsection
