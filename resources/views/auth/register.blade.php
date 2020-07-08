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
                  </div >
                  <p class ="logoLogin" ></p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                    <p>Work with us ? Let's do it </p>
                  <form  method="POST" action="{{ route('register') }}" class="form-validate" novalidate="novalidate">
                     @csrf

                    <div class="form-group">
                      <input id="name" name="name" value="{{ old('name') }}" type="text"  required data-msg="Please enter your E-mail" class="input-material">
                      <label for="name" class="label-material">name</label>

                    </div>


                    <div class="form-group">
                      <input id="email" type="email" name="email" required data-msg="Please enter a valid email address" class="input-material" value="{{ old('email') }}" >
                      <label for="email" class="label-material">Email Address      </label>
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="password" class="label-material">password</label>
                    </div>
                     <div class="form-group">
                      <input id="password-confirm" type="password" name="password_confirmation" required data-msg="Please enter password confirm" class="input-material">
                      <label for="password-confirm" class="label-material">password confirm</label>
                    </div>

                    <div class="form-group terms-conditions">
                      <input id="register-agree" name="registerAgree" lang="ar" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                    <label lang="ar" for="register-agree">Agree the <a href="{{route("FeesTOT")}}">terms</a> and <a href="{{route("PrivacyPolicy")}}">policy</a> </label>
                    </div>
                    <div class="form-group">
                      <button id="regidter" type="submit" name="registerSubmit" class="btn btn-primary">Register</button>
                    </div>
                  </form><small>Already have an account? </small><a href="{{ route('login') }}" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
