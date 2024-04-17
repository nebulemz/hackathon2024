<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>@yield('pageTitle')</title>
        <link href="{{ asset('/assets/dist/css/tabler.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
        @stack('stylesheets')
        <link href="./assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
        <style>
            @import url('https://rsms.me/inter/inter.css');

            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }

            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>
    </head>

    <body class="d-flex flex-column bg-white">
        @include('components.toaster')
        <script src="{{ asset('/assets/dist/js/demo-theme.min.js') }}"></script>
        @yield('content')
        <!-- Libs JS -->
        <!-- Tabler Core -->
        <script src="{{ asset('/assets/dist/js/tabler.min.js') }}" defer></script>
        @stack('scripts')
        <script src="{{ asset('/assets/dist/js/demo.min.js') }}" defer></script>
    </body>

</html>
