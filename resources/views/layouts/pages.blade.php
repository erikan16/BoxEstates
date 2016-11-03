<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>BoxEstates | @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/semantic.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/flag.min.css')}}">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">
    @yield('stylesheets')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/semantic.min.js') }}"></script>
    @yield('scripts')

    <script>
        $(document)
            .ready(function() {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function () {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function () {
                            $('.fixed.menu').transition('fade out');
                        }
                    })
                ;

            }
        );
    </script>
    @yield('topScripts')

</head>
<body>

@include('partials._hiddenNav')

<!-- Page Contents -->
<div class="pusher">
    <!-- Navigation -->
   @include('partials._topNav')
    <!-- Content Wrapper -->
    <div class="wrapper @yield('wrapperExtension')">
        @yield('content')

        <!-- Footer Wrapper -->
        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui stackable inverted divided equal height stackable grid">
                    <p class="bottom">@ 2016 BoxEstates</p>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('bottomScripts')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-86438853-1', 'auto');
    ga('send', 'pageview');

</script>

</body>

</html>