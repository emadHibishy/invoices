@extends('layouts.backend.master')
@section('title')
     - {{ __('backend/sidebar.terms') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('backend/sidebar.terms') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/sidebar.terms') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('backend.messages')
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addterm">{{ __('backend/terms.add_term') }}</button>
                @include('backend.terms.create')
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/terms.name') }}</th>
                                <th>{{ __('backend/terms.description') }}</th>
                                <th>{{ __('backend/terms.days') }}</th>
                                <th>{{ __('backend/terms.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($terms as $term)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $term->name }}</td>
                                <td>{{ $term->description }}</td>
                                <td>{{ $term->days }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" title="{{ __('backend/terms.edit') }}" data-toggle="modal" data-target="#Editterm{{$term->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    @include('backend.terms.edit')
                                    <button class="btn btn-danger btn-sm" data-term_id="{{ $term->id }}" title="{{ __('backend/terms.delete') }}" data-toggle="modal" data-target="#deleteterm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"><p class="text-danger text-center">{{ __('backend/terms.no_terms') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.terms.delete')
@endsection



@section('js')
    <script>
        $('#deleteterm').on('show.bs.modal', function(event){
            console.log('test');
            let button = $(event.relatedTarget)
            let term_id = button.data('term_id')
            let modal = $(this)
            modal.find('.modal-body #term_id').val(term_id)
        })
    </script>
@endsection
