@extends('layouts.main')

@section('title', 'Homepage')

@section('content')
    <div class="wrapper home">
        <div class="ui inverted vertical masthead center aligned segment home">
            <div class="top-nav">
                <div class="ui container">
                    <div class="ui large secondary inverted pointing menu">
                        <div class="logo">
                            <a href="{{'/'}}"><img src="{{ asset('assets/images/boxestates_logo.png') }}"></a>
                        </div>

                        <div class="right item">
                            <a href="pages/buy" class=" item">Buy</a>
                            <a href="pages/sell" class="item">Sell</a>
                            <a href="pages/agent" class="item">Agent Finder</a>
                            <a href="pages/article" class="item">Articles</a>
                            @if (Auth::check())
                                @if (Auth::user()->user_type === 'agent')
                                    <a href="/dashboard" class="ui inverted button">Dashboard</a>
                                @else
                                    <a href="/logout" class="ui inverted button">Log Out</a>
                                @endif
                            @else
                                <a href="/login" class="ui inverted button">Log In</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui text container">
                <h1 class="ui inverted header">Your new adventure is around the corner</h1>
                <h2>Find what you need when you need it</h2>
                <form class="ui form">
                    <div class="field middle">
                        <input class="main-search" type="text" name="home-search" placeholder="Enter an address, neighborhood, city, or zip code">
                    </div>
                </form>
                <div class="ui large button">Get Started <i class="arrow right icon"></i></div>
            </div>
        </div>

        <div class="ui vertical stripe segment">
            <div class="ui middle container">
                <div class="ui grid">
                    <div class="three column row">
                        <div class="ui equal width stackable internally celled grid">
                            <div class="center aligned column">
                                <div class="main-icon">
                                    <i class="massive tags icon"></i>
                                </div>
                                <div class="intro">
                                    <p>Our current listings of homes for sale and for rent are always up to date. We make searching a breeze.  </p>
                                </div>
                                <div class="ui small button home"><a href="{{'pages/buy'}}">Read More</a></div>
                            </div>

                            <div class="center aligned column">
                                <div class="main-icon">
                                    <i class="massive folder open icon"></i>
                                </div>
                                <div class="intro">
                                    <p>Search through articles that pertain to areas you are interested in buying or looking to travel to. </p>
                                </div>

                                <div class="ui small button home"> <a href="{{'pages/article'}}">Read More</a></div>

                            </div>

                            <div class="center aligned column">
                                <div class="main-icon">
                                    <i class="massive call icon"></i>
                                </div>
                                <div class="intro">
                                    <p>Need any assistance we are here to help. Give us a call and we'll get you up and running in no time.</p>
                                </div>

                                <div class="ui small button home"> <a href="{{'pages/sell'}}">Read More </a></div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="ui vertical stripe quote segment">
            <div class="ui equal width stackable internally celled grid">
                <div class="center aligned row">
                    <div class="column">
                        <h3>"What a Great Site"</h3>
                        <p>That is what they all say about us</p>
                    </div>
                    <div class="column">
                        <h3>"I was able to search and purchase a home easily with BoxEstates"</h3>
                        <p>
                            <img src="{{ asset('assets/images/1.0_girl.jpg') }}" class="ui avatar image"> <b>Jessica | Orlando, FL</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection