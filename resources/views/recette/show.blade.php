@extends('layouts.main')

@section('title','Recette - Détails')

@section('content')
    <h2 class="title">{{ $project->title }}</h2>

    <div class="ingrédients">{{ $recette->ingredients }}</div>
    <div class="contenu">{{ $recette->content }}</div>

    <p>
        <a href="/admin/recettes/{{ $recette->id }}/edit">Edit</a>
    </p>
@endsection
