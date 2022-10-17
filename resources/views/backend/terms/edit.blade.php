<div class="modal fade" id="Editterm{{$term->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('backend/terms.edit_term') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('terms.update','update') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $term->id }}">
                    <div class="row">
                        <div class="col">
                            <label>{{ __('backend/terms.ar_term_name') }}</label>
                            <input type="text" name="ar_term_name" class="form-control"  value="{{ $term->getTranslation('name', 'ar') }}">
                        </div>
                        <div class="col">
                            <label>{{ __('backend/terms.en_term_name') }}</label>
                            <input type="text" name="en_term_name" class="form-control "  value="{{ $term->getTranslation('name', 'en') }}">
                        </div>
                        <div class="col">
                            <label>{{ __('backend/terms.days') }}</label>
                            <input type="text" name="days" class="form-control" value="{{ $term->days }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>{{ __('backend/terms.ar_term_description') }}</label>
                            <textarea class="form-control" name="ar_description" rows="3">{{ $term->getTranslation('description', 'ar') }}</textarea>
                        </div>
                        <div class="col">
                            <label>{{ __('backend/terms.en_term_description') }}</label>
                            <textarea class="form-control" name="en_description" rows="3">{{ $term->getTranslation('description', 'en') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >{{ __('backend/terms.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend/terms.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
