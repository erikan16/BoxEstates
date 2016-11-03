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

        <div class="row">
            <div class="sixteen column wide">
                <form class="ui form">
                    <table class="ui green table">
                        <thead>
                        <tr>
                            <th colspan="6"><i class="find icon"></i> Home Search </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td width="35%">
                                <div class="field">
                                    <div class="fluid">
                                        <div class="ui input">
                                            <input name="map-search" placeholder="Address, Neighborhood, or ZipCode" type="text">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td >
                                <div class="ui form">
                                    <div class="ui floating labeled icon dropdown buy listType button">
                                        <i class="list layout icon"></i>
                                        <span class="text">Listing Type</span>
                                        <div class="menu">
                                            <div class="item">
                                                <div class="ui red empty circular label"></div>
                                                For Sale
                                            </div>
                                            <div class="item">
                                                <div class="ui blue empty circular label"></div>
                                                Potential Listings
                                            </div>
                                            <div class="item">
                                                <div class="ui black empty circular label"></div>
                                                For Rent
                                            </div>
                                            <div class="item">
                                                <div class="ui purple empty circular label"></div>
                                                Recently Sold
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td >
                                <div class="ui form">
                                    <div class="ui floating labeled icon dropdown buy priceType button">
                                        <i class="dollar icon"></i>
                                        <span class="text">Any Price</span>
                                        <div class="menu">
                                            <div class="item">
                                                $50,000 - $150,00
                                            </div>
                                            <div class="item">
                                                $150,000 - $250,00
                                            </div>
                                            <div class="item">
                                                $250,000 - $350,00
                                            </div>
                                            <div class="item">
                                                $350,000 - $450,00
                                            </div>
                                            <div class="item">
                                                $450,00 - $650,000
                                            </div>
                                            <div class="item">
                                                $650,00 +
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td >
                                <div class="ui form">
                                    <div class="ui floating labeled icon dropdown buy bedType button">
                                        <i class="hotel icon"></i>
                                        <span class="text">Beds</span>
                                        <div class="menu">
                                            <div class="item">
                                                1+
                                            </div>
                                            <div class="item">
                                                2+
                                            </div>
                                            <div class="item">
                                                3+
                                            </div>
                                            <div class="item">
                                                4+
                                            </div>
                                            <div class="item">
                                                5+
                                            </div>
                                            <div class="item">
                                                6+
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td >
                                <div class="ui form">
                                    <div class="ui floating labeled icon dropdown buy homeType button">
                                        <i class="home icon"></i>
                                        <span class="text">Home Type</span>
                                        <div class="menu">
                                            <div class="item">
                                                Houses
                                            </div>
                                            <div class="item">
                                                Apartments
                                            </div>
                                            <div class="item">
                                                Condos/co-ops
                                            </div>
                                            <div class="item">
                                                Townhomes
                                            </div>
                                            <div class="item">
                                                Manufactured
                                            </div>
                                            <div class="item">
                                                Land
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <div class="row mapContainer">
            <div class="ui grid internally celled">
                <div class="ui equal width stackable internally celled grid">
                    <div class="eight wide column">
                        <div id="map"></div>
                    </div>
                    <div class="eight wide column">

                        <div class="ui three column grid">
                            <div class="column">
                                <div class="ui special card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <h2 class="ui price header">$400,000</h2>
                                                    <a href="house_single.html">
                                                        <div class="ui inverted button">Show Property</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/images/1.0_buy.jpg') }}">
                                    </div>
                                    <!--<div class="image">-->
                                    <!--<img src="assets/images/girl.jpg">-->
                                    <!--</div>-->
                                    <div class="content">
                                        <div class="ui red empty circular label"></div> For Sale
                                        <div class="meta">
                                            <span class="date">3 bedrooms 2 baths <br> 2,987 sq ft</span>
                                        </div>
                                        <div class="description">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="ui special card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <h2 class="ui price header">$400,000</h2>
                                                    <div class="ui inverted button">Show Property</div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/images/1.0_buy.jpg') }}">
                                    </div>
                                    <!--<div class="image">-->
                                    <!--<img src="assets/images/girl.jpg">-->
                                    <!--</div>-->
                                    <div class="content">
                                        <div class="ui red empty circular label"></div> For Sale
                                        <div class="meta">
                                            <span class="date">3 bedrooms 2 baths <br> 2,987 sq ft</span>
                                        </div>
                                        <div class="description">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="ui special card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <h2 class="ui price header">$400,000</h2>
                                                    <div class="ui inverted button">Show Property</div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/images/1.0_buy.jpg') }}">
                                    </div>
                                    <!--<div class="image">-->
                                    <!--<img src="assets/images/girl.jpg">-->
                                    <!--</div>-->
                                    <div class="content">
                                        <div class="ui red empty circular label"></div> For Sale
                                        <div class="meta">
                                            <span class="date">3 bedrooms 2 baths <br> 2,987 sq ft</span>
                                        </div>
                                        <div class="description">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui three column grid">
                            <div class="column">
                                <div class="ui special card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <h2 class="ui price header">$400,000</h2>
                                                    <div class="ui inverted button">Show Property</div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/images/1.0_buy.jpg') }}">
                                    </div>
                                    <!--<div class="image">-->
                                    <!--<img src="assets/images/girl.jpg">-->
                                    <!--</div>-->
                                    <div class="content">
                                        <div class="ui red empty circular label"></div> For Sale
                                        <div class="meta">
                                            <span class="date">3 bedrooms 2 baths <br> 2,987 sq ft</span>
                                        </div>
                                        <div class="description">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="ui special card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <h2 class="ui price header">$400,000</h2>
                                                    <div class="ui inverted button">Show Property</div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/images/1.0_buy.jpg') }}">
                                    </div>
                                    <!--<div class="image">-->
                                    <!--<img src="assets/images/girl.jpg">-->
                                    <!--</div>-->
                                    <div class="content">
                                        <div class="ui red empty circular label"></div> For Sale
                                        <div class="meta">
                                            <span class="date">3 bedrooms 2 baths <br> 2,987 sq ft</span>
                                        </div>
                                        <div class="description">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="ui special card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <h2 class="ui price header">$400,000</h2>
                                                    <div class="ui inverted button">Show Property</div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('assets/images/1.0_buy.jpg') }}">
                                    </div>
                                    <!--<div class="image">-->
                                    <!--<img src="assets/images/girl.jpg">-->
                                    <!--</div>-->
                                    <div class="content">
                                        <div class="ui red empty circular label"></div> For Sale
                                        <div class="meta">
                                            <span class="date">3 bedrooms 2 baths <br> 2,987 sq ft</span>
                                        </div>
                                        <div class="description">

                                        </div>
                                    </div>
                                </div>
                            </div>
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