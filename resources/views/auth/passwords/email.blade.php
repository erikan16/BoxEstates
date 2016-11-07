@extends('layouts.app')

@section('title', 'Password Reset')

<!-- Main Content -->
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><img class="img-responsive" src="{{ asset('assets/images/large_logo-01.png') }}"> </a>
        </div>

        <div class="register-box-body">
            <p class="register-box-msg">Register a new membership</p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                    </button>
                </div>
           </form>
        </div>
    </div>
@endsection
