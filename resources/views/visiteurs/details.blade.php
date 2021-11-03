@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Apprendre : {{$formation->nom}}</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <h5>{{$formation->description}}</h5>
                </div>
                <div class="row">
                    <h5>Chapitres</h5>
                    <div class="col-md-6" style="background-color: #CDBFE2;display: flex ;flex-direction: column;">
                        @foreach($formation->chapitres as $chapitre)
                            <a href="#" style="text-decoration: none;color: teal;margin-top: 0.5em;" class="chapitres">{{$chapitre->name}}</a>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <img class="card-img-top" alt="" src="{{asset("storage/$formation->image")}}">
            </div>
        </div>
        <a
            href="{{route('formationListVisiteurs')}}"
            class="btn btn-primary"
        >Retourner à la liste des formations</a>
    </div>
@endsection
