<div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('backend/customers.add_customer') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label>{{ __('backend/customers.ar_customer_name') }}</label>
                            <input type="text" name="ar_customer_name" class="form-control" >
                        </div>
                        <div class="col">
                            <label>{{ __('backend/customers.en_customer_name') }}</label>
                            <input type="text" name="en_customer_name" class="form-control " >
                        </div>
                    </div>

                    <div class="row mt-30">
                        <div class="col">
                            <label for="territory_id">{{ __('backend/customers.territory') }}</label>
                            <select class="custom-select my-1 mr-sm-2" id="territory_id" name="territory_id">
                                <option value="" disabled selected="">{{ __('backend/products.select') }}</option>
                                @foreach($territories as $territory)
                                    <option value="{{ $territory->id }}">{{ $territory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="city_id">{{ __('backend/customers.city') }}</label>
                            <select class="custom-select my-1 mr-sm-2" id="city_id" name="city_id">
                                <option value="" disabled selected="">{{ __('backend/products.select') }}</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-30 mb-30">
                        <div class="col">
                            <label for="address">{{ __('backend/customers.address') }}</label>
                            <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                        </div>
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
