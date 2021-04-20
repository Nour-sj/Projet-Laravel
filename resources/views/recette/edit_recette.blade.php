@extends('layouts.main')
@section('content')
    <div class="conainer">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert" data-mdb-color="danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="{{ route('edit_update', $recipe->id) }}" method="post">
            {{ csrf_field() }}
            <h1><strong>Editeur recette</strong></h1><br>
            <div class="form-outline">
                <label class="form-label" for="formControlLg">Titre:</label>
                <input type="text" id="formControlLg" name="title" value="{{ $recipe->title }}" class="form-control" />
            </div>

            <div class="form-outline">
                <label class="form-label" for="formControlDefault">Contenu:</label>
                <textarea id="formControlDefault" class="form-control" name="content" value="{{ $recipe->content }}" style="height:200px"></textarea>
            </div>

            <div class="form-outline">
                <label class="form-label" for="formControlSm">Ingrédients:</label>
                <input type="text" id="formControlSm" name="ingredients" value="{{ $recipe->ingredients }}" class="form-control form-control-sm" />
            </div>

            <div class="form-outline">
                <label class="form-label" for="formControlSm">Tags:</label>
                <input type="text" id="formControlSm" name="tags" value="{{ $recipe->tags }}" class="form-control form-control-sm" />
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Soumettre</button>
            </div>
        </form>
    </div>
@endsection
