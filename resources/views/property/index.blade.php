@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Properties')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">

    <!-- SweetAlerts -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}">
@endsection

@section('breadcrumb')
    <li class="active">Property</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('property.create') }}" class="btn btn-warning pull-right">Create New Property</a>
        </div>
    </div>
    <br>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Current Properties</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="viewTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Tags</th>
                        <th class="noIcon"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td> {{ $property->id }} </td>
                        <td> {{ $property->title }} </td>
                        <td>
                            {{ $property->address }} , {{ $property->state }} {{ $property->zipcode }}
                        </td>
                        <td> {!!html_entity_decode(substr($property->description, 0, 20))!!}{!!html_entity_decode(strlen($property->description) > 20 ? "..." : "" )!!}</td>
                        <td> {{ date('m/j/y', strtotime($property->created_at)) }} </td>
                        <td>
                            <div class="tags">
                                @foreach($property->tags as $tag)
                                    <span class="label label-default">{{$tag->name}}</span>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('property.show', $property->id) }}" class="btn btn-block btn-primary btn-sm view">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Tags</th>
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