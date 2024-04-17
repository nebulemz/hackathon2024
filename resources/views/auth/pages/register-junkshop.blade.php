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
                            Address (Click at the map)
                        </label>
                        <div class="input-group input-group-flat">
                            <input class="form-control" type="text" id="address" name="address" placeholder="Address"
                                autocomplete="off">
                        </div>
                        <input type="hidden" name="latitude" id="lat">
                        <input type="hidden" name="longitude" id="lng">
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
        <div class="col-12 col-lg-6 col-xl-8 d-lg-block">
            <!-- Photo -->
            <div class="h-100 min-vh-100 bg-cover" id="map">
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        mapboxgl.accessToken = '{{ env('MAPBOX_PUBLIC_TOKEN') }}';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [120.97710231764093, 14.58918171014233], // Default map center
            zoom: 14 // Default zoom level
        });

        var markers = [];

        map.on('click', function(e) {
            var lngLat = e.lngLat;

            // Call reverse geocoding API
            reverseGeocode(lngLat);
            removeMarkers();
            addMarker(e.lngLat);

            document.getElementById('lat').value = e.lngLat.lat
            document.getElementById('lng').value = e.lngLat.lng
        });

        function addMarker(lngLat) {
            var marker = new mapboxgl.Marker()
                .setLngLat(lngLat)
                .addTo(map);

            markers.push(marker);
        }

        function removeMarkers() {
            // Remove all markers from the map
            markers.forEach(marker => marker.remove());
            markers = []; // Reset markers array
        }

        function reverseGeocode(lngLat) {
            fetch(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${lngLat.lng},${lngLat.lat}.json?access_token=${mapboxgl.accessToken}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    var location = data.features[0];
                    if (location) {
                        document.getElementById('address').value = location.place_name;
                        // Do something with the location data
                    } else {
                        alert('Location not found');
                    }
                })
                .catch(error => {
                    alert('Error fetching location data');
                });
        }
    </script>
@endpush
