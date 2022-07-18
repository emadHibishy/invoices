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
                <h4 class="mb-0"> {{ __('backend/sidebar.products') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/sidebar.products') }}</li>
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
                        <a href="{{ route('products.create') }}" class="btn btn-success" role="button">{{ __('backend/products.add_product') }}</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/products.name') }}</th>
                                <th>{{ __('backend/products.category_name') }}</th>
                                <th>{{ __('backend/products.price') }}</th>
                                <th>{{ __('backend/products.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->category_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-success btn-sm" title="{{ __('backend/products.edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-prod_id="{{ $product->id }}" title="{{ __('backend/products.delete') }}" data-toggle="modal" data-target="#deleteProduct">
                                        <i class="fa fa-trash"></i>
                                    </button>
{{--                                    <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-sm" title="{{ __('backend/products.delete') }}">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><p class="text-danger text-center">{{ __('backend/products.no_products') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.products.delete')
@endsection



@section('js')
    <script>
        $('#deleteProduct').on('show.bs.modal', function(event){
            let button = $(event.relatedTarget)
            let prod_id = button.data('prod_id')
            let modal = $(this)
            modal.find('.modal-body #prod_id').val(prod_id)
        })
    </script>

@endsection
