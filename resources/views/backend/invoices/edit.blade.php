@extends('layouts.backend.master')
@section('title')
    - {{ __('backend/invoices.add_invoice') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('backend/invoices.edit_invoice') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/invoices.edit_invoice') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-30" role="document">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <div class="card-title"><div class="mb-30">
                            <h2>{{ __('backend/invoices.edit_invoice') }}</h2></div>
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.messages')
                    <form action="{{ route('invoices.update', $invoice) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $invoice->id }}">
                        <div class="row">
                            <div class="col">
                                <label>{{ __('backend/invoices.ar_invoice_name') }}</label>
                                <input type="text" name="name" value="{{ $invoice->getTranslation('name','ar') }}" class="form-control" >
                            </div>
                            <div class="col">
                                <label>{{ __('backend/invoices.en_invoice_name') }}</label>
                                <input type="text" name="name_en" value="{{ $invoice->getTranslation('name','en') }}" class="form-control" >
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label>{{ __('backend/invoices.category_name') }}</label>
                                <select name="category_id" class="form-control p-1" id="">
                                    <option value="" disabled>{{ __('backend/invoices.select') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $invoice->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label>{{ __('backend/invoices.uom') }}</label>
                                <select name="uom_id" class="form-control p-1" id="">
                                    <option value="" disabled>{{ __('backend/invoices.select') }}</option>
                                    @foreach($uoms as $uom)
                                        <option value="{{ $uom->id }}" {{ $uom->id == $invoice->uom_id ? 'selected' : '' }}>{{ $uom->uom_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>{{ __('backend/invoices.price') }}</label>
                                <input type="number" name="price" value="{{ $invoice->price }}" class="form-control" >
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label>{{ __('backend/invoices.ar_notes') }}</label>
                                <textarea class="form-control" name="ar_notes" rows="5">{{ $invoice->getTranslation('notes','ar') }}</textarea>
                            </div>
                            <div class="col">
                                <label>{{ __('backend/invoices.en_notes') }}</label>
                                <textarea class="form-control" name="en_notes" rows="5">{{ $invoice->getTranslation('notes','en') }}</textarea>
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
