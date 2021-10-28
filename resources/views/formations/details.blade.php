@extends('layouts.layout')

@section('content')
    <div class="container">
            <h1>Détails de la formation :</h1>
            <div class="row">
                <div class="col-md-6">
                    {{--Form pour modifer cette nouvelle formation --}}
                    <form method="post" action="{{route('formationUpdate', $formation->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="nom" required value="{{$formation->nom}}">
                        </div>
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="text" class="form-control" name="prix" required value="{{$formation->prix}}">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" required value="{{$formation->type}}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="5" required >{{$formation->description}}</textarea>
                        </div>

                        {{--
                        <div>
                            @foreach($categories as $category)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="check-{{$category->id}}"
                                       name="checkboxCategories[{{$category->id}}]"
                                       value="{{$category->id}}"
                                       @if($post->categories->contains('id',$category->id)) checked @endif>
                                <label for="check-{{$category->id}}"
                                       class="form-checek-label">{{$category->content}}</label>
                            </div>
                            @endforeach
                        </div>
                        --}}

                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                    {{--Form pour supprimer cette formation--}}
                    <form method="post" action="{{route('formationDelete', $formation->id)}}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer cette formation</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        {{--Form pour modifier l'image de la formation --}}
                        <form method="post" action="{{route('formationUpdateImage', $formation->id)}}"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" required
                                       name="image"
                                       class="form-control"
                                       accept="image/png, image/jpeg, image/jpg"
                                >
                                <button type="submit" class="btn btn-warning">Modifier l'image</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <h3>Chapitres :</h3>
                    </div>
                    <div class="row">
                        <h3>Catégories :</h3>
                    </div>
                </div>
            </div>

        <a
            href="{{route('formationList')}}"
            class="btn btn-primary"
        >Retourner à la liste des formations</a>
    </div>
@endsection
