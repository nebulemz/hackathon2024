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
                    Register a junkshop.
                </h2>
                <form action="{{ route('register.junkshop.process') }}" method="POST" autocomplete="off" novalidate="">
                    @csrf
                    <input type="hidden" name="user_email" value="{{ $user->email }}">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control" type="email" name="name" placeholder="Enter your junkshop name"
                            autocomplete="off">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Address
                        </label>
                        <div class="input-group input-group-flat">
                            <input class="form-control" type="text" name="address" placeholder="Address"
                                autocomplete="off">
                        </div>
                        <input type="hidden" name="latitude" value="{{ fake()->latitude() }}">
                        <input type="hidden" name="longitude" value="{{ fake()->longitude() }}">
                    </div>
                    <div class="form-footer">
                        <button class="btn btn-teal w-100" type="submit">Register</button>
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
