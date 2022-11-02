@extends('layouts.main')
 <!--Banner Start-->
@section('content');
<!--Page Title-->
    <section class="page-title" style="background-image:url(<?= url('/') ?>images/background/34.jpg)">
        <div class="auto-container">
            <h1>{{ __('Confirm Password') }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/')}}">home</a></li>
                <li>{{ __('Confirm Password') }}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <!-- Login Form -->
            <div class="login-form">
                {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
            <!--End Login Form -->  
        </div>
    </section>
    <!--End Login Section-->
@endsection