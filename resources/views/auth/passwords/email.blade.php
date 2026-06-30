@extends('layouts.auth2')

@section('title', __('lang_v1.reset_password'))

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-12">
            <div
                 class=" tw-p-2 sm:tw-p-3 tw-mb-4 tw-transition-all tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 tw-ring-gray-200">
                <div class="tw-flex tw-flex-col tw-gap-4 tw-dw-rounded-box tw-dw-p-6 tw-dw-max-w-md">

                    <h1 style="font-size: 24px; font-weight: 800; color: #1e1e1e; margin: 0 0 4px 0; text-align: center;">@lang('lang_v1.send_password_reset_link')</h1>

                    @if (session('status') && is_string(session('status')))
                        <div class="alert alert-info"
                             role="alert">{{ session('status') }}</div>
                    @endif


                    <form method="POST"
                          action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="login-label">@lang('Email')<span class="required-star">*</span></label>
                            <input id="email"
                                   type="email"
                                   class="auth-input"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   placeholder="@lang('lang_v1.email_address')">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit"
                                class="bls-global-btn tw-w-full">
                            <span>@lang('lang_v1.send_password_reset_link')</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.change_lang').click(function() {
                window.location = "{{ route('password.request') }}?lang=" + $(this).attr('value');
            });
        })
    </script>
@endsection
