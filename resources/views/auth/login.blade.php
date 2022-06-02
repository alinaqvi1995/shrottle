@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 sign-in  ">
            <div class="col px-0 ">
                <div class="banner"></div>
            </div>
            <div class="col d-flex justify-content-center align-items-center">

                <div class="p-x-70 p-y-20 ">
                    @if (session($key ?? 'error'))
                        <div class="alert alert-danger" role="alert">
                            {!! session($key ?? 'error') !!}
                        </div>
                    @endif
                    @if (session('message'))
                        <!-- <div class="account-title">{{ session('message') }}</div> -->
                        <div class="account-title">

                            <p class="alert alert-danger">{{ session('message') }}</p>

                        </div>
                    @endif
                    {{-- <h1 class="text-theme-primary text-uppercase mb-0 text-center fs-18 fw-bold">Sign in FOR Solution for Recruiter, Employer and Applicant</h1>
                <ul class="d-flex justify-content-center align-items-center list-unstyled py-3">
                    <li>
                        <a href="{{route('google.login')}}" ><img src="{{ asset('images/google.svg') }}" alt="google" class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="{{route('linkedin.login')}}" ><img src="{{ asset('images/linkedin.svg') }}" alt="linkedin" class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" target="_blank"><img src="{{ asset('images/twitter.svg') }}" alt="twitter" class="img-fluid"></a>
                    </li>
                </ul>
                <p class="text-grey fs-14 mb-0 text-center or"> Or</p> --}}
                    <form method="POST" action="{{ route('login') }}" class="row g-3">
                        @csrf

                        <div class="col-12">
                            <label for="email"
                                class="form-label fs-14 text-theme-primary fw-bold">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email"
                                class="form-control fs-14 bg-theme-secondary border-0 h-50px @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="password"
                                class="form-label fs-14 text-theme-primary fw-bold">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control fs-14 bg-theme-secondary border-0 h-50px @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> --}}
                        <div class="col-12">
                            <button type="submit" class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3">Sign
                                In</button>
                        </div>
                        <div class="col-12 text-center">
                            <label class="form-check-label text-grey text-center  fs-14" for="gridCheck">
                                Don't Have Account? <a href="{{ route('register') }}"
                                    class="text-theme-primary text-decoration-underline"> Sign Up</a>
                            </label>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {{-- <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button> --}}

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
