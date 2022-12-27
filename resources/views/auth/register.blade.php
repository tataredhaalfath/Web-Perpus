@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-10 col-lg-10 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            
                            <div class="col-lg-10">
                                <div class="mt-5 p-3">
                                    <div class="text-center">
                                        <img src="{{ asset('templates/img/logo.jpg') }}" alt="Logo" width="300"
                                            height="100%">
                                        <h1 class="h4 mt-3 text-gray-900 mb-4">Silahkan Mendaftar</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row mb-3 justify-content-center">
                                            {{-- <label for="name"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> --}}

                                            <div class="col-md-8">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="username">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            {{-- <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                                            <div class="col-md-8">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            {{-- <label for="password"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                                            <div class="col-md-8">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password" placeholder="password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            {{-- <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> --}}

                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-2">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Sudah punya akun ? <a class="small" href="/login">Masuk
                                            sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
