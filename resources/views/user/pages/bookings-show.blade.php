@extends('user.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Bookings')
@section('pageHeader')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" id="tag_container">
                    <div id='map' style='width: 100%; height: 400px;'></div>
                    @include('user.pages.bookings-table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    @foreach ($bookings as $booking)
        <div class="modal" id="booking-rate-{{ $booking->id }}" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Booking for {{ $booking->junkshop_name }} Booking</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ITEM NAME</th>
                                        <th>UNIT OF MEASURE</th>
                                        <th>PRICE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($booking->junkshop_name as $junkshopBook)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $junkshopBook->address }}</td>
                                            <td>{{ $junkshopBook->status }}</td>
                                            <td>{{ $junkshopBook->description }}</td>
                                            <td>{{ $junkshopBook->schedule}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                @include('components.empty-table', [
                                                    'message' => 'Empty rates.',
                                                ])
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('scripts')
    <script>
        mapboxgl.accessToken = '{{ env('MAPBOX_PUBLIC_TOKEN') }}';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [120.97710231764093, 14.58918171014233], // starting position [lng, lat]
            zoom: 14, // starting zoom
        });
        @foreach ($bookings as $booking)
            new mapboxgl.Marker()
                .setLngLat([{{ $booking->longitude }}, {{ $booking->latitude }}])
                .addTo(map);
        @endforeach

        async function centerMap(lat, lng) {
            map.flyTo({
                center: [lng, lat],
                essential: true
            });
        }
    </script>
@endpush
