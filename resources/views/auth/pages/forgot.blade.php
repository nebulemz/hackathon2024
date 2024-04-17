@extends('auth.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Forgot-Password')
@section('content')

    <body class="d-flex flex-column">
        <script src="./dist/js/demo-theme.min.js?1684106062"></script>
        <div class="page page-center">
            <div class="container-tight container py-4">
                <div class="mb-4 text-center">
                    <a class="navbar-brand navbar-brand-autodark" href="."><img src="./static/logo.svg" height="36"
                            alt=""></a>
                </div>
                <form class="card card-md" action="./" method="get" autocomplete="off" novalidate="">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <h2 class="card-title">Account Locked</h2>
                            <p class="text-muted">Please enter your password to unlock your account</p>
                        </div>
                        <div class="mb-4">
                            <span class="avatar avatar-xl mb-3"
                                style="background-image: url(./assets/static/avatars/000m.jpg)"></span>
                            <h3>Paweł Kuna</h3>
                        </div>
                        <div class="mb-4">
                            <input class="form-control" type="password" placeholder="Password…">
                        </div>
                        <div>
                            <a class="btn btn-primary w-100" href="#">
                                <!-- Download SVG icon from http://tabler-icons.io/i/lock-open -->
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                                    </path>
                                    <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
                                </svg>
                                Unlock
                            </a>
                        </div>
                        <br>
                        <div>
                            {{-- <a class="btn btn-primary w-100" href="{{ route('auth.login') }}">Return</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Libs JS -->
        <!-- Tabler Core -->
        <script src="./dist/js/tabler.min.js?1684106062" defer=""></script>
        <script src="./dist/js/demo.min.js?1684106062" defer=""></script>

    </body>


@endsection
