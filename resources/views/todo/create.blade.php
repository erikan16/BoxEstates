@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | To Do')

@section('stylesheet')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
@endsection


@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Create a New To Do Item</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body pad">
            {!! Form::open(array('route' => 'todo.store', 'data-parsley-validate' => '')) !!}
            <div class="form-group">
                {{ Form::label('description', 'Item Listing') }}
                {{ Form::text('description', null, array('class' => 'form-control input-md', 'maxlength' => '20')) }}
            </div>
            <div class="form-group">
                {{ Form::label('estimateTime', 'Estimate') }}
                <div class="row">
                    <div class="col-md-5">
                        {{ Form::number('estimateTime', null, array('class' => 'form-control input-md', 'maxlength' => '20'))
                         }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::select('estimateValue', ['Day/Days' => 'Day/Days', 'Hours' => 'Hours', 'Min' => 'Min'], null, array('class' => 'form-control input-md')) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::submit('Create To Do',  array('class' => 'btn btn-default pull-right')) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection