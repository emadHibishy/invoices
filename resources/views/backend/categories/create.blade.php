<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><div class="mb-30">
                        <h2>{{ __('backend/categories.add_category') }}</h2>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label>{{ __('backend/categories.ar_category_name') }}</label>
                            <input type="text" name="category_name" class="form-control @error('category_name') is_invalid> @enderror" required>
                            @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ __('backend/categories.en_category_name') }}</label>
                            <input type="text" name="category_name_en" class="form-control @error('category_name_en') is_invalid> @enderror" required>
                            @error('category_name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>{{ __('backend/categories.ar_description') }}</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="col">
                            <label>{{ __('backend/categories.en_description') }}</label>
                            <textarea class="form-control" name="description_en" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >{{ __('backend/categories.submit') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend/categories.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
