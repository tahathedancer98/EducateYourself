@extends('layouts.layout')

@section('content')

    <h1>La liste des formations : </h1>
    @if(\Illuminate\Support\Facades\Auth::check())
        <a href="#" class="btn btn-primary">Ajouter</a>
    @endif
    {{--sizeof($formations)--}}
    @if(1 > 0)
        <div class="row">

            @foreach($formations as $formation)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{$formation->image}}"
                             class="card-img-top"
                             height="200"
                             style="object-fit: cover"
                        />
                        <div class="card-body">
                            <h5 class="card-title">{{$formation->nom}}</h5>
                            <p>{{$formation->prix}} €</p>
                            <p>écrit par ...{{--$formation->user->firstname--}}</p>
                            <h6>Catégories :</h6>
                            <div>
                                {{--
                                @foreach($formations->categories as $category)
                                    <span>{{$category->content}}</span>
                                @endforeach
                                --}}
                            </div>
                            <div class="d-flex">
                                <a href="#" class="btn btn-primary">Détails</a>
                                {{--
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <form method="post" action="{{route('postDelete', $post->id)}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                @endif
                                --}}
                            </div>
                        </div>d
                    </div>
                </div>
            @endforeach
        </div>

    @else

    @endif

@endsection
