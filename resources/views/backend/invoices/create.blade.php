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
            <h4 class="mb-0">{{ __('backend/invoices.add_invoice') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('backend/invoices.add_invoice') }}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-30" role="document">
        <div class="card card-statistics h-100">
            <div class="card-header">
                <div class="card-title"><div class="mb-30">
                        <h2>{{ __('backend/invoices.add_invoice') }}</h2></div>
                </div>
            </div>
            <div class="card-body">
                <form class="test" action="{{ route('invoices.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="warehouse_id">{{ __('backend/invoices.warehouse') }}</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control p-1 @error('warehouse') is_invalid> @enderror" >
                                <option value="" disabled selected>{{ __('backend/invoices.select') }}</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                            @error('warehouse')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="customer_id">{{ __('backend/invoices.customer') }}</label>
                            <select name="customer_id" id="customer_id" class="form-control p-1 @error('customer') is_invalid> @enderror" >
                                <option value="" disabled selected>{{ __('backend/invoices.select') }}</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">

                        <div class="col">
                            <label for="payment_term_id">{{ __('backend/invoices.payment_terms') }}</label>
                            <select name="payment_term_id" id="payment_term_id" class="form-control p-1 @error('payment_terms') is_invalid> @enderror" >
                                <option value="" disabled selected>{{ __('backend/invoices.select') }}</option>
                                @foreach($payment_terms as $payment_term)
                                    <option value="{{ $payment_term->id }}">{{ $payment_term->name }}</option>
                                @endforeach
                            </select>
                            @error('payment_terms')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="invoice_date">{{ __('backend/invoices.invoice_date') }}</label>
                            <input
                                class="form-control"
                                data-provide="datepicker"
                                type="text"
                                id="invoice_date"
                                name="invoice_date"
                                data-date-format="yyyy-mm-dd"
                            />
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col">
                            <label for="total_lines">{{ __('backend/invoices.total_lines') }}</label>
                            <input
                                class="form-control"
                                type="number"
                                id="total_lines"
                                name="total_lines"
                                disabled
                            />
                        </div>
                        <div class="col">
                            <label for="total_tax">{{ __('backend/invoices.total_tax') }}</label>
                            <input
                                class="form-control"
                                type="number"
                                id="total_tax"
                                name="total_tax"
                                disabled
                            />
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col">
                            <label for="freight">{{ __('backend/invoices.freight') }}</label>
                            <input
                                class="form-control"
                                type="number"
                                id="freight"
                                name="freight"
                            />
                        </div>
                        <div class="col">
                            <label for="total">{{ __('backend/invoices.total') }}</label>
                            <input
                                class="form-control"
                                type="number"
                                id="total"
                                name="total"
                                disabled
                            />
                        </div>
                    </div>
                    <div class="card mt-30">
                        <div class="card-header bg-transparent border-0 pb-0">
                            <div class="card-title border-0">
                                <h4>{{ __('backend/invoices.products') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" parent repeater">
                                <div  data-repeater-list="invoice_products">
                                    <div data-repeater-item>
                                        <div class="obj row">
                                            <div class="col">
                                                <label for="product_id">{{ __('backend/invoices.product') }}</label>
                                                <select name="product_id" id="product_id" class="form-control p-1 @error('product') is_invalid> @enderror" >
                                                    <option value="" disabled selected>{{ __('backend/invoices.select') }}</option>
                                                    @foreach($products as $product)
                                                        <option
                                                            value="{{ $product->id }}"
                                                            data-uom_id="{{ $product->uom_id }}"
                                                            data-price="{{ $product->price }}"
                                                        >
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('product')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="hidden" name="uom_id" id="uom_id" value="">
                                            </div>

                                            <div class="col">
                                                <label for="qty">{{ __('backend/invoices.qty') }}</label>
                                                <input type="text" name="qty" id="qty" class="form-control">
                                                <p class="text-danger d-none"></p>
                                            </div>

                                            <div class="col">
                                                <label for="price">{{ __('backend/invoices.price') }}</label>
                                                <input type="text" name="price" id="price" class="form-control" disabled>
                                            </div>

                                            <div class="col">
                                                <label for="tax">{{ __('backend/invoices.tax') }}</label>
                                                <input type="number" max="0.20" value="" name="tax_rate" id="tax_rate" class="form-control">
                                                <input type="hidden" value="" name="tax_value" id="tax_value" class="form-control">
                                            </div>

                                            <div class="col">
                                                <label for="total_line">{{ __('backend/invoices.total_line') }}</label>
                                                <input type="number" value="" id="total_line" name="total_line" class="form-control" disabled>
                                            </div>

                                            <div class="col">
                                                <label>{{ __('backend/invoices.operations') }} :</label>
                                                <input class="btn btn-danger btn-block btn-lg" data-repeater-delete type="button" value="{{ __('backend/invoices.delete') }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ __('backend/invoices.add_product') }}"/>
                                    </div>
                                </div>
                            </div>
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
        $('.datepicker').datepicker();

        $(document).ready(function(){
            $('form.test').on('change', function (){
                let objects = $('.obj'),
                    warehouse_id = $('#warehouse_id').val(),
                    total_tax = 0,
                    total_lines = 0,
                    total = 0;
                for(object of objects){
                    let obj = $(object),
                        prodId = obj.find('#product_id').val(),
                        price = obj.find('#product_id').children('option:selected').data('price'),
                        uom_id = obj.find('#product_id').children('option:selected').data('uom_id');
                    obj.find('#uom_id').val(uom_id);
                    obj.find('#price').val(price);

                        console.log('WAREHOUSE: ' + warehouse_id)
                        console.log('PRODUCT: ' + prodId)

                    if(prodId && warehouse_id)
                    {
                        $.ajax({
                            url: "{{ URL::to('transactions/product_on_hand') }}/" + warehouse_id + '/' + prodId,
                            type: "GET",
                            dataType: "json",
                            success: function (data){
                                obj.find('#qty').next('p').empty().append(`{{ __('backend/invoices.onhand') }}` + data)
                                obj.find('#qty').next('p').removeClass('d-none')
                            }
                        });
                    }

                    let tax_value = price * obj.find('#tax_rate').val() * obj.find('#qty').val()
                    obj.find('#tax_value').val(tax_value);
                    total_tax += tax_value;

                    let total_line = obj.find('#qty').val() * price
                    obj.find('#total_line').val(total_line)
                    total_lines += total_line;
                }
                $('#total_tax').val(total_tax)
                $('#total_lines').val(total_lines)
                total = +total_tax + +total_lines + +$('#freight').val()
                $('#total').val(total);

            });
        });
    </script>
@endsection
