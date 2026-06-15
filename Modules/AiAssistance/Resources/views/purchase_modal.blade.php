<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">@lang('aiassistance::lang.use_ai')</h4>
        </div>
        <form action="{{action([\Modules\AiAssistance\Http\Controllers\AiAssistanceController::class, 'processPurchaseFile'])}}" method="POST" enctype="multipart/form-data" id="ai_purchase_form">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('location_id', __('purchase.business_location').':*') !!}
                            @show_tooltip(__('tooltip.purchase_location'))
                            {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('purchase_file', __('aiassistance::lang.upload_purchase_file') . ':*' )!!}
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" name="purchase_file" class="form-control" required accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">@lang('messages.close')</button>
                <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white">@lang('aiassistance::lang.process')</button>
            </div>
        </form>
    </div>
</div>