@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-lg-2 sign-up">
        <div class="col px-0 ">
            <div class="banner"></div>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <div class="p-x-70 p-y-20">
                <h1 class="text-theme-primary text-uppercase mb-0 text-center fs-18 fw-bold">Register</h1>
                {{-- <ul class="d-flex justify-content-center align-items-center list-unstyled py-3">
                    <li>
                        <a href="https://google.com" target="_blank"><img src="{{ asset('images/google.svg') }}" alt="google" class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="https://lnkd.in/" target="_blank"><img src="{{ asset('images/linkedin.svg') }}" alt="linkedin" class="img-fluid"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" target="_blank"><img src="{{ asset('images/twitter.svg') }}" alt="twitter" class="img-fluid"></a>
                    </li>
                </ul>

                <p class="text-grey fs-14 mb-0 text-center or"> Or</p> --}}
                <!--@error('email') <span class="text-danger error">{{ $message }}</span>@enderror-->
                @if($errors->any())
                  {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                <form method="POST" action="{{ route('register') }}" class="row g-3">
                    @csrf

                    <div class="col-md-6">
                        <label for="name" class="form-label fs-14 text-theme-primary fw-bold">{{ __('Full Name') }}</label>
                        <input id="name" type="text" class="form-control fs-14 bg-theme-secondary border-0 h-50px @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Username</label>
                        <input type="text" class="form-control fs-14 bg-theme-secondary border-0 h-50px" id="" name="username">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label fs-14 text-theme-primary fw-bold">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control fs-14 bg-theme-secondary border-0 h-50px" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label fs-14 text-theme-primary fw-bold">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control fs-14 bg-theme-secondary border-0 h-50px @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="password-confirm" class="form-label fs-14 text-theme-primary fw-bold">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control fs-14 bg-theme-secondary border-0 h-50px" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="col-12">
                        <label for="role" class="form-label fs-14 text-theme-primary fw-bold">{{ __('Sign up As') }}</label>
                        <select id="role" name="role" class="form-control fs-14 bg-theme-secondary border-0 h-50px" required>
                            <option value="">Select Role</option>
                            {{-- <option value="admin">Admin</option> --}}
                                <option value="buyer">Renter</option>
                                <option value="seller">Host</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-check py-2 ">
                            <input class="form-check-input rounded-0" type="checkbox" id="gridCheck">
                            <label class="form-check-label text-grey fs-14" for="gridCheck">
                                I agree with the <a href="#" class="text-theme-primary text-decoration-underline"> Privacy & Policy</a>
                        </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn button-2 btn-primary fs-4 fw-600 w-100 mb-3">Create Account</button>
                    </div>
                    <div class="col-12 text-center">
                        <label class="form-check-label text-grey text-center  fs-14" for="gridCheck">
                            Already a member? <a href="{{ route('login') }}" class="text-theme-primary text-decoration-underline"> Sign in</a>
                        </label>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
