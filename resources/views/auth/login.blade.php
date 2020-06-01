@extends('layouts.loginlayout')

@section('content')
<div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
        <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
                <div class="info d-flex align-items-center">
                    <div class="content">
                        <div class="logo logoLogin ">
                            <h1></h1>
                        </div>
                        <p class="logoLogin"></p>
                    </div>
                </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
                <div class="form d-flex align-items-center">
                    <div class="content">
                        <div>
                            <div class="content">
                                <div class="logo logoLogin ">

                                </div>
                                <p class="logoLogin">@lang('login.Descrption')</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="form-validate"
                            aria-label="@lang('Login.login')">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" name="email" required autofocus
                                    data-msg="Please enter your Email" class="input-material "
                                    value="{{ old('email') }}">
                                <label for="login-username" class="label-material">@lang('login.UserName')</label>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <script type="text/javascript">
                                    console.log('{{$errors}}');
                                </script>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" name="password" required
                                    data-msg="Please enter your password" class="input-material">
                                <label for="password" class="label-material">@lang('login.Password')</label>
                            </div><button id="login" class="btn btn-primary">@lang('login.login')</button>
                            <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                        </form><a href="{{ route('password.request') }}" class="forgot-pass">
                            @lang('login.Forgotpass')</a><br><small>@lang('login.Donothaveanaccount') </small><a
                            href="{{ route('register') }}" class="signup">@lang('login.Signup') </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
