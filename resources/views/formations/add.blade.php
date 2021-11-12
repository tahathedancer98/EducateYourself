@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Ajouter une nouvelle formation</h1>
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <div class="col-md-9">
                {{--Form pour modifer cette nouvelle formation --}}
                <form method="post" action="{{route('formationStore')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            {{--Nom--}}
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                            {{--Presentation--}}
                            <div class="form-group">
                                <label>Presentation</label>
                                <textarea name="presentation" class="form-control" rows="3" required ></textarea>
                            </div>
                            {{--Prix--}}
                            <div class="form-group">
                                <label>Prix</label>
                                <input type="text" class="form-control" name="prix" required>
                            </div>
                            {{--Durée--}}
                            <div class="form-group">
                                <label>Durée</label>
                                <input type="text" class="form-control" name="duree" required>
                            </div>
                            {{--Type--}}
                            <div class="form-group">
                                @foreach(['Debutant','Moyen','Expert'] as $type)
                                    <div class="form-radio form-check-inline">
                                        <input type="radio" class="radio" id="type"
                                               name="type"
                                               value="{{$type}}">
                                        <label for="type" class="form-check-label">{{$type}}</label>
                                    </div>
                                @endforeach
                            </div>
                            {{--Description--}}
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5" required ></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{--Catégories--}}
                            <div class="row">
                                <h3>Catégories</h3>
                                @foreach($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="check-{{$category->id}}"
                                               name="checkboxCategories[{{$category->id}}]"
                                               value="{{$category->id}}">
                                        <label for="check-{{$category->id}}" class="form-checek-label">{{$category->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            {{--Chapitres--}}
                            <div class="row">
                                <h3>Chapitres</h3>
                                @foreach($chapitres as $chapitre)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="check-{{$chapitre->id}}"
                                               name="checkboxChapitres[{{$chapitre->id}}]"
                                               value="{{$chapitre->id}}">
                                        <label for="check-{{$chapitre->id}}" class="form-checek-label">{{$chapitre->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" required
                                       name="image"
                                       class="form-control"
                                       accept="image/png, image/jpeg, image/jpg"
                                >
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success col-md-12">Ajouter</button>
                </form>
            </div>
        </div>

        <a
            href="{{route('formationList')}}"
            class="btn btn-primary"
        >Retourner à la liste des formations</a>
    </div>
@endsection
