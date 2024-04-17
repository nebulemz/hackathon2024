@extends('junkshop.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'User Dashboard')
@section('pageHeader')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2 class="text-center">
                        Book {{ $booking->junkshop->name }} Junkshop.
                    </h2>
                </div>
                <div>
                    @csrf
                    <div id='map' style='width: 100%; height: 400px;'></div>
                    <div class="my-3">
                        <label class="form-label">Junkshop Name</label>
                        <input class="form-control" value="{{ $booking->junkshop->name }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Junkshop Address</label>
                        <input class="form-control" value="{{ $booking->junkshop->address }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Address <small>(Click on the map)</small> </label>
                        <input class="form-control" name="address" value="{{ $booking->user_address }}" id="address" disabled required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <small>(special instructions etc.)</small> </label>
                        <textarea class="form-control" name="description" disabled>{{ $booking->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Contact Details <small>(Either phone or email)</small> </label>
                        <input class="form-control" name="contact_detail" value="{{ $booking->user_contact }}" disabled  />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Schedule</label>
                        <input class="form-control" name="schedule" type="datetime-local" value="{{ $booking->schedule->format('Y-m-d\TH:i') }}" />
                    </div>

                    <form action="{{ route('junkshop.pages.decide', $booking->id) }}" method="POST" class="mb-3">
                        @csrf
                        <input type="hidden" name="status" value="reject">
                        <button type="submit" class="btn btn-danger w-100">
                            Reject
                        </button>
                    </form>
                    <form action="{{ route('junkshop.pages.decide', $booking->id) }}" method="POST" class="mb-3">
                        @csrf
                        <input type="hidden" name="status" value="accept">
                        <button type="submit" class="btn btn-success  w-100">
                            Accept
                        </button>
                    </form>
                </div>
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

        map.on('load', function() {
            new mapboxgl.Marker()
                .setLngLat([{{ $booking->junkshop->longitude }}, {{ $booking->junkshop->latitude }}]) // Set the marker coordinates [lng, lat]
                .addTo(map);
            new mapboxgl.Marker()
                .setLngLat([{{ $booking->user_latitude }}, {{ $booking->user_longitude }}]) // Set the marker coordinates [lng, lat]
                .addTo(map);
        });

    </script>
@endpush
