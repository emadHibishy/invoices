@extends('layouts.backend.master')
@section('title')
     - {{ __('backend/sidebar.customers') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('backend/sidebar.customers') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/sidebar.customers') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('backend.messages')
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addcustomer">{{ __('backend/customers.add_customer') }}</button>
                @include('backend.customers.create')
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/customers.name') }}</th>
                                <th>{{ __('backend/customers.number') }}</th>
                                <th>{{ __('backend/customers.territory') }}</th>
                                <th>{{ __('backend/customers.city') }}</th>
                                <th>{{ __('backend/customers.status') }}</th>
                                <th>{{ __('backend/customers.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->number }}</td>
                                <td>{{ $customer->territory->name }}</td>
                                <td>{{ $customer->city->name }}</td>
                                <td>
                                    @if($customer->status == 1)
                                        <button type="button" class="btn btn-sm btn-outline-success" >{{ __('backend/customers.active') }}</button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-outline-danger" >{{ __('backend/customers.not_active') }}</button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm" title="{{ __('backend/customers.edit') }}" data-toggle="modal" data-target="#Editcustomer{{$customer->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    @include('backend.customers.edit')
                                    <button class="btn btn-danger btn-sm" data-customer_id="{{ $customer->id }}" title="{{ __('backend/customers.delete') }}" data-toggle="modal" data-target="#deletecustomer">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"><p class="text-danger text-center">{{ __('backend/customers.no_customers') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.customers.delete')
@endsection



@section('js')
    <script>
        $('#deletecustomer').on('show.bs.modal', function(event){
            console.log('test');
            let button = $(event.relatedTarget)
            let customer_id = button.data('customer_id')
            let modal = $(this)
            modal.find('.modal-body #customer_id').val(customer_id)
        })
    </script>
@endsection
