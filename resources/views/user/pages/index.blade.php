@extends('user.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'User Dashboard')
@section('pageHeader')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" id="tag_container">
                    <div id='map' style='width: 100%; height: 400px;'></div>
                    @include('user.pages.junkshops-table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    @foreach ($junkshops as $junkshop)
        <div class="modal" id="junkshop-rate-{{ $junkshop->id }}" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Rates for {{ $junkshop->name }} Junkshop</h5>
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
                                    @forelse ($junkshop->rates as $junkshopRate)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $junkshopRate->name }}</td>
                                            <td>{{ $junkshopRate->unit }}</td>
                                            <td>{{ $junkshopRate->price }}</td>
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

        <div class="modal" id="junkshop-book-{{ $junkshop->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <form class="modal-content" action="{{ route('user.pages.bookings.store', $junkshop->id) }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Book {{ $junkshop->name }} Shop.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label>Special Instructions (Description)</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label>Scheduled Date and Time</label>
                                <input type="datetime-local" name="schedule" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-teal" value="Submit" />
                    </div>
                </form>
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
        @foreach ($junkshops as $junkshop)
            new mapboxgl.Marker()
                .setLngLat([{{ $junkshop->longitude }}, {{ $junkshop->latitude }}])
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
