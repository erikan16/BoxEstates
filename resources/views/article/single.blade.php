@extends('layouts.pages')

@section('title', 'Articles')

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
                        <img class="ui avatar image" src="{{ asset('assets/images/guest_avatar.jpg') }}">
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
                        {!!html_entity_decode($article->description)!!}
                        <br>
                        <div class="ui comments">
                            <h3 class="ui dividing header">{{ $article->comments()->count() }} Comments</h3>
                            @foreach($article->comments as $comment)
                            <div class="comment">
                                <a class="avatar">
                                    <img src="{{ asset('assets/images/guest_avatar.jpg') }}">
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
                                {{ Form::submit('Add Reply',  array('class' => 'ui blue labeled submit icon button')) }}

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