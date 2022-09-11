@extends('layouts.backend.master')
@section('title')
    - {{ __('backend/transactions.add_transaction') }}
@endsection



@section('css')

@endsection



@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('backend/transactions.add_transaction') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('backend/transactions.add_transaction') }}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-30" role="document">
        <div class="card card-statistics h-100">
            <div class="card-header">
                <div class="card-title"><div class="mb-30">
                        <h2>{{ __('backend/transactions.add_transaction') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.messages')
                <form action="{{ route('transactions.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="warehouse_id">{{ __('backend/warehouses.warehouse_name') }}</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control p-1">
                                <option value="" disabled selected>{{ __('backend/products.select') }}</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="transaction_type_id">{{ __('backend/transactions.transaction_type') }}</label>
                            <select name="transaction_type_id" id="transaction_type_id" class="form-control p-1">
                                <option value="" disabled selected>{{ __('backend/products.select') }}</option>
                                @foreach($transaction_types as $type)
                                    <option value="{{ $type->id }}" data-value="{{$type->value}}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col">
                            <label for="product_id">{{ __('backend/products.name') }}</label>
                            <select name="product_id" id="product_id" class="form-control p-1">
                                <option value="" disabled selected>{{ __('backend/products.select') }}</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-uom_id="{{ $product->uom_id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

{{--                        <div class="col">--}}
{{--                            <label for="uom_id">{{ __('backend/products.uom') }}</label>--}}
{{--                            <select name="uom_id" id="uom_id" class="form-control p-1" disabled>--}}
{{--                                <option value="" selected disabled>{{ __('backend/products.select') }}</option>--}}
{{--                                @foreach($uoms as $uom)--}}
{{--                                    <option value="{{ $uom->id }}">{{ $uom->uom_name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        <div class="col">
                            <label for="qty">{{ __('backend/transactions.qty') }}</label>
                            <input type="number" name="qty_given" id="qty" class="form-control">
                            <input type="hidden" name="qty" id="qty" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="ar_notes">{{ __('backend/transactions.ar_notes') }}</label>
                            <textarea class="form-control" name="ar_notes" id="ar_notes" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label for="en_notes">{{ __('backend/transactions.en_notes') }}</label>
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
<script>

    //select uom automatically when select product
    // $('select#product_id').on('change', function (){
    //     let uom_id = $(this).children('option:selected').data('uom_id')
    //     $('select#uom_id').children('option[value="' + uom_id +'"]').attr('selected', true).siblings().each(function(){
    //         $(this).attr('selected' , false);
    //     });
    // });

    //calculate qty when transaction type or qty_given changed
    $(document).ready(function(){
        let transactionType = $('select#transaction_type_id') ,
            qtyGiven = $('input[name="qty_given"]');

        $.merge(transactionType, qtyGiven).on('change', function(){
            let transactionValue = transactionType.children('option:selected').data('value');
            let qty = qtyGiven.val()
            $('input[name="qty"]').val( transactionValue * qty);
        });
    });

</script>
@endsection
