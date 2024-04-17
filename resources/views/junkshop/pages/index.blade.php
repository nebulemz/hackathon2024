@extends('junkshop.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Junkshop Dashboard')
@section('pageHeader')
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row g-3">
            <div class="card col-12 col-md-6">
                <div class="card-body">
                    <h3 class="card-title">Available Bookings</h3>
                    @include('junkshop.pages.available-bookings-table')
                </div>
            </div>
            <div class="card col-12 col-md-6">
                <div class="card-body">
                    <h3 class="card-title">Total Bookings</h3>
                    @include('junkshop.pages.total-bookings-table')
                </div>
            </div>
            <div class="card col-12">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>

                        </div>
                        <div>
                            <a class="btn btn-outline-primary" href="{{ route('junkshop.pages.rates.create') }}">Add
                                Inventory</a>
                            <button type="button" class="btn btn-outline-success">Update Inventory</button>
                        </div>
                    </div>
                    <div class="table-responsive" id="tag_container">
                        @include('junkshop.pages.rates-table')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

    @push('scripts')
        {{-- @include('_common.scripts.ajax-table-js') --}}
    @endpush
