@extends('layouts.backend.master')
@section('title')
     - {{ __('backend/sidebar.categories') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('backend/sidebar.categories') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/sidebar.categories') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('backend.messages')
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addCategory">{{ __('backend/categories.add_category') }}</button>
                @include('backend.categories.create')
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/categories.category_name') }}</th>
                                <th>{{ __('backend/categories.description') }}</th>
                                <th>{{ __('backend/categories.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" title="{{ __('backend/categories.edit') }}" data-toggle="modal" data-target="#EditCategory{{$category->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    @include('backend.categories.edit')
                                    <button class="btn btn-danger btn-sm" title="{{ __('backend/categories.delete') }}" data-toggle="modal" data-target="#deleteCategory{{$category->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><p class="text-danger text-center">{{ __('backend/categories.no_categories') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')

@endsection
