@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Articles')

@section('stylesheet')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
@endsection

@section('breadcrumb')
    <li class="active">Article</li>
@endsection

@section('content')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Create a New Article
                    <small>Simple and fast</small>
                </h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body pad">
                {!! Form::open(array('route' => 'article.store', 'data-parsley-validate' => '')) !!}
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, array('class' => 'form-control input-md', 'maxlength' => '100')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', null, array('class' => 'textarea')) }}
                    </div>
                    <div class="form-group">
                        <label>Key Words</label>
                        <p>
                            <span class="label label-danger">For Sale</span>
                            <span class="label label-success">Orlando, FL</span>
                            <span class="label label-info">Family Home</span>
                        </p>
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Create Article',  array('class' => 'btn btn-default pull-right')) }}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Image Upload Requirements</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>The maximum file size for uploads in this is <strong>999 KB</strong> (default file size is unlimited).</li>
                    <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed (by default there is no file type restriction).</li>
                    <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files are stored in memory).</li>
                    <li>You can <strong>drag &amp; drop</strong> files from your desktop on this page</li>
                </ul>
            </div>
        </div>
@endsection