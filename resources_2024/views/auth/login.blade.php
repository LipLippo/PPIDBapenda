@extends('layouts.applogin')

@section('content')


<div class="container">

    <div class="row"> 

        <div id="box" class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">

            <div class="row"> 

                <div id="wrapper" class="col-lg-12 col-md-12 col-sm-12">

                    <div class="row">

                        <div id="box-login" class="col-lg-6 col-md-6 col-sm-6 col-sm-push-6">

                            <h1>Login</h1>

                           <form method="POST" action="{{ route('login') }}">
                            @csrf

                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br> --}}
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                

                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <p>

                                    {{-- <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> LOGIN</button> --}}
                                     <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                               

                                    <button type="reset" class="btn btn-default">RESET</button>
                                     @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                </p>

                            </form>

                            <!-- DO NOT EDIT - GlobalSign SSL Site Seal Code - DO NOT EDIT -->

                        </div>

                        <div id="identitas" class="col-lg-6 col-md-6 col-sm-6 col-sm-pull-6">

                            
                            
                            <h1 id="judul">PORTAL Bapenda Prov. Jateng</b></h1><br>

                            <img src="{{asset('/assets/img/logo.png')}}" width="30%"><br><br>                            
                            
                            <p align="center" style="color: white;">                                						                                

                                Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah


                            </p>

                        </div>

                    </div>

                </div>

                <p class="copyright" style="color: gray;">BAPENDA Provinsi Jawa Tengah
. &copy; 2022</p>

            </div>

        </div>

    </div>

</div> 


@endsection


    

    

   