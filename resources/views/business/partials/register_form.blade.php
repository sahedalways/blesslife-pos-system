@if (empty($is_admin))
    <h3>@lang('business.business')</h3>
@endif
{!! Form::hidden('language', request()->lang) !!}

<fieldset>
    <legend class="text-black tw-text-base tw-font-semibold tw-mb-3">@lang('business.business_details')</legend>
    <div class="col-md-12">
        <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', __('business.business_name') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-suitcase"></i>
                </span>
                {!! Form::text('name', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.business_name'),
                    'required',
                ]) !!}
            </div>
            @if ($errors->has('name'))
                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('start_date') ? 'has-error' : '' }}">
            {!! Form::label('start_date', __('business.start_date') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                {!! Form::text('start_date', null, [
                    'class' => 'form-control auth-input start-date-picker',
                    'placeholder' => __('business.start_date'),
                    'readonly',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('currency_id') ? 'has-error' : '' }}">
            {!! Form::label('currency_id', __('business.currency') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-money-bill-alt"></i>
                </span>
                {!! Form::select('currency_id', $currencies, '', [
                    'class' => 'form-control auth-input select2_register',
                    'placeholder' => __('business.currency_placeholder'),
                    'required',
                    'style' => 'width:100%;',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('business_logo', __('business.upload_logo') . ':') !!}
            {!! Form::file('business_logo', ['accept' => 'image/*']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('website') ? 'has-error' : '' }}">
            {!! Form::label('website', __('lang_v1.website') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                {!! Form::text('website', null, ['class' => 'form-control auth-input', 'placeholder' => __('lang_v1.website')]) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('mobile') ? 'has-error' : '' }}">
            {!! Form::label('mobile', __('lang_v1.business_telephone') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                {!! Form::text('mobile', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('lang_v1.business_telephone'),
                ]) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('alternate_number') ? 'has-error' : '' }}">
            {!! Form::label('alternate_number', __('business.alternate_number') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                {!! Form::text('alternate_number', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.alternate_number'),
                ]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
            {!! Form::label('country', __('business.country') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                {!! Form::text('country', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.country'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('state') ? 'has-error' : '' }}">
            {!! Form::label('state', __('business.state') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                {!! Form::text('state', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.state'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('city') ? 'has-error' : '' }}">
            {!! Form::label('city', __('business.city') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                {!! Form::text('city', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.city'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('zip_code') ? 'has-error' : '' }}">
            {!! Form::label('zip_code', __('business.zip_code') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                {!! Form::text('zip_code', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.zip_code_placeholder'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('landmark') ? 'has-error' : '' }}">
            {!! Form::label('landmark', __('business.landmark') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                {!! Form::text('landmark', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.landmark'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('time_zone') ? 'has-error' : '' }}">
            {!! Form::label('time_zone', __('business.time_zone') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-clock"></i>
                </span>
                {!! Form::select('time_zone', $timezone_list, config('app.timezone'), [
                    'class' => 'form-control auth-input select2_register',
                    'placeholder' => __('business.time_zone'),
                    'required',
                    'style' => 'width:100%;',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="form-group col-md-12 has-feedback {{ $errors->has('cr_no') ? 'has-error' : '' }}">
        {!! Form::label('cr_no', 'CR No:*') !!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-id-card"></i>
            </span>
            {!! Form::text('cr_no', $user->cr_no ?? '', [
                'class' => 'form-control auth-input',
                'placeholder' => 'Enter CR No',
                'required' => true,
            ]) !!}
        </div>
    </div>
</fieldset>


<!-- tax details -->
@if (empty($is_admin))
    <h3 class="tw-text-base tw-font-semibold tw-mb-3">@lang('business.business_settings')</h3>

    <fieldset>
        <legend class="text-black tw-text-base tw-font-semibold tw-mb-3">@lang('business.business_settings')</legend>
        <div class="col-md-6">
            <div class="form-group has-feedback {{ $errors->has('tax_label_1') ? 'has-error' : '' }}">
                {!! Form::label('tax_label_1', __('business.tax_1_name') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_label_1', null, [
                        'class' => 'form-control auth-input',
                        'placeholder' => __('business.tax_1_placeholder'),
                    ]) !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback {{ $errors->has('tax_number_1') ? 'has-error' : '' }}">
                {!! Form::label('tax_number_1', __('business.tax_1_no') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_number_1', null, ['class' => 'form-control auth-input']) !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="form-group has-feedback {{ $errors->has('tax_label_2') ? 'has-error' : '' }}">
                {!! Form::label('tax_label_2', __('business.tax_2_name') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_label_2', null, [
                        'class' => 'form-control auth-input',
                        'placeholder' => __('business.tax_1_placeholder'),
                    ]) !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback {{ $errors->has('tax_number_2') ? 'has-error' : '' }}">
                {!! Form::label('tax_number_2', __('business.tax_2_no') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_number_2', null, ['class' => 'form-control auth-input']) !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="form-group has-feedback {{ $errors->has('fy_start_month') ? 'has-error' : '' }}">
                {!! Form::label('fy_start_month', __('business.fy_start_month') . ':*') !!} @show_tooltip(__('tooltip.fy_start_month'))
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    {!! Form::select('fy_start_month', $months, null, [
                        'class' => 'form-control auth-input select2_register',
                        'required',
                        'style' => 'width:100%;',
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group has-feedback {{ $errors->has('accounting_method') ? 'has-error' : '' }}">
                {!! Form::label('accounting_method', __('business.accounting_method') . ':*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calculator"></i>
                    </span>
                    {!! Form::select('accounting_method', $accounting_methods, null, [
                        'class' => 'form-control auth-input select2_register',
                        'required',
                        'style' => 'width:100%;',
                    ]) !!}
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="form-group col-md-12 has-feedback {{ $errors->has('cr_no') ? 'has-error' : '' }}">
            {!! Form::label('cr_no', 'CR No:*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-id-card"></i>
                </span>
                {!! Form::text('cr_no', $user->cr_no ?? '', [
                    'class' => 'form-control auth-input',
                    'placeholder' => 'Enter CR No',
                    'required' => true,
                ]) !!}
            </div>
        </div>
    </fieldset>
@endif

<!-- Owner Information -->
@if (empty($is_admin))
    <h3 class="tw-text-base tw-font-semibold tw-mb-3">@lang('business.owner')</h3>
@endif

<fieldset>
    <legend class="text-black tw-text-base tw-font-semibold tw-mb-3">@lang('business.owner_info')</legend>
    <div class="col-md-4">
        <div class="form-group has-feedback {{ $errors->has('surname') ? 'has-error' : '' }}">
            {!! Form::label('surname', __('business.prefix') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                {!! Form::text('surname', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.prefix_placeholder'),
                    'maxlength' => 10,
                ]) !!}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group has-feedback {{ $errors->has('first_name') ? 'has-error' : '' }}">
            {!! Form::label('first_name', __('business.first_name') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                {!! Form::text('first_name', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.first_name'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group has-feedback {{ $errors->has('last_name') ? 'has-error' : '' }}">
            {!! Form::label('last_name', __('business.last_name') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                {!! Form::text('last_name', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.last_name'),
                ]) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
            {!! Form::label('username', __('business.username') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                {!! Form::text('username', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.username'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email', __('business.email') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                {!! Form::text('email', null, [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.email'),
                    'required',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            {!! Form::label('password', __('business.password') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </span>
                {!! Form::password('password', [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.password'),
                    'required',
                    'id' => 'register_password',
                ]) !!}
            </div>
            <button type="button"
                    id="show_hide_register_password"
                    class="show_hide_icon"
                    style="position: absolute; top:46px;right:16px;">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="icon icon-tabler icon-tabler-eye tw-w-6"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="#000000"
                     fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none"
                          d="M0 0h24v24H0z"
                          fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                </svg>
            </button>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-feedback {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
            {!! Form::label('confirm_password', __('business.confirm_password') . ':*') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </span>
                {!! Form::password('confirm_password', [
                    'class' => 'form-control auth-input',
                    'placeholder' => __('business.confirm_password'),
                    'required',
                    'id' => 'register_confirm_password',
                ]) !!}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    @if (!empty($system_settings['superadmin_enable_register_tc']) && !empty($is_register))
        <div class="col-md-6">
            <div>
                <label>
                    {!! Form::checkbox('accept_tc', 0, false, ['required', 'class' => 'input-check-box']) !!}
                    <a class="terms_condition cursor-pointer"
                       data-toggle="modal"
                       data-target="#tc_modal">
                        @lang('lang_v1.accept_terms_and_conditions') <i></i>
                    </a>
                </label>
            </div>
            @include('business.partials.terms_conditions')
        </div>
    @endif

    @if (config('constants.enable_recaptcha') && !empty($is_register))
        <div class="col-md-6">
            <div class="form-group">
                <div id="recaptcha-container"></div>
                @if ($errors->has('g-recaptcha-response'))
                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                @endif
            </div>
        </div>
    @endif
    <div class="clearfix"></div>
</fieldset>
@if (config('constants.enable_recaptcha') && !empty($is_register))
    <script>
        window.RECAPTCHA_SITE_KEY = "{{ config('constants.google_recaptcha_key') }}";
    </script>
@endif

@if (isset($errors) && $errors->any())
    <script>
        var errorFields = @json($errors->keys());
        errorFields.forEach(function(field) {
            var $input = $('#business_register_form').find('[name="' + field + '"]');
            if ($input.length) {
                $input.closest('.form-group').addClass('has-error');
            }
        });
    </script>
@endif

<script>
    $(document).ready(function() {
        $('#business_register_form label').each(function() {
            var html = $(this).html();
            if (html.indexOf(':*') !== -1) {
                $(this).html(html.replace(':*', ':<span class="required-star">*</span>'));
            }
        });

        $('#show_hide_register_password').on('click', function(e) {
            e.preventDefault();
            const passwordInput = $('#register_password');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                $(this).html(
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off tw-w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"/><path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"/><path d="M3 3l18 18"/></svg>'
                );
            } else {
                passwordInput.attr('type', 'password');
                $(this).html(
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye tw-w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/></svg>'
                );
            }
        });
    });
</script>
