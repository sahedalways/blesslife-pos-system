<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">@lang('aiassistance::lang.generate_product_description')</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        @php
                            $class = rand();
                        @endphp
                        <div>
                            <div id="{{$class}}" class="product_description_text">{!! nl2br($text) !!}</div>
                            <i class="fas fa-copy pull-right cursor-pointer" onclick="copyToClipboard({{$class}})"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white" id="use_description">
                <i class="fa fa-check"></i> @lang('aiassistance::lang.use_description')
            </button>
            <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">
                @lang('messages.close')
            </button>
        </div>
    </div>
</div>
<script>
