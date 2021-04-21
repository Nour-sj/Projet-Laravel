@extends('layouts.main')

@section('title','Recette - Create')

@section('content')

    <!----------------------------------------------------------------------------------------------------------------->
    <style type="text/css">
        .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #17a2b8;

        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
        border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    </style>
    <!----------------------------------------------------------------------------------------------------------------->


    @if (session('successMsg'))
        <div class="alert alert-primary" role="alert" data-mdb-color="primary">
            {{ session('successMsg') }}
        </div>
    @endif

    <h2>Créer une nouvelle recette</h2>

    <form method="post" action="{{ route('create_recipe') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            @error('title')
            <p style="color:#ff0000">{{$errors->first('title')}}</p>
            @enderror
            <label><h6>Titre</h6></label>
            <input @error('title') @enderror class="form-control form-control-lg" type="text" name="title" placeholder="Titre de la recette" value="{{old('title')}}" required>
        </div>
        <div>
            <label><h6>Nom de l'auteur</h6></label>
            <input class="form-control form-control-lg" type="text" name="author_name" placeholder="Nom de l'auteur..."  required>
        </div>
        <div>
            <label><h6>Ingrédients</h6></label>
            <textarea name="ingredients" class="form-control form-control-lg" placeholder="Ingrédients de la recette" required></textarea>
        </div>
        <br>
        <div>
            <label><h6>Contenu</h6></label>
            <textarea name="content" class="form-control form-control-lg" style="height:200px" placeholder="Contenu de la recette" required></textarea>
        </div>
        <br>
        <div>
            <label>Tags :</label>
            <input type="text" data-role="tagsinput" name="tags" class="form-control">
        </div>
        <br>
        <div>
            <label><h6>Image</h6></label>
            <input type="file" name="image" class="form-control" accept="image/jpg, image/png, image/jpeg">
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Créer la recette</button>
        </div>
    </form>

@endsection
