@extends('auth.layouts.auth-layout')
@section('pageTitle', $pageTitle ?? 'Register')
@section('content')
    <div class="page page-center">
        <div class="container-tight container py-4">
            <div class="mb-4 text-center">
                <a class="navbar-brand navbar-brand-autodark" href="."><img src="{{ asset('/assets/static/logo.svg') }}"
                        height="36" alt=""></a>
            </div>
            <form class="card card-md" action="{{ route('register') }}" method="POST" autocomplete="off" novalidate="">
                @csrf
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">Create new account</h2>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input class="form-control" type="password" name="password" placeholder="Password"
                                autocomplete="off">
                            <span class="input-group-text">
                                <a class="link-secondary" data-bs-toggle="tooltip" data-bs-original-title="Show password"
                                    href="#" aria-label="Show password">
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
                    <div class="mb-3">
                        <label class="form-label">Confirm passowrd</label>
                        <div class="input-group input-group-flat">
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Password"
                                autocomplete="off">
                            <span class="input-group-text">
                                <a class="link-secondary" data-bs-toggle="tooltip" data-bs-original-title="Show password"
                                    href="#" aria-label="Show password">
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
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_junkshop">
                            <span class="form-check-label"><a tabindex="-1">Register as a Junkshop owner</a>.</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button class="btn btn-teal w-100" type="submit">Create new account</button>
                    </div>
                </div>
            </form>
            <div class="text-muted mt-3 text-center">
                Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
            </div>
        </div>
    </div>
@endsection
