@extends('layouts.main')
 <!--Banner Start-->
@section('content');
<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/34.jpg)">
        <div class="auto-container">
            <h1>Sign Up</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/')}}">home</a></li>
                <li>Sign Up</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <!-- Login Form -->
            <div class="login-form">
                <h2>Sign Up</h2>
                <!--Login Form-->
                <form class="login_form" method="POST" action="{{ route('register') }}">
                        @csrf

                    <div class="form-group">
                        <label>Name *</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email address *</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Password *</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password *</label>
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                       
                    </div>
                    
                    <div class="form-group">
                        <input class="theme-btn" type="submit" name="submit-form" value="Sing Up">
                    </div>

                    <div class="form-group pass">
                        <a href="{{ url('/login') }}" class="psw">You have already account?</a>
                    </div>
                </form>
            </div>
            <!--End Login Form -->  
        </div>
    </section>
    <!--End Login Section-->
@endsection