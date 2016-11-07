@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><img class="img-responsive" src="{{ asset('assets/images/large_logo-01.png') }}"> </a>
        </div>

        <div class="register-box-body">
            <p class="register-box-msg">Register a new membership</p>

            <form role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Full name" value="{{ old('name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('user_type') ? ' has-error' : '' }}">
                        {{ Form::select('user_type', ['agent' => 'Agent', 'buyer/seller' => 'Buyer / Seller'], null, array('class' => 'form-control')) }}

                        @if ($errors->has('user_type'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                        @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="row">

                    <div class="col-md-6 col-md-offset-4 pull-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <i class="fa fa-btn fa-user"></i> Register
                        </button>
                    </div>
                </div>
            </form>


            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
            </div>

            <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
@endsection
