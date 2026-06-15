<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">@lang('aiassistance::lang.generated_image')</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="text-center" style="min-height: 300px; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ $imageUrl }}" 
                                 alt="@lang('aiassistance::lang.generated_image')" 
                                 style="max-width: 100%; max-height: 500px; object-fit: contain;" 
                                 class="mb-4" 
                                 id="generated_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ action([\Modules\AiAssistance\Http\Controllers\AiAssistanceController::class, 'downloadProductImage'], ['url' => $imageUrl]) }}" 
               class="tw-dw-btn tw-dw-btn-neutral tw-text-white"
               title="@lang('aiassistance::lang.download_image')">
                <i class="fas fa-download mr-2"></i> @lang('aiassistance::lang.download_image')
            </a>
            <button type="button" 
                    class="tw-dw-btn tw-dw-btn-primary tw-text-white use-image"
                    data-image-url="{{ $imageUrl }}"
                    title="@lang('aiassistance::lang.use_image')">
                <i class="fas fa-check mr-2"></i> @lang('aiassistance::lang.use_image')
            </button>
            <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">
                @lang('messages.close')
            </button>
        </div>
    </div>
</div>
