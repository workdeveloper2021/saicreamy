@extends('layouts.main')
 <!--Banner Start-->
@section('content');
<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/34.jpg)">
        <div class="auto-container">
            <h1>Login</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/')}}">home</a></li>
                <li>Login</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <!-- Login Form -->
            <div class="login-form">
                <h2>Login</h2>
                <!--Login Form-->
                 <form class="login_form" method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-group">
                        <label>Email address *</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Password *</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input class="theme-btn" type="submit" name="submit-form" value="Log in">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                    </div>

                    <div class="form-group pass">
                        @if (Route::has('password.request'))
                            <a class="psw" href="{{ route('password.request') }}">Lost your password?</a>
                        @endif
                    </div>
                    <div class="form-group pass">
                        <a href="{{ route('register')}}" class="psw">Don't have an account?</a>
                    </div>
                </form>
            </div>
            <!--End Login Form -->  
        </div>
    </section>
    <!--End Login Section-->
@endsection