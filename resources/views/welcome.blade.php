@extends('layouts/main')
@section('content')
    @foreach($recipes as $recipe)
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3><a href=" {{ route('recipe', $recipe->url) }} ">{{ $recipe->title }}</a><small>{{ substr($recipe->date, 0, 10) }}</small></h3>
                    <img class="thumbnail" src="https://placehold.it/850x350">
                    <p>{{ $recipe->content }}</p>
                    <div class="callout">
                        <ul class="menu simple">
                            <li><a href="#">Author: {{ $recipe->name }}</a></li>
                            <li><a href="#">Comments: 3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
