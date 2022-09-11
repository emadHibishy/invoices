@extends('layouts.backend.master')
@section('title')
     - {{ __('backend/transactions.warehouse_transactions') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('backend/transactions.warehouse_transactions') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/transactions.warehouse_transactions') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('backend.messages')
                <div class="row">
                    <div class="col mb-3">
                        <a href="{{ route('transactions.create') }}" class="btn btn-success" role="button">{{ __('backend/transactions.add_transaction') }}</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/transactions.transaction_number') }}</th>
                                <th>{{ __('backend/transactions.transaction_type') }}</th>
                                <th>{{ __('backend/warehouses.code') }}</th>
                                <th>{{ __('backend/products.name') }}</th>
                                <th>{{ __('backend/transactions.status') }}</th>
                                <th>{{ __('backend/transactions.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->transaction_number }}</td>
                                <td>{{ $transaction->transaction_type->type_name }}</td>
                                <td>{{ $transaction->warehouse->code }}</td>
                                <td>{{ $transaction->product->name }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>
                                    <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-success btn-sm" title="{{ __('backend/transactions.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-transaction_id="{{ $transaction->id }}" title="{{ __('backend/transactions.delete') }}" data-toggle="modal" data-target="#deletetransaction">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"><p class="text-danger text-center">{{ __('backend/transactions.no_transations') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.transactions.delete')
@endsection



@section('js')
    <script>
        $('#deletetransaction').on('show.bs.modal', function(event){
            let button = $(event.relatedTarget)
            let transaction_id = button.data('transaction_id')
            let modal = $(this)
            modal.find('.modal-body #transaction_id').val(transaction_id)
        })
    </script>

@endsection
