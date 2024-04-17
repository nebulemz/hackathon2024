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
                            <button type="button" class="btn btn-outline-teal" data-bs-toggle="modal"
                                data-bs-target="#create-rate">
                                Add Inventory
                            </button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
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

@section('modals')
    <div class="modal" id="create-rate" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <form class="modal-content" action="{{ route('junkshop.pages.rates.store') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add inventory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="junkshop_id" value="{{ $junkshop->id }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>ITEM NAME</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) name="name">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>PRICE</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('price')]) name="price">
                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>UNIT OF MEASUREMENT</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('unit')]) name="unit">
                            <div class="invalid-feedback">{{ $errors->first('unit') }}</div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-teal" value="Submit" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($rates as $junkshopRate)
        <div class="modal" id="edit-rate-{{ $junkshopRate->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <form class="modal-content" action="{{ route('junkshop.pages.rates.update', $junkshopRate->id) }}"
                    method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit inventory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>ITEM NAME</label>
                                <input type="text" @class(['form-control']) name="name"
                                    value="{{ $junkshopRate->name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>PRICE</label>
                                <input type="text" @class(['form-control']) name="price"
                                    value="{{ $junkshopRate->price }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>UNIT OF MEASUREMENT</label>
                                <input type="text" @class(['form-control']) name="unit"
                                    value="{{ $junkshopRate->unit }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-teal" value="Edit" />
                    </div>
                </form>
            </div>
        </div>


        <div class="modal" id="delete-rate-{{ $junkshopRate->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <form class="modal-content" method="POST"
                    action="{{ route('junkshop.pages.rates.destroy', $junkshopRate->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-warning"></div>
                    <div class="modal-body text-center py-4">
                        <h3 class="mt-2">You are about to delete a {{ $junkshopRate->name }} junkshop rate</h3>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Cancel
                                    </a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger  w-100" data-bs-dismiss="modal">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
@push('scripts')
    {{-- @include('_common.scripts.ajax-table-js') --}}
@endpush
