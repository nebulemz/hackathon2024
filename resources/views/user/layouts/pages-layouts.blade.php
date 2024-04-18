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
    <link href='https://api.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css' rel='stylesheet' />
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
    @yield('modals')
    <div class="page">
        <!-- Page header -->
        @include('user.layouts.header')
        <div class="page-wrapper">
            @yield('content')
            <!-- Page body -->
            @include('user.layouts.footer')
        </div>
    </div>


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
    <script src='https://api.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js'></script>

    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyAHv9dGlK4BtbyuVplUHLPJA4aQ4SjnWwA", v: "weekly"});</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
		var s, t; s = document.createElement("script"); s.type = "text/javascript";
		s.src = "//cdn.dayspedia.com/js/dwidget.min.vc01b6c64.js";
		t = document.getElementsByTagName('script')[0]; t.parentNode.insertBefore(s, t);
		s.onload = function() {
			window.dwidget = new window.DigitClock();
			window.dwidget.init("dayspedia_widget_6168cfefc63a2f19");
		};
	</script>

    @stack('scripts')
</body>

</html>
