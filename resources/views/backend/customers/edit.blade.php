<div class="modal fade" id="Editcustomer{{$customer->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('backend/customers.edit_customer') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customers.update','update') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $customer->id }}">
                    <div class="row mb-30">
                        <div class="col">
                            <label>{{ __('backend/customers.ar_customer_name') }}</label>
                            <input type="text" name="ar_customer_name" class="form-control" value="{{ $customer->getTranslation('name', 'ar') }}">
                        </div>
                        <div class="col">
                            <label>{{ __('backend/customers.en_customer_name') }}</label>
                            <input type="text" name="en_customer_name" class="form-control"  value="{{ $customer->getTranslation('name', 'en') }}">
                        </div>
                    </div>

                    <div class="row mb-30">
                        <div class="col">
                            <label for="territory_id">{{ __('backend/customers.territory') }}</label>
                            <select class="custom-select my-1 mr-sm-2" id="territory_id" name="territory_id">
                                @foreach($territories as $territory)
                                    <option value="{{ $territory->id }}" {{ $customer->territory_id == $territory->id ? 'selected' : '' }}>{{ $territory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="city_id">{{ __('backend/customers.city') }}</label>
                            <select class="custom-select my-1 mr-sm-2" id="city_id" name="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $customer->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-30">
                        <div class="col">
                            <label for="address">{{ __('backend/customers.address') }}</label>
                            <textarea class="form-control" id="address" name="address" rows="5">{{ $customer->address }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-30">
                        <div class="col">
                            <div class="form-group form-check">
                                <input type="checkbox" id="status" class="form-check-input" name="status" id="status" {{ $customer->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">{{ __('backend/customers.status') }}</label>
                            </div>
                        </div>
                    </div>
{{--                    <div class="form-row form-check mb-30 mt-3">--}}
{{--                        <div class="col">--}}
{{--                            <input type="checkbox" class="form-check-input" id="status" name="status" {{ $customer->status == 1 ? 'checked' : '' }}>--}}
{{--                            <label class="form-check-label" for="status">{{ __('backend/customers.status') }}</label>--}}
{{--                        </div>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >{{ __('backend/customers.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend/customers.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
