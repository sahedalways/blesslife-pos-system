@extends('layouts.auth2')

@section('title', __('lang_v1.reset_password'))

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-12">
            <div
                 class=" tw-p-2 sm:tw-p-3 tw-mb-4 tw-transition-all tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 tw-ring-gray-200">
                <div class="tw-flex tw-flex-col tw-gap-4 tw-dw-rounded-box tw-dw-p-6 tw-dw-max-w-md">
                    <h1 style="font-size: 24px; font-weight: 800; color: #1e1e1e; margin: 0 0 4px 0; text-align: center;">@lang('lang_v1.reset_password')</h1>
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="login-label">@lang('Email')<span class="required-star">*</span></label>
                            <input id="email" type="email" class="auth-input" name="email"
                                value="{{ $email ?? old('email') }}" required autofocus placeholder="@lang('lang_v1.email_address')">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="login-label">@lang('lang_v1.password')<span class="required-star">*</span></label>
                            <input id="password" type="password" class="auth-input" name="password"
                                required placeholder="@lang('lang_v1.password')">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="login-label">@lang('business.confirm_password')<span class="required-star">*</span></label>
                            <input id="password_confirmation" type="password" class="auth-input"
                                name="password_confirmation" required placeholder="@lang('business.confirm_password')">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="bls-global-btn tw-w-full">
                            <span>@lang('lang_v1.reset_password')</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


