@extends('layouts.dashboard')

@section('dashboardTitle', 'BoxEstates | Dashboard')

@section('stylesheet')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/flat/blue.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('breadcrumb')
    <li class="active">Dashboard</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- Chat box -->
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Comments</h3>
                    </div>
                    <div class="box-body chat" id="chat-box">
                        <!-- chat item -->
                        @foreach($comments as $comment)
                        <div class="item">
                            {{--<img src="{{ asset('images/default.jpg') }}" alt="user image">--}}
                            <img src="{{ asset('images/'. $profile->image) }}" alt="user image">

                            <p class="message">
                                <a href="{{ $comment['link']  }}" class="name">
                                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ date('m/j/y', strtotime($comment['created'])) }}</small>
                                    {{ $comment['author']  }} - {{ $comment['article'] }}
                                </a>
                                {{ $comment['comment'] }}
                            </p>
                            {{--<div class="attachment">--}}
                                {{--<h4>Attachments:</h4>--}}

                                {{--<p class="filename">--}}
                                    {{--home-image.jpg--}}
                                {{--</p>--}}

                                {{--<div class="pull-right">--}}
                                    {{--<button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- /.attachment -->
                        </div>
                        @endforeach
                        <!-- /.item -->
                    </div>
                    <!-- /.chat -->
                    <div class="box-footer">

                    </div>
                </div>
                <!-- /.box (chat box) -->

                <!-- TO DO List -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>

                        <h3 class="box-title">To Do List</h3>

                        <div class="box-tools pull-right">
                            {!! $todos->links(); !!}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="todo-list">
                            @foreach($todos as $todo)
                                <li>
                                    <!-- drag handle -->
                                    <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="">
                                    <!-- todo text -->
                                    <span class="text">{{ $todo->description }}</span>
                                    <!-- Emphasis label -->
                                    <small
                                    @if($todo->estimateValue === 'Hours')
                                        class="label label-danger"
                                    @elseif ($todo->estimateValue === 'Minutes')
                                       class="label label-warning"
                                    @else
                                        class="label label-info"
                                    @endif
                                    ><i class="fa fa-clock-o"></i> {{ $todo->estimateTime }} {{ $todo->estimateValue }}</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <div class="col-sm-3">
                                            {!! Html::linkRoute('todo.edit', '', array($todo->id), array('class' => 'fa fa-edit')) !!}

                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::open(['route' => ['todo.destroy', $todo->id], 'method' => 'DELETE' ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'iconBtn']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                        <a href="{{ route('todo.create') }}" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</a>
                    </div>
                </div>
                <!-- /.box -->

            </section>
            <!-- /.Left col -->
            <!-- right col -->
            <section class="col-lg-5 connectedSortable">
                <!-- Calendar -->
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Calendar</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                </div>
                <!-- /.box -->
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection

@section('footerScripts')
    <!-- Sparkline -->
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
@endsection