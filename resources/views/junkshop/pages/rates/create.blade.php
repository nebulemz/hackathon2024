@extends('junkshop.layouts.pages-layouts')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Junkshop Inventory')
@section('pageHeader')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class ="card-body">
                <h1>Add Inventory</h1>
                <form method="post" action="{{route('junkshop.pages.store')}}">
                    @csrf
                    @method('post')
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
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-teal" value="Add Inventory" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('pageFooter')
