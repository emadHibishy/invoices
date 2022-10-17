<div class="modal fade" id="deleteinvoice" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('invoices.destroy','destroy') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="p-3 w-100">
                            <p class="text-dark text-center font-weight-bold">{{ __('backend/invoices.delete_confirm') }}</p>
                            <input type="hidden" name="invoice_id" id="invoice_id" value="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >{{ __('backend/invoices.delete') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend/categories.cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
