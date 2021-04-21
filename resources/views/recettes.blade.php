@extends('layouts.main')
@section('content')
    @if ($url == null)
        @foreach($recipes as $recipe)
            <div class="grid-x align-center">
                <div class="cell medium-8">
                    <div class="blog-post">
                        <h3><a href=" {{ url('recettes/'.$recipe->url.'/') }} ">{{ $recipe->title }}</a></h3>
                        <h3><small>{{ substr($recipe->date, 0, 10) }}</small></h3>
                        <img class="thumbnail" src="../media/images/{{$recipe->image}}" width="100%">
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
        <span>
        {{ $recipes->links() }}
        </span>
    @else
        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="blog-post">
                    <h3><a href=" {{ route('recipe', $recipe->url) }} ">{{ $recipe->title }}</a></h3>
                    <h3><small>{{ substr($recipe->date, 0, 10) }}</small></h3>
                    <img class="thumbnail" src="../media/images/{{$recipe->image}}" width="100%">
                    <p>{{ $recipe->content }}</p>
                    <div class="callout">
                        <ul class="menu simple">
                            <li><a href="#">Author: {{ $author->name }}</a></li>
                            <li><a href="#">Comments: 3</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!------------------------------------------------------------------------------------------------------------->
            <!-----------------------------------------Section des commentaires-------------------------------------------->
            <!------------------------------------------------------------------------------------------------------------->

            <style>

                .comment-wrapper .panel-body {
                    max-height:650px;
                    overflow:auto;
                }

                .comment-wrapper .media-list .media img {
                    width:64px;
                    height:64px;
                    border:2px solid #e5e7e8;
                }

                .comment-wrapper .media-list .media {
                    border-bottom:1px dashed #efefef;
                    margin-bottom:25px;
                }
            </style>
            <div class="cell medium-8">
                <div class="row bootstrap snippets bootdeys">
                    <div class="col-sm-12">
                        <div class="comment-wrapper">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Comment panel
                                </div>
                                <div class="panel-body">
                                    <form action="{{ route('addComment', $recipe->url) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <input type="text" name="author_name" class="form-control" placeholder="Votre Nom..."></input>
                                        <textarea name="comment" class="form-control" placeholder="Votre commantaire..." rows="3"></textarea>
                                        <br>
                                        <button type="submit" class="btn btn-info pull-right">Commenter</button>
                                    </form>

                                    <div class="clearfix"></div>
                                    <hr>
                                    <ul class="media-list">
                                        @if($nbComments > 0)
                                        @foreach($comments_users as $comment)
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="../media/images/user-default.png" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{ $comment->date }}</small>
                                </span>
                                                <strong class="text-success">{{ @$comment->name }}</strong>
                                                <p>
                                                    {{ $comment->content }}
                                                </p>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif


@endsection
