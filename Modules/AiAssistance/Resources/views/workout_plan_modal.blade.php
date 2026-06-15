<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
        aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">@lang('aiassistance::lang.generate_workout_plan')</h4>
    </div>
        <div class="modal-body">
            <form id="workout_plan_form">
                <div class="form-group">
                    <label for="member_profile">@lang('aiassistance::lang.member_profile') <span class="text-danger">*</span></label>
                    <textarea 
                        class="form-control" 
                        id="member_profile" 
                        name="member_profile" 
                        rows="8" 
                        placeholder="@lang('aiassistance::lang.member_profile_placeholder')"
                        required
                    ></textarea>
                    <small class="form-text text-muted">
                        @lang('aiassistance::lang.member_profile_help')
                    </small>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('aiassistance::lang.example_profile')</label>
                            <div class="card">
                                <div class="card-body">
                                    <small class="text-muted">
                                        <strong>@lang('aiassistance::lang.example_profile_title'):</strong><br>
                                        @lang('aiassistance::lang.example_workout_profile_content')
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('aiassistance::lang.ai_features')</label>
                            <div class="card">
                                <div class="card-body">
                                    <small class="text-muted">
                                        <i class="fa fa-check text-success"></i> @lang('aiassistance::lang.personalized_workouts')<br>
                                        <i class="fa fa-check text-success"></i> @lang('aiassistance::lang.exercise_guidance')<br>
                                        <i class="fa fa-check text-success"></i> @lang('aiassistance::lang.progressive_planning')<br>
                                        <i class="fa fa-check text-success"></i> @lang('aiassistance::lang.rest_recommendations')
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                @lang('messages.cancel')
            </button>
            <button type="button" class="btn btn-primary" id="generate_workout_plan_btn">
                <i class="fa fa-dumbbell"></i> @lang('aiassistance::lang.generate_plan')
            </button>
        </div>
    </div>
</div>
