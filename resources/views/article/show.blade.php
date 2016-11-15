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
            <h2>Title: {{ $article->title }}</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    {!!html_entity_decode($article->description)!!}
                    @if($article->image != null)
                        <hr>
                        <h4 class="box-title">Featured Image</h4>
                        <img src="{{ asset('images/article/'. $article->image) }}" class="img-bordered articleImg img-responsive">
                    @endif
               </div>
                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horizontal">
                        <label>URL Slugs:</label>
                        <a href="{{ url('pages/article/slug', $article->slug) }}" target="blank">{{ url('pages/article/slug', $article->slug) }}</a>
                        </dl>
                        <dl class="dl-horizontal">
                            <label>Created:</label>
                            {{ date("M j, Y h:ia", strtotime($article->created_at)) }}
                        </dl>
                        <dl class="dl-horizontal">
                            <label>Updated:</label>
                            @if ($article->updated_at)
                            {{ date("M j, Y h:ia", strtotime($article->updated_at)) }}
                            @else
                                No Updates Recorded
                            @endif
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('article.edit', 'Edit', array($article->id), array('class' => 'btn btn-primary btn-block')) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE', 'class' => 'deleteArticle' ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block delete']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Html::linkRoute('article.index', 'All Posts', [], ['class' => 'btn btn-info btn-block btn-h1-spacing']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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