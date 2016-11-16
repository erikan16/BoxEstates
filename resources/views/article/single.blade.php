@extends('layouts.pages')

@section('title', 'Articles')

@section('stylesheets')
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link rel="stylesheet" href="{{ asset('assets/css/unite-gallery.css') }}" type="text/css">
    <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
@endsection


@section('content')
    <!-- Content Wrapper -->
    <div class="wrapper article">

        <!-- Main Page -->
        <div class="ui middle aligned stackable grid container" id="twitter-wjs">
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
        {{--<blockquote class="twitter-tweet">--}}
            {{--<p lang="en" dir="ltr">Sunsets don&#39;t get much better than this one over--}}
                {{--<a href="https://twitter.com/GrandTetonNPS">@GrandTetonNPS</a>.--}}
                {{--<a href="https://twitter.com/hashtag/nature?src=hash">#nature</a>--}}
                {{--<a href="https://twitter.com/hashtag/sunset?src=hash">#sunset</a>--}}
                {{--<a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a></p>--}}
            {{--&mdash; US Dept of Interior (@Interior)--}}
            {{--<a href="https://twitter.com/Interior/status/463440424141459456">May 5, 2014</a>--}}
        {{--</blockquote>--}}


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
                        <div class="ui labeled icon vertical menu item">
                            <a href="{{ route('article.single', $article->slug) }}" title="{{ $article->title }} @boxestates"
                               class="tweet item" target="_blank"> <i class="twitter icon"></i>  Tweet</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('article.single', $article->slug)) }}" class="item social"><i class="facebook icon"></i> Share</a>
                            <a href="https://plus.google.com/share?url={{ urlencode(url('article.single', $article->slug)) }}" class="item social"><i class="google plus icon"></i> Google Plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // We bind a new event to our link
        $('a.tweet').click(function(e){

            //We tell our browser not to follow that link
            e.preventDefault();

            //We get the URL of the link
            var loc = $(this).attr('href');

            //We get the title of the link
            var title  = encodeURIComponent($(this).attr('title'));

            //We trigger a new window with the Twitter dialog, in the middle of the page
            window.open('http://twitter.com/share?url=' + loc + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        });

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social', function(e){

            var
                    verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                    horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                    'width='+popupSize.width+',height='+popupSize.height+
                    ',left='+verticalPos+',top='+horisontalPos+
                    ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }
        });
    </script>
@endsection