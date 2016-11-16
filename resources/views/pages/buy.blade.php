@extends('layouts.pages')

@section('title', 'Purchase')

@section('topScripts')
    <script>
        $(document)
            .ready(function() {
                $('.ui.listType')
                        .dropdown()
                ;

                $('.ui.priceType')
                        .dropdown()
                ;

                $('.ui.bedType')
                        .dropdown()
                ;

                $('.ui.homeType')
                        .dropdown()
                ;

                $('.ui.moreType')
                        .dropdown()
                ;

                $('.special.card .image').dimmer({
                    on: 'hover'
                });
            });
    </script>
@endsection


@section('content')
    <!-- Main Page -->
    <div class="ui middle aligned stackable grid container">
        <div class="row articleHeader">
            <div class="nine wide column">
                <h1>Buying</h1>
            </div>
        </div>
        <div class="row mapContainer">
            <div class="ui grid internally celled">
                <div class="ui equal width stackable internally celled grid">
                    <div class="sixteen wide column">

                        <div class="ui three column grid">
                            @foreach($properties as $property)
                                {{--<p>{{ print_r($property->getFirstImage()) }}</p>--}}
                            <div class="column">
                                <div class="ui special card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <h2 class="ui price header">${{ $property->price }}</h2>
                                                    <a href="{{ route('property.single', $property->id) }}">
                                                        <div class="ui inverted button">Show Property</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset($property->getFirstImage()) }}" style="height: 200px">
                                        {{--<img src="/images/property/{{ $property->getFirstImage()->file_name  }}">--}}
                                    </div>
                                    <div class="content">
                                        @if ($property->listingType == 'sale')
                                            <div class="ui red empty circular label"></div> For Sale
                                        @elseif($property->listingType == 'rent')
                                            <div class="ui blue empty circular label"></div> For Rent
                                        @else
                                            <div class="ui purple empty circular label"></div> Foreclosure
                                        @endif
                                        <div class="meta">
                                            <span class="date">{{ $property->beds }} bedrooms {{ $property->baths }} baths <br> {{ $property->feet }} sq ft</span>
                                        </div>
                                        <div class="description">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottomScripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry&key=AIzaSyDipq_w3lZ1TshNCEAjq1jLg3rC8yyxfz4" rel="application/javascript"></script>
    <!--<script type="application/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
    <script type="application/javascript">
        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(28.602432, -81.200264),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        new google.maps.Map(document.getElementById('map'), mapOptions);
    </script>
@endsection