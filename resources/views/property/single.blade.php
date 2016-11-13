@extends('layouts.pages')

@section('title', 'Property')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/css/unite-gallery.css') }}" type="text/css">
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/unitegallery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/unitegallery/themes/grid/ug-theme-grid.js') }}"></script>
@endsection

@section('content')
    <!-- Main Page -->
    <div class="ui two column stackable grid container">
        <div class=" six wide column">
            <div class="ui segment">
                <h1>617 Majestic Oak Dr.<br>
                    <span class="address">
                            Apopka, FL 32712</span>
                </h1>
                <h5>
                    <img class="ui avatar image" src="{{asset('assets/icons/sleeping-bed-silhouette.svg')}}"> 3 beds <br>
                    <img class="ui avatar image" src="{{ asset('assets/icons/shower.svg') }}"> 2 baths <br>
                    <img class="ui avatar image" src="{{ asset('assets/icons/set-square.svg') }}">2,987 sq ft
                </h5>
                <div class="marketInfo">
                    <div class="ui red empty circular label"></div> For Sale

                    <div class="priceInfo">
                        <h2>$400,000</h2>
                    </div>

                    <div class="agentInfo">
                        <h4>Agent:
                            <a href="agent_single.html">
                                <img class="ui avatar image" src="{{ asset('assets/images/1.0_girl.jpg') }}"> Sally Jones</h4>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class=" ten wide column">
            <div class="ui segment">
                <div id="gallery" style="display:none;">

                    <a href="http://unitegallery.net">
                        <img alt="Lemon Slice"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile1.jpg') }}"
                             data-image="assets/unitegallery/source/thumbs/tile1.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile1.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile1.jpg"
                             data-description="This is a Lemon Slice"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Peppers"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile2.jpg') }}"
                             data-image="assets/unitegallery/source/thumbs/tile2.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile2.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile2.jpg"
                             data-description="Those are peppers"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Keys"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile3.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile3.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile3.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile3.jpg"
                             data-description="Those are keys"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Friuts in cup"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile4.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile4.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile4.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile4.jpg"
                             data-description="Those are friuts in a cup"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Yellow Flowers"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile5.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile5.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile5.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile5.jpg"
                             data-description="Those are yellow flowers"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Butterfly"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile6.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile6.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile6.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile6.jpg"
                             data-description="This is butterfly"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Boat"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile7.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile7.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile7.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile7.jpg"
                             data-description="This is a boat"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Woman"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile8.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile8.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile8.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile8.jpg"
                             data-description="This is a woman"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Cup Of Coffee"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile9.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile9.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile9.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile9.jpg"
                             data-description="This is cup of coffee"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Iphone Back"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile10.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile10.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile10.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile10.jpg"
                             data-description="This is iphone back"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Lemon Slice"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile10.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile1.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile1.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile1.jpg"
                             data-description="This is a Lemon Slice"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Peppers"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile2.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile2.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile2.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile2.jpg"
                             data-description="Those are peppers"
                             style="display:none">
                    </a>

                    <a href="http://unitegallery.net">
                        <img alt="Keys"
                             src="{{ asset('assets/unitegallery/source/thumbs/tile3.jpg') }}"
                             data-image="assets/unitegallery/source/big/tile3.jpg"
                             data-image-mobile="assets/unitegallery/source/thumbs/tile3.jpg"
                             data-thumb-mobile="assets/unitegallery/source/thumbs/tile3.jpg"
                             data-description="Those are keys"
                             style="display:none">
                    </a>
                </div>
            </div>
        </div>
        <div class="sixteen wide column">
            <div id="map"></div>
        </div>
    </div>

@endsection

@section('bottomScripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry&key=AIzaSyDipq_w3lZ1TshNCEAjq1jLg3rC8yyxfz4" rel="application/javascript"></script>
    <!--<script type="application/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
    <script type="application/javascript">
        jQuery(document).ready(function(){

            jQuery("#gallery").unitegallery({
                theme_panel_position: "left"
            });

            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng(28.602432, -81.200264),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            new google.maps.Map(document.getElementById('map'), mapOptions);
        });

        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(28.602432, -81.200264),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        new google.maps.Map(document.getElementById('map'), mapOptions);
    </script>
@endsection