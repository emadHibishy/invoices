@extends('layouts.backend.master')
@section('title')
    - {{ __('backend/warehouses.add_warehouse') }}
@endsection



@section('css')

@endsection



@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('backend/warehouses.add_warehouse') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('backend/warehouses.add_warehouse') }}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-30" role="document">
        <div class="card card-statistics h-100">
            <div class="card-header">
                <div class="card-title"><div class="mb-30">
                        <h2>{{ __('backend/warehouses.add_warehouse') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('warehouses.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="code">{{ __('backend/warehouses.code') }}</label>
                            <input type="text" name="code" class="form-control @error('code') is_invalid @enderror">
                            @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col">
                            <label>{{ __('backend/warehouses.ar_warehouse_name') }}</label>
                            <input type="text" name="ar_warehouse_name" class="form-control @error('ar_warehouse_name') is_invalid> @enderror" >
                            @error('ar_warehouse_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ __('backend/warehouses.en_warehouse_name') }}</label>
                            <input type="text" name="en_warehouse_name" class="form-control @error('en_warehouse_name') is_invalid> @enderror" >
                            @error('en_warehouse_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>{{ __('backend/warehouses.ar_description') }}</label>
                            <textarea class="form-control" name="ar_description" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label>{{ __('backend/warehouses.en_description') }}</label>
                            <textarea class="form-control" name="en_description" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col">
                            <button type="submit" class="btn btn-lg btn-success" >{{ __('backend/categories.submit') }}</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection



@section('js')

@endsection
