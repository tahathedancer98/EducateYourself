@extends('layouts.layout')

@section('content')
    <div class="container" style="background-color: #1a202c;color: white;">
        <div class="row">
            <div class="col-md-12" >
                <h1>Apprendre : {{$formation->nom}}</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row" style="margin: 1em;">
                            <div class="col-md-6">
                                <h3 style="color: #CDBFE2">Présentation<br></h3>
                                <span>{{$formation->presentation}}</span>
                            </div>
                        </div>
                        <div class="row" style="margin: 1em;">
                            @if(count($categories) > 0)
                                <div class="row">
                                    <div class="col-md-5">
                                        <span style="color: #CDBFE2">Catégories </span>:
                                        @foreach($categories as $category)
                                            <label class="form-checek-label"> {{$category->name}},</label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row" style="margin: 1em;">
                            <div class="col-md-5">
                                <span style="color: #CDBFE2">Type </span>: {{$formation->type}}
                            </div>
                        </div>
                        <div class="row" style="margin: 1em;">
                            <h3 style="color: #CDBFE2">Description</h3>
                            <div>
                                {{$formation->description}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6" style="">
                                <h3 style="color: #CDBFE2">Chapitres</h3>
                                <div style="display: flex;flex-direction: column;align-items: flex-start;border: 0.4px solid #CDBFE2;">
                                    @if(count($formation->chapitres) > 0)
                                        @foreach($formation->chapitres as $index => $chapitre)
                                            <a href="{{route('formationChapitreVisiteurs',[$formation->id,$index])}}" style="text-decoration: none" id="chapitre">{{$index+1}} : {{$chapitre->name}}</a>
                                        @endforeach
                                    @else
                                        <div>Il n'existe pas de chapitres dans cette formation pour le moment.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    @if(count($formation->chapitres) > 0)
                        <a href="{{route('formationChapitreVisiteurs',[$formation->id,'0'])}}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                                <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                            </svg>
                            Commencer
                        </a>
                    @endif
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <a
                    href="{{route('formationListVisiteurs')}}"
                    class="btn btn-primary"
                >Retourner à la liste des formations</a>
            </div>
        </div>
    </div>
@endsection
