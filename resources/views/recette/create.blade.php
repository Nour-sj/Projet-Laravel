@extends('layouts.main')

@section('title','Recette - Create')

@section('content')
    @if (session('successMsg'))
        <div class="alert alert-primary" role="alert" data-mdb-color="primary">
            {{ session('successMsg') }}
        </div>
    @endif

    <h2>Créer une nouvelle recette</h2>

    <form method="POST" action="/admin/recettes/create">
        @csrf
        <div>
            @error('title')
            <p style="color:red">{{$errors->first('title')}}</p>
            @enderror
            <input @error('title') style="border-color:red" @enderror type="text" name="title" placeholder="Titre de la recette" value="{{old('title')}}" required>
        </div>
        <div>
            <textarea name="ingredients" placeholder="Ingrédients de la recette" required></textarea>
            <textarea name="content" placeholder="Contenu de la recette" required></textarea>
            <textarea name="status" placeholder="Status de la recette" required></textarea>
            <textarea name="tags" placeholder="Tapez un mot clé qui permet de retrouver la recette"></textarea>
            <input @error('author_name') style="" @enderror type="text" name="author_name" placeholder="Nom de l'auteur" value="{{old('author_name')}}" required>
        </div>
        <div>
            <button type="submit">Créer la recette</button>
        </div>
    </form>

@endsection
