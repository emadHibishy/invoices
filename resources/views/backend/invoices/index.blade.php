@extends('layouts.backend.master')
@section('title')
     - {{ __('backend/sidebar.invoices') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('backend/sidebar.invoices') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/sidebar.invoices') }}</li>
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
                        <a href="{{ route('invoices.create') }}" class="btn btn-success" role="button">{{ __('backend/invoices.add_invoice') }}</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/invoices.number') }}</th>
                                <th>{{ __('backend/invoices.customer') }}</th>
                                <th>{{ __('backend/invoices.payment_status') }}</th>
                                <th>{{ __('backend/invoices.due_date') }}</th>
                                <th>{{ __('backend/invoices.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($invoices as $invoice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $invoice->number }}</td>
                                <td>{{ $invoice->customer->name }}</td>
                                <td>{{ $invoice->payment_status }}</td>
                                <td>{{ $invoice->due_date }}</td>
                                <td>
                                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-success btn-sm" title="{{ __('backend/invoices.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-invoice_id="{{ $invoice->id }}" title="{{ __('backend/invoices.delete') }}" data-toggle="modal" data-target="#deleteinvoice">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('invoices.destroy', $invoice) }}" class="btn btn-danger btn-sm" title="{{ __('backend/invoices.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"><p class="text-danger text-center">{{ __('backend/invoices.no_invoices') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.invoices.delete')
@endsection



@section('js')
    <script>
        $('#deleteinvoice').on('show.bs.modal', function(event){
            let button = $(event.relatedTarget)
            let invoice_id = button.data('invoice_id')
            let modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id)
        })
    </script>

@endsection
