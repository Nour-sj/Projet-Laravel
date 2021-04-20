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
                                    <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
                                    <br>
                                    <button type="button" class="btn btn-info pull-right">Post</button>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <ul class="media-list">
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">30 min ago</small>
                                </span>
                                                <strong class="text-success">@MartinoMont</strong>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">30 min ago</small>
                                </span>
                                                <strong class="text-success">@LaurenceCorreil</strong>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    Lorem ipsum dolor <a href="#">#ipsumdolor </a>adipiscing elit.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">30 min ago</small>
                                </span>
                                                <strong class="text-success">@JohnNida</strong>
                                                <p>
                                                    Lorem ipsum dolor <a href="#">#sitamet</a> sit amet, consectetur adipiscing elit.
                                                </p>
                                            </div>
                                        </li>
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
