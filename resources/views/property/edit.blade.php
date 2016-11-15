@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Property')

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
@endsection

@section('breadcrumb')
    <li class="active">Property</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Update/Edit Property</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body pad">
            {!! Form::model($property, ['route' => ['property.update', $property->id], 'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('price', 'Price') }}
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            {{ Form::text('price', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('address', 'Address') }}
                        {{ Form::text('address', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('city', 'City') }}
                        {{ Form::text('city', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('state', 'State') }}
                        {{ Form::text('state', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('zipcode', 'Zip Code') }}
                        {{ Form::text('zipcode', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('beds', 'Beds') }}
                        {{ Form::text('beds', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('baths', 'Baths') }}
                        {{ Form::text('baths', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('feet', 'Sq Feet') }}
                        {{ Form::text('feet', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('homeType', 'Home Type') }}
                        {{ Form::select('homeType', [
                           'house' => 'House',
                           'apartment' => 'Apartment',
                           'condo' => 'Condo',
                           'townhouse' => 'Townhouse',
                           'manufactured' => 'Manufactured',
                           'land' => 'Land'] , null, array('class' => 'form-control input-md')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('listingType', 'Listing Type') }}
                        {{ Form::select('listingType', [
                           'sale' => 'For Sale',
                           'rent' => 'For Rent',
                           'foreclosure' => 'Foreclosure'
                          ] , null, array('class' => 'form-control input-md')) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', null, array('class' => 'textarea')) }}
            </div>

            {{ Form::label('tags', 'Tags') }}
            <div class="form-group">
                {{ Form::select('tags2[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple']) }}
            </div>
            <div class="form-group">
                <div class="pull-right">
                    {!! Html::linkRoute('property.show', 'Cancel', array($property->id), array('class' => 'btn btn-danger')) !!}
                    {{ Form::submit('Update Property',  array('class' => 'btn btn-default')) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('footerScripts')
    <!-- Parsley script -->
    <script type="text/javascript" src="{{ asset('assets/plugins/parsley/parsley.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($property->tags()->getRelatedIds())
        !!}).trigger('change');
    </script>
@endsection