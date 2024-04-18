@extends('user.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'User Dashboard')
@section('pageHeader')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2 class="text-center">
                        Book {{ $junkshop->name }} Junkshop.
                    </h2>
                </div>
                <form action="" method="POST" id="tag_container">
                    @csrf
                    <div id='map' style='width: 100%; height: 400px;'></div>
                    <input type="hidden" name="latitude" id="lng">
                    <input type="hidden" name="longitude" id="lat">
                    <input type="hidden" name="junkshop_id" value="{{ $junkshop->id }}">
                    <div class="my-3">
                        <label class="form-label">Junkshop Name</label>
                        <input class="form-control" value="{{ $junkshop->name }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Junkshop Address</label>
                        <input class="form-control" value="{{ $junkshop->address }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Address <small>(Click on the map)</small> </label>
                        <input class="form-control" name="address" id="address" readonly required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <small>(special instructions etc.)</small> </label>
                        <textarea class="form-control" name="description" required> </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Contact Details <small>(Either phone or email)</small> </label>
                        <input class="form-control" name="contact_detail" value="{{ auth()->user()->email }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Schedule</label>
                        <input class="form-control" name="schedule" value="{{ now()->addDay()->format('Y-m-d\TH:i') }}"
                            type="datetime-local" min="{{ now()->addHour()->format('Y-m-d\TH:i') }}" required />
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-teal w-100" type="submit"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        map.on('click', (e) => {
            const lngLat = e.lngLat;
            reverseGeocode(lngLat).then((data) => {
                document.getElementById('address').value = data.features[0].place_name;
                removeMarkers();
                addMarker(e.lngLat.lng, e.lngLat.lat, true);
                document.getElementById('lat').value = e.lngLat.lat;
                document.getElementById('lng').value = e.lngLat.lng
            });
        });
        map.on('load', function() {
            addMarker({{ $junkshop->longitude }}, {{ $junkshop->latitude }});
        });
    </script>
@endpush
