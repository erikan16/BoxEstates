<div class="ui inverted vertical masthead center aligned segment articles">
    <div class="top-nav">
        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <div class="logo">
                    <a href="{{'/'}}"><img src="{{ asset('assets/images/boxestates_logo.png') }}"></a>
                </div>

                <div class="right item">
                    <a href="{{ url('pages/buy') }}" class="{{ Request::is('buy') ? 'active' : '' }} item">Buy</a>
                    <a href="{{ url('pages/sell') }}" class="item">Sell</a>
                    <a href="{{ url('pages/agent') }}" class="item">Agent Finder</a>
                    <a href="{{ url('pages/article') }}" class="item">Articles</a>
                    @if (Auth::check())
                        @if (Auth::user()->user_type === 'agent')
                            <a href="/dashboard" class="ui inverted button">Dashboard</a>
                        @else
                            <a href="/logout" class="ui inverted button">Log Out</a>
                        @endif
                    @else
                        <a href="/login" class="ui inverted button">Log In</a>
                    @endif
                    <!--<a class="ui inverted button">Sign Up</a>-->
                </div>
            </div>
        </div>
    </div>
</div>