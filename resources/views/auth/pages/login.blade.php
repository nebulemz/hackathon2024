@extends('auth.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container-tight px-lg-5 container my-5">
                <div class="mb-4 text-center">
                    <a class="navbar-brand navbar-brand-autodark" href="."><img
                            src="{{ asset('/images/logo/logo150x300wbg.svg') }}" alt=""></a>
                </div>
                <h2 class="h3 mb-3 text-center">
                    Login to your account
                </h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                {{-- <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate=""> --}}
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input class="form-control" type="email" name="email" placeholder="your@email.com"
                        autocomplete="off">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Password
                        <span class="form-label-description">
                            <a href="#">I forgot my password</a>
                        </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input class="form-control" type="password" name="password" placeholder="Your password"
                            autocomplete="off">
                        <span class="input-group-text">
                            <a class="link-secondary" data-bs-toggle="tooltip" data-bs-original-title="Show password"
                                href="#"
                                aria-label="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <span class="form-check-label">Remember me on this device</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button class="btn btn-teal w-100" type="submit">Sign in</button>
                </div>
                </form>
                <div class="text-muted mt-3 text-center">
                    {{-- Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a> --}}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="h-100 min-vh-100 bg-cover"
                style="background-image: url({{ asset('/assets/static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg') }}">
            </div>
        </div>
    </div>

@endsection
