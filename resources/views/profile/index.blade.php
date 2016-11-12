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
        @foreach($profiles as $profile)
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img src="{{ asset('images/' . $profile->image) }}" class="profile-user-img img-responsive img-circle" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $profile->name }}</h3>

                        <p class="text-muted text-center">Real Estate Agent</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> <i class="fa fa-envelope" aria-hidden="true"></i> {{ $profile->email }}</b>
                            </li>
                            <li class="list-group-item">
                                <b>Article Listings</b> <span class="pull-right">{{ $article->count() }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Property Listings</b>  <span class="pull-right">{{ $property->count() }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-9">
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-4">
                                <strong><i class="fa fa-book margin-r-5"></i>Company Name</strong>

                                <p class="text-muted">
                                    {{ $profile->company_name }}
                                </p>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fa fa-book margin-r-5"></i>Company Link</strong>

                                <p class="text-muted">
                                    {{ $profile->company_url }}
                                </p>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        <hr>

                        <strong><i class="fa fa-map-marker" aria-hidden="true"></i></i> Company Location</strong>

                        <p class="text-muted">
                            {{ $profile->city }},  {{ $profile->state }}
                        </p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Experience</strong>

                        <p> {{ $profile->experience }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        @endforeach

        <div class="row">
            @if (false == empty($profile))
                <div class="col-sm-6">
                    {!! Html::linkRoute('profile.edit', 'Edit Profile', array($profile->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>
            @else
                <h3> You are missing a Profile... why don't you create one.</h3>
                <div class="col-sm-6">
                    <a href="{{ 'profile/create' }}" class="btn btn-primary btn-block">Create Profile</a>
                </div>
            @endif
        </div>
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