@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-login">
                <div class="card-title">Sign in to HapoLearn</div>

                <div class="card-login-body">
                    <section class="message-error">
                        @if (session('status'))
                            <div class="alert alert-danger">
                                <span class="text-danger"> {{ session('status') }}</span>
                            </div>
                        @endif
                    </section>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="user-name" class="col-md-12 col-form-label text-md-left">Username</label>

                            <div class="col-md-12">
                                <input id="user-name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 login-submit row">
                                <button type="submit" class="btn btn-primary btn-main col-md-4 col-lg-7 btn-sign-in">
                                    {{ __('Sign in') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link col-md-6 col-lg-4 link-forgot-password"{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <div class="sign-in-with">
                        <div class="row text">
                            <div class="col-lg-4 col-md-3 line"></div>
                            <div class="col-lg-4 col-md-6 content-text">Sign in with</div>
                            <div class="col-lg-4 col-md-3 line"></div>
                        </div>
                        <div class="btn btn-primary col-md-11 btn-google">
                            <a href="#" class="link-login-google">
                                <i class="fa-brands fa-google-plus-g"></i>
                                <span>Google</span>
                            </a>
                        </div>
                    </div>

                    <div class="sign-in-with">
                        <div class="row text">
                            <div class="col-lg-3 col-md-2 line"></div>
                            <div class="col-lg-6 col-md-8 content-text">or New to Hapolearn</div>
                            <div class="col-lg-3 col-md-2 line"></div>
                        </div>
                        <div class="btn btn-primary btn-main col-md-11 btn-login-create">
                            <a href="" class="btn-create">create new account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
