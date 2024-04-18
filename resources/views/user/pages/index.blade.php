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
                        List of Junkshops
                    </h2>
                </div>
                <div class="table-responsive" id="tag_container">
                    <div id='map' style='width: 100%; height: 400px;'></div>
                    @include('user.pages.junkshops-table')
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="card-title">
                    <h2 class="text-center">
                        List of Bookings
                    </h2>
                </div>
                @include('user.pages.bookings-table')
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
    @endforeach

@endsection

@push('scripts')
    <script type="module">
        map.on('load', () => {
            @foreach ($junkshops as $junkshop)
                addMarker({{ $junkshop->longitude }}, {{ $junkshop->latitude }})
            @endforeach
        });
    </script>
@endpush
