@extends('layouts.pages')

@section('title', 'Articles')

@section('stylesheets')
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link rel="stylesheet" href="{{ asset('assets/css/unite-gallery.css') }}" type="text/css">
@endsection


@section('content')
    <!-- Content Wrapper -->
    <div class="wrapper article">

        <!-- Main Page -->
        <div class="ui middle aligned stackable grid container">
            <div class="row articleHeader">
                <div class="nine wide column">
                    <h1>{{ $article->title }}</h1>
                </div>
            </div>
        </div>

        <div class="ui grid container">
            <!-- Back Button -->
            <div class="eleven wide computer three wide tablet ten wide mobile column">
                <a href="{{ url('pages/article') }}">
                    <div class="ui left floated primary button">
                        <i class="left chevron icon"></i> Back
                    </div>
                </a>
            </div>
            <div class="five wide computer seven wide tablet fifteen wide mobile column">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <img src="{{ asset('images/' . $article->getAuthorImage()) }}" class="ui avatar image">

                        <!--<i class="large github middle aligned icon"></i>-->
                        <div class="content">
                            <div class="header">Author: {{ $article->getArticleAuthor()->name }}</div>
                            <div class="description">Date: {{ date('m/j/y', strtotime($article->created_at)) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui text container">
            <div class="textWrapper">
                <div class="ui grid">
                    <div class="fifteen wide column">
                        @if(false == empty($article->image))
                            <img src="{{ asset('images/article/' . $article->image) }}" class="articleImage ui medium rounded image">
                        @endif
                        <div class="contentDescription">
                            {!!html_entity_decode($article->description)!!}
                        </div>
                        <br>
                        <div class="ui comments">
                            <h3 class="ui dividing header">{{ $article->comments()->count() }} Comments</h3>
                            @foreach($article->comments as $comment)
                            <div class="comment">
                                <a class="avatar">
                                    {{--<img src="{{ asset('images/default.jpg') }}">--}}
                                    <img src="{{ asset('images/' . $article->getAuthorImage()) }} ">
                                </a>
                                <div class="content">
                                    <a class="author">{{ $comment->getAuthor()->name  }}</a>
                                    <div class="metadata">
                                        <span class="date">{{ date('m/j/y', strtotime($article->created_at)) }}</span>
                                    </div>
                                    <div class="text">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @if ($loggedIn)
                            <div class="ui form reply">
                            {{ Form::open(['route' => ['comments.store', $article->id], 'method' => 'POST']) }}
                                <div class="field">
                                    {{ Form::textarea('comment', null, ['class' => '']) }}
                                </div>
                                <button type="submit" class="ui blue labeled submit icon button"> <i class="icon edit"></i> Add Reply</button>
                            {!! Form::close() !!}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="one wide column">
                        <div class="ui labeled icon vertical menu">
                            <a class="item"><i class="twitter icon"></i> Tweet</a>
                            <a class="item"><i class="facebook icon"></i> Share</a>
                            <a class="item"><i class="mail icon"></i> E-mail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection