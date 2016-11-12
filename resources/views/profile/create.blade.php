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
    <li class="active">Profile</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        {!! Form::open(array('route' => 'profile.store', 'data-parsley-validate' => '', 'files' => true)) !!}
        <div class="row">
            <div class="col-md-6 pull-right">
                <div class="box box-default">
                    <div class="box-header ui-sortable-handle">
                        <i class="fa fa-user"></i> <h3 class="box-title">Add new Avatar</h3>
                    </div>
                    <div class="box-body chat" id="chat-box">
                        {{ Form::file('image', array('class' => 'file')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('email', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('company_name', 'Company Name', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('company_name', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('company_url', 'Company Site', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('company_url', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('city', 'Company City', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('city', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('state', 'Company State', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('state', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('experience', 'Experience', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{ Form::textarea('experience', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        {{ Form::submit('Submit',  array('class' => 'btn btn-danger')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        {!! Form::close() !!}
    </section>
    <!-- /.content -->

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