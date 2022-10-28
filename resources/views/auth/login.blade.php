@extends('layouts.main')
 <!--Banner Start-->
@section('content');


    <!--slip on all pages start-->

    <div id="slip" style="width: 100%;float: left;">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <img style="width:100%;height: auto;" src="{{ URL::to('assets/') }}/images/Whatsappimage.jpeg" alt="">

                </div>

            </div>

        </div>

    </div>

    

    

    <!--slip on all pages end-->

        <!--Login Page Start-->

        <div id="login">

            <div class="container special_class">

                <div class="row">

                    <div class="col-12 head">

                        <h2>Login</h2>
                         <form class="login_form" method="POST" action="{{ route('login') }}">
                        @csrf

                            <label>Email*</label><br>

                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>Password*</label><br>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            <button type="submit">Login</button><br>

                            <label>Not registred yet?</label>

                        </form>
                            <a href="{{ route('register')}}" >Create an Account</a>


                    </div>

                </div>

            </div>

        </div>

        <!--Login Page End-->


@endsection