<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <div class="small-logo">
            <a href="{{'/'}}"><img src="{{ asset('assets/images/boxestates_logo.png') }}"></a>
        </div>

        <div class="right menu">
            <div class="right item">
                <a href="{{'buy'}}" class="{{ Request::is('buy') ? "active" : "" }}item">Buy</a>
                <a href="{{'sell'}}" class="item">Sell</a>
                <a href="{{'agent'}}" class="item">Agent Finder</a>
                <a  href="{{'article'}}" class="item">Articles</a>
                <div class="item">
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
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a class="active item">Home</a>
    <a class="item">Work</a>
    <a class="item">Company</a>
    <a class="item">Careers</a>
    <a class="item">Login</a>
    <a class="item">Signup</a>
</div>