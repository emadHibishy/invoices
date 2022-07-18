@extends('layouts.backend.master')
@section('title')
    - {{ __('backend/products.add_product') }}
@endsection



@section('css')

@endsection



@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('backend/products.add_product') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('backend/products.add_product') }}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-30" role="document">
        <div class="card card-statistics h-100">
            <div class="card-header">
                <div class="card-title"><div class="mb-30">
                        <h2>{{ __('backend/products.add_product') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{ __('backend/products.ar_product_name') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is_invalid> @enderror" >
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ __('backend/products.en_product_name') }}</label>
                            <input type="text" name="name_en" class="form-control @error('name_en') is_invalid> @enderror" >
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>{{ __('backend/products.category_name') }}</label>
                            <select name="category_id" class="form-control p-1" id="">
                                <option value="" disabled selected>{{ __('backend/products.select') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label>{{ __('backend/products.price') }}</label>
                            <input type="number" name="price" class="form-control @error('price') is_invalid> @enderror" >
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>{{ __('backend/products.ar_notes') }}</label>
                            <textarea class="form-control" name="ar_notes" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label>{{ __('backend/products.en_notes') }}</label>
                            <textarea class="form-control" name="en_notes" rows="5"></textarea>
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
