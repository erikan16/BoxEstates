@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Tags')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">

    <!-- SweetAlerts -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}">
@endsection

@section('breadcrumb')
    <li class="active">Tags</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Current Tags</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="viewTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tag Name</th>
                            <th class="noIcon"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td> {{ $tag->id }} </td>
                                <td> {{ $tag->name }} </td>
                                <td>
                                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE' ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'iconBtn deleteTag']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tag Name</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-5">
            <div class="box box-warning">
                <div class="box-header">Create a New Tag</div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'tags.store', 'data-parsley-validate' => '')) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Tag Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control input-md', 'maxlength' => '20')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Create',  array('class' => 'btn btn-default pull-right')) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
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