<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        @yield('page-title', env('APP_NAME'))
    </title>
    <!-- CSS files -->

    <link href="{{ asset('/assets/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/dist/css/tabler-icons.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @stack('styles')
    {{-- @vite('resources/js/app.js') --}}
</head>

<body>
    @include('components.toaster')
    <div class="page">
        <!-- Page header -->
        @include('junkshop.layouts.header')
        <div class="page-wrapper">
            @yield('content')
            <!-- Page body -->
            @include('junkshop.layouts.footer')
        </div>
    </div>
    @yield('modals')

    <!-- Libs JS -->
    <script src="{{ asset('/assets/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('/assets/dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('/assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('/assets/dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('/assets/dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('/assets/dist/js/demo.min.js') }}" defer></script>
    {{-- Ajax-Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>
