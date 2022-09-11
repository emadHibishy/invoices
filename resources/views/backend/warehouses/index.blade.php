@extends('layouts.backend.master')
@section('title')
     - {{ __('backend/sidebar.products') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('backend/sidebar.warehouses') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/sidebar.warehouses') }}</li>
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
                        <a href="{{ route('warehouses.create') }}" class="btn btn-success" role="button">{{ __('backend/warehouses.add_warehouse') }}</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/warehouses.code') }}</th>
                                <th>{{ __('backend/warehouses.warehouse_name') }}</th>
                                <th>{{ __('backend/warehouses.description') }}</th>
                                <th>{{ __('backend/warehouses.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($warehouses as $warehouse)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $warehouse->code }}</td>
                                <td>{{ $warehouse->name }}</td>
                                <td>{{ $warehouse->description }}</td>
                                <td>
                                    <a href="{{ route('warehouses.edit', $warehouse) }}" class="btn btn-success btn-sm" title="{{ __('backend/warehouses.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-warehouse_id="{{ $warehouse->id }}" title="{{ __('backend/warehouses.delete') }}" data-toggle="modal" data-target="#deletewarehouse">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><p class="text-danger text-center">{{ __('backend/warehouses.no_products') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.warehouses.delete')
@endsection



@section('js')
    <script>
        $('#deletewarehouse').on('show.bs.modal', function(event){
            let button = $(event.relatedTarget)
            let warehouse_id = button.data('warehouse_id')
            let modal = $(this)
            modal.find('.modal-body #warehouse_id').val(warehouse_id)
        })
    </script>

@endsection
