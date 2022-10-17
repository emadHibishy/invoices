<div class="modal fade" id="Editterritory{{$territory->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('backend/territories.edit_territory') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('territories.update','update') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $territory->id }}">
                    <div class="row">
                        <div class="col">
                            <label>{{ __('backend/territories.ar_territory_name') }}</label>
                            <input type="text" name="ar_territory_name" class="form-control"  value="{{ $territory->getTranslation('name', 'ar') }}">
                        </div>
                        <div class="col">
                            <label>{{ __('backend/territories.en_territory_name') }}</label>
                            <input type="text" name="en_territory_name" class="form-control "  value="{{ $territory->getTranslation('name', 'en') }}">
                        </div>
                        <div class="col">
                            <label>{{ __('backend/territories.abbreviation') }}</label>
                            <input type="text" name="abbreviation" class="form-control" value="{{ $territory->abbreviation }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >{{ __('backend/territories.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend/territories.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
