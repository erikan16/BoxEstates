@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Articles')

@section('stylesheet')
    <!-- SweetAlerts -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}">
@endsection

@section('breadcrumb')
    <li class="active">Article</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Article Listing</h3>
            <h2>Title: {{ $todo->description }}</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                {{ $todo->estimateTime }}
                {{ $todo->estimateValue }}
                </div>
                {{--<div class="col-md-4">--}}
                    {{--<div class="well">--}}
                        {{--<dl class="dl-horizontal">--}}
                        {{--<label>URL:</label>--}}
                        {{--<a href="{{ url('parent/'.$post->slug) }}">{{ url($post->slug) }}</a>--}}
                        {{--</dl>--}}
                        {{--<dl class="dl-horizontal">--}}
                            {{--<label>Created:</label>--}}
                            {{--{{ date("M j, Y h:ia", strtotime($article->created_at)) }}--}}
                        {{--</dl>--}}
                        {{--<dl class="dl-horizontal">--}}
                            {{--<label>Updated:</label>--}}
                            {{--@if ($article->updated_at)--}}
                            {{--{{ date("M j, Y h:ia", strtotime($article->updated_at)) }}--}}
                            {{--@else--}}
                                {{--No Updates Recorded--}}
                            {{--@endif--}}
                        {{--</dl>--}}
                        {{--<hr>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--{!! Html::linkRoute('article.edit', 'Edit', array($article->id), array('class' => 'btn btn-primary btn-block')) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--{!! Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE', 'class' => 'deleteArticle' ]) !!}--}}
                                {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block delete']) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                                {{--{!! Html::linkRoute('todo.index', 'All Posts', [], ['class' => 'btn btn-info btn-block btn-h1-spacing']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
