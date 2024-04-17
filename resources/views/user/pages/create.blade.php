@extends('admin.layouts.pages-layouts')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Junkshop')
@section('pageHeader')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class ="card-body">
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
                        <button type="button" class="btn btn-outline-primary">Add Task</button>
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
                <hr>
                <h1>Add a Task</h1>
                <form method="post" action="{{route('admin.pages.task.store')}}">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Task Code</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('code')]) name="code">
                            <div class="invalid-feedback">{{ $errors->first('code') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Month</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('month')]) name="month">
                            <div class="invalid-feedback">{{ $errors->first('month') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Year</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('year')]) name="year">
                            <div class="invalid-feedback">{{ $errors->first('year') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('description')]) name="description">
                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Budget Hours</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('budget_hrs')]) name="budget_hrs">
                            <div class="invalid-feedback">{{ $errors->first('budget_hrs') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Total Hours</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('total_hrs')]) name="total_hrs">
                            <div class="invalid-feedback">{{ $errors->first('total_hrs') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Notes</label>
                            <textarea @class(['form-control', 'is-invalid' => $errors->has('notes')]) name="notes"></textarea>
                            <div class="invalid-feedback">{{ $errors->first('notes') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Approval Date</label>
                            <input type="date" @class([
                                'form-control',
                                'is-invalid' => $errors->has('approval_date')]) name="approval_date">
                            <div class="invalid-feedback">{{ $errors->first('approval_date') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Approver ID</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('approver_id')]) name="approver_id" value="{{ $task->approver_id }}">
                            <div class="invalid-feedback">{{ $errors->first('approver_id') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Assigned ID</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('assigned_id')]) name="assigned_id" value="{{ $task->assigned_id }}">
                            <div class="invalid-feedback">{{ $errors->first('assigned_id') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Creator ID</label>
                            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('creator_id')]) name="creator_id" value="{{ $task->creator_id }}">
                            <div class="invalid-feedback">{{ $errors->first('creator_id') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Add Task" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('pageFooter')
