@extends('admin.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Junkshop')
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
                        <a class="btn btn-outline-primary" href="{{ route('admin.pages.Junkshop.create') }}">Add Junkshop</a>
                        <button type="button" class="btn btn-outline-success">Import</button>
                        <div class="d-inline-block">
                            <button class="btn btn-outline-warning dropdown-toggle btn-md" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Bulk Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" id="tag_container">
                    @include('admin.pages.Junkshop.table', ['Junkshops' => $Junkshops])
                </div>
            </div>
        </div>
    </div>
    <div class="card-body border-bottom py-3">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </div>
@endsection

@section('pageFooter')
    @push('scripts')
        @include('_common.scripts.ajax-table-js')
    @endpush
