<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
        aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">@lang('aiassistance::lang.review_generated_diet_plan')</h4>
    </div>
        <div class="modal-body" >
            <div class="alert alert-info">
                <i class="fa fa-info-circle"></i> {{ __('aiassistance::lang.review_diet_plan_help') }}
            </div>
            <form id="diet_plan_review_form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.morning') }}:</label>
                            <textarea class="form-control" name="morning" rows="2" placeholder="{{ __('aiassistance::lang.morning_placeholder') }}">{{ $dietData['morning'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.breakfast') }}:</label>
                            <textarea class="form-control" name="breakfast" rows="2" placeholder="{{ __('aiassistance::lang.breakfast_placeholder') }}">{{ $dietData['breakfast'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.before_lunch') }}:</label>
                            <textarea class="form-control" name="before_lunch" rows="2" placeholder="{{ __('aiassistance::lang.before_lunch_placeholder') }}">{{ $dietData['before_lunch'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.lunch') }}:</label>
                            <textarea class="form-control" name="lunch" rows="2" placeholder="{{ __('aiassistance::lang.lunch_placeholder') }}">{{ $dietData['lunch'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.afternoon') }}:</label>
                            <textarea class="form-control" name="afternoon" rows="2" placeholder="{{ __('aiassistance::lang.afternoon_placeholder') }}">{{ $dietData['afternoon'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.evening') }}:</label>
                            <textarea class="form-control" name="evening" rows="2" placeholder="{{ __('aiassistance::lang.evening_placeholder') }}">{{ $dietData['evening'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.dinner') }}:</label>
                            <textarea class="form-control" name="dinner" rows="2" placeholder="{{ __('aiassistance::lang.dinner_placeholder') }}">{{ $dietData['dinner'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.before_sleep') }}:</label>
                            <textarea class="form-control" name="before_sleep" rows="2" placeholder="{{ __('aiassistance::lang.before_sleep_placeholder') }}">{{ $dietData['before_sleep'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.before_workout') }}:</label>
                            <textarea class="form-control" name="before_workout" rows="2" placeholder="{{ __('aiassistance::lang.before_workout_placeholder') }}">{{ $dietData['before_workout'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('gym::lang.after_workout') }}:</label>
                            <textarea class="form-control" name="after_workout" rows="2" placeholder="{{ __('aiassistance::lang.after_workout_placeholder') }}">{{ $dietData['after_workout'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ __('gym::lang.remarks') }}:</label>
                            <textarea class="form-control" name="remarks" rows="2" placeholder="{{ __('aiassistance::lang.remarks_placeholder') }}">{{ $dietData['remarks'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                {{ __('messages.cancel') }}
            </button>
            <button type="button" class="btn btn-primary" id="apply_diet_plan_btn">
                <i class="fa fa-check"></i> {{ __('aiassistance::lang.apply_to_form') }}
            </button>
        </div>
    </div>
</div>
