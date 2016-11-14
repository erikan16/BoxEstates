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
                    <img class="ui avatar image" src="{{asset('assets/icons/sleeping-bed-silhouette.svg')}}"> {{ $property->beds }} beds <br>
                    <img class="ui avatar image" src="{{ asset('assets/icons/shower.svg') }}"> {{ $property->baths }} baths <br>
                    <img class="ui avatar image" src="{{ asset('assets/icons/set-square.svg') }}">{{ $property->feet }} sq ft
                </h5>
                <div class="marketInfo">
                    <div class="ui red empty circular label"></div> For Sale

                    <div class="priceInfo">
                        <h2>$ {{ $property->price }}</h2>
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
                    @foreach($property->images() as $image)

                        <a href="http://unitegallery.net">
                            <img
                                    src="/images/property/{{ $image->file_name }}"
                                 data-image="/images/property/{{ $image->file_name }}"
                                 style="display:none">
                        </a>

                    @endforeach

                </div>
            </div>
        </div>
        <div class="sixteen wide column">
            <div style="height: 400px;" id="map"></div>
        </div>
    </div>

@endsection

@section('bottomScripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry&key=AIzaSyDipq_w3lZ1TshNCEAjq1jLg3rC8yyxfz4" rel="application/javascript"></script>
    <!--<script type="application/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
    <script type="application/javascript">
        jQuery(document).ready(function(){

            var address = '{{ $property->address }} {{ $property->state }} {{ $property->zip }}';
            // Fetch geolocation of address
            jQuery.get('https://maps.googleapis.com/maps/api/geocode/json', {

                address: address

            }, function (response) {

                var lat = response.results[0].geometry.location.lat;
                var lng = response.results[0].geometry.location.lng;

                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(lat, lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var google_map = new google.maps.Map(document.getElementById('map'), mapOptions);

                new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    map: google_map
                });


            });

            jQuery("#gallery").unitegallery({
                theme_panel_position: "left"
            });

        });
    </script>
@endsection