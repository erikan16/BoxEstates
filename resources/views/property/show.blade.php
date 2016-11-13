@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Property')

@section('stylesheet')
    <!-- SweetAlerts -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}">
@endsection

@section('breadcrumb')
    <li class="active">Property</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Property Listing</h3>
            <h2>Title: {{ $property->title }}</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    Address: {{ $property->address }}, {{ $property->state }} {{ $property->zipcode }}
                    <br>
                    Beds: {{ $property->beds }} | Baths: {{ $property->baths }} | Sq Feet: {{ $property->feet }}
                    <br>
                    Price: {{ $property->price }}
                    <br><br>
                    {!!html_entity_decode($property->description)!!}
                </div>
                <div class="col-md-4">
                    <div class="well">
                        {{--<dl class="dl-horizontal">--}}
                        {{--<label>URL:</label>--}}
                        {{--<a href="{{ url('parent/'.$post->slug) }}">{{ url($post->slug) }}</a>--}}
                        {{--</dl>--}}
                        <dl class="dl-horizontal">
                            <label>Created:</label>
                            {{ date("M j, Y h:ia", strtotime($property->created_at)) }}
                        </dl>
                        <dl class="dl-horizontal">
                            <label>Updated:</label>
                            @if ($property->updated_at)
                            {{ date("M j, Y h:ia", strtotime($property->updated_at)) }}
                            @else
                                No Updates Recorded
                            @endif
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('property.edit', 'Edit', array($property->id), array('class' => 'btn btn-primary btn-block')) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open(['route' => ['property.destroy', $property->id], 'method' => 'DELETE', 'class' => 'deleteArticle' ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block delete']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Html::linkRoute('property.index', 'All Posts', [], ['class' => 'btn btn-info btn-block btn-h1-spacing']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ url('property/imageUpload') }}" class="dropzone" name="file" id="addImages" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="property_id" value="{{ $property->id }}">

            </form>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('footerScripts')
    <script>
        $(document).ready(function(){
            $('.deleteArticle').on('click', function(e){
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this post!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        swal("Deleted!", "Your post has been deleted.", "success");
                           $(".deleteArticle").submit();
                    } else {
                        swal("Cancelled", "Your post is still safe :)", "error");
                    }
                });
            });
        });
    </script>
@endsection