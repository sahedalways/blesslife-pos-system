<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
        aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">@lang('aiassistance::lang.generated_workout_plan')</h4>
    </div>
        <div class="modal-body">
            @if($workoutData)
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> @lang('aiassistance::lang.review_workout_plan_help')
                </div>
                
                <form id="workout_plan_review_form">
                    <input type="hidden" id="contact_id" name="contact_id" value="{{ $contact_id }}">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.monday')</strong></label>
                                <textarea class="form-control" name="monday" rows="3" placeholder="@lang('aiassistance::lang.monday_placeholder')">{{ $workoutData['monday'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.tuesday')</strong></label>
                                <textarea class="form-control" name="tuesday" rows="3" placeholder="@lang('aiassistance::lang.tuesday_placeholder')">{{ $workoutData['tuesday'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.wednesday')</strong></label>
                                <textarea class="form-control" name="wednesday" rows="3" placeholder="@lang('aiassistance::lang.wednesday_placeholder')">{{ $workoutData['wednesday'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.thursday')</strong></label>
                                <textarea class="form-control" name="thursday" rows="3" placeholder="@lang('aiassistance::lang.thursday_placeholder')">{{ $workoutData['thursday'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.friday')</strong></label>
                                <textarea class="form-control" name="friday" rows="3" placeholder="@lang('aiassistance::lang.friday_placeholder')">{{ $workoutData['friday'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.saturday')</strong></label>
                                <textarea class="form-control" name="saturday" rows="3" placeholder="@lang('aiassistance::lang.saturday_placeholder')">{{ $workoutData['saturday'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.sunday')</strong></label>
                                <textarea class="form-control" name="sunday" rows="3" placeholder="@lang('aiassistance::lang.sunday_placeholder')">{{ $workoutData['sunday'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.warm_up')</strong></label>
                                <textarea class="form-control" name="warm_up" rows="3" placeholder="@lang('aiassistance::lang.warm_up_placeholder')">{{ $workoutData['warm_up'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.cool_down')</strong></label>
                                <textarea class="form-control" name="cool_down" rows="3" placeholder="@lang('aiassistance::lang.cool_down_placeholder')">{{ $workoutData['cool_down'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.rest_day_activities')</strong></label>
                                <textarea class="form-control" name="rest_day_activities" rows="3" placeholder="@lang('aiassistance::lang.rest_day_activities_placeholder')">{{ $workoutData['rest_day_activities'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>@lang('gym::lang.remarks')</strong></label>
                                <textarea class="form-control" name="remarks" rows="3" placeholder="@lang('aiassistance::lang.remarks_placeholder')">{{ $workoutData['remarks'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-triangle"></i> @lang('aiassistance::lang.no_workout_data')
                </div>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                @lang('messages.close')
            </button>
            <button type="button" class="btn btn-info" onclick="printWorkoutPlan()">
                <i class="fa fa-print"></i> @lang('messages.print')
            </button>
            @if($workoutData)
            <button type="button" class="btn btn-success" id="apply_workout_plan_btn">
                <i class="fa fa-check"></i> @lang('aiassistance::lang.apply_workout_plan')
            </button>
            @endif
        </div>
    </div>
</div>

