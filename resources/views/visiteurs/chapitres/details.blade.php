@extends('layouts.layout')

@section('content')
    @if(session('alert'))
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        </div>
    @endif
    <div class="container" style="background-color: #1a202c;color: white;">
        <div class="row">
            <div class="col-md-9">
                <h3 style="color: #CDBFE2">{{$formation->nom}} (<span style="color: #74D8C3">Chapitre {{$chapitre->id}}</span>)</h3>

                <div class="row">
                    <div class="row">
                        <div class="col-md-9" style="padding:1em;color:black;background-color: white;border:1px solid #CDBFE2">
                            <h6 style="color: #74D8C3;">Contenue du chapitre</h6>
                            <hr class="mt-4">
                            {{$chapitre->detailsChapitre}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img class="card-img-top"
                     alt="Image de la formation"
                     src="{{asset("storage/$formation->image")}}"
                     height="260"
                     style="object-fit: cover"
                >
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <a
                    href="{{route('formationChapitreVisiteurs', [$formation->id,$chapitre->id+1])}}"
                    class="btn btn-success"
                >Suivant</a>
            </div>
            <div class="col-md-3">
                <a
                    href="{{route('formationDetailVisiteurs', $formation->id)}}"
                    class="btn btn-primary"
                >Retourner à la formation</a>
            </div>
        </div>
    </div>
@endsection
