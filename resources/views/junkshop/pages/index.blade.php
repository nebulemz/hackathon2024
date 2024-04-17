@extends('junkshop.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Junkshop Dashboard')
@section('pageHeader')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="ms-auto text-muted">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" class="form-control form-control-md" aria-label="Search invoice">
                            </div>
                            Show
                            <div class="mx-2 d-inline-block">
                                <button class="btn white dropdown-toggle btn-md px-3" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown button
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            Entries
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-outline-primary" href="{{ route('junkshop.pages.rates.create') }}">Add Inventory</a>
                        <button type="button" class="btn btn-outline-success">Update Inventory</button>
                    </div>
                </div>
                <div class="table-responsive" id="tag_container">
                    @include('junkshop.pages.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pageFooter')
    @push('scripts')
        {{-- @include('_common.scripts.ajax-table-js') --}}
    @endpush
