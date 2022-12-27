@extends('layouts.auth')

@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-8 col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="flash-data-berhasil">
                        </div>
                        <div class="flash-data-gagal"></div>
                        <!-- Nested Row within Card Body -->
                        {{-- Login --}}
                        <div class="row justify-content-center">
                            {{-- <div class="col-lg-6 d-none d-lg-block text-center">
                        </div> --}}
                            <div class="col-lg-10">
                                <div class="mt-5 p-3">

                                    <div class="text-center">
                                        <img src="{{ asset('templates/img/logo.jpg') }}" alt="Logo" width="300"
                                            height="100%">

                                        <h1 class="h4 mt-3 text-gray-900 mb-4">Silahkan Login</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row mb-3 justify-content-center">
                                            {{-- <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                                            <div class="col-md-8">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email"
                                                    placeholder="Email">

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
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-start">
                                            <div class="col-md-8 offset-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0 justify-content-center">
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    {{ __('Login') }}
                                                </button>

                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Belum punya akun ? <a class="small" href="{{ route('register') }}">Buat
                                            akun</a>
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
