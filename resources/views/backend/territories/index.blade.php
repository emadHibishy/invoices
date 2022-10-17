@extends('layouts.backend.master')
@section('title')
     - {{ __('backend/sidebar.territories') }}
@endsection



@section('css')

@endsection



@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('backend/sidebar.territories') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('backend/sidebar.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('backend/sidebar.territories') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('backend.messages')
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addterritory">{{ __('backend/territories.add_territory') }}</button>
                @include('backend.territories.create')
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('backend/territories.name') }}</th>
                                <th>{{ __('backend/territories.abbreviation') }}</th>
                                <th>{{ __('backend/territories.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($territories as $territory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $territory->name }}</td>
                                <td>{{ $territory->abbreviation }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" title="{{ __('backend/territories.edit') }}" data-toggle="modal" data-target="#Editterritory{{$territory->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    @include('backend.territories.edit')
                                    <button class="btn btn-danger btn-sm" data-territory_id="{{ $territory->id }}" title="{{ __('backend/territories.delete') }}" data-toggle="modal" data-target="#deleteterritory">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><p class="text-danger text-center">{{ __('backend/territories.no_territories') }}</p></td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.territories.delete')
@endsection



@section('js')
    <script>
        $('#deleteterritory').on('show.bs.modal', function(event){
            console.log('test');
            let button = $(event.relatedTarget)
            let territory_id = button.data('territory_id')
            let modal = $(this)
            modal.find('.modal-body #territory_id').val(territory_id)
        })
    </script>
@endsection
