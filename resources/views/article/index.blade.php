@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Articles')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">

    <!-- SweetAlerts -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}">
@endsection

@section('breadcrumb')
    <li class="active">Article</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('article.create') }}" class="btn btn-warning pull-right">Create New Article</a>
        </div>
    </div>
    <br>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Current Articles</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="viewTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>URL Link</th>
                        <th class="noIcon"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td> {{ $article->id }} </td>
                            <td> {{ $article->title }} </td>
                            {{--<td> {{ substr($article->description, 0, 50) }}{{ strlen($article->description) > 50 ? "..." : "" }} </td>--}}
                            <td> {!!html_entity_decode(substr($article->description, 0, 20))!!}{!!html_entity_decode(strlen($article->description) > 20 ? "..." : "" )!!}</td>
                            <td> {{ date('m/j/y', strtotime($article->created_at)) }} </td>
                            <td>
                                <a href="{{ url('pages/'.$article->slug) }}" target="blank">{{ url('pages/'.$article->slug) }}</a>
                            </td>
                            <td>
                                <a href="{{ route('article.show', $article->id) }}" class="btn btn-block btn-primary btn-sm view">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>URL Link</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('footerScripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#viewTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection