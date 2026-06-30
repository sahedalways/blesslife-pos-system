<style>
    .auth-navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
        background: rgba(230, 250, 230, 0.60);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(0, 128, 0, 0.1);
        box-shadow: 0 4px 30px rgba(0, 128, 0, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.7);
        padding: 15px 0;
    }
    .auth-navbar .nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .auth-navbar .nav-logo img {
        height: 45px;
        width: auto;
    }
    .auth-navbar .nav-links {
        display: flex;
        align-items: center;
        gap: 20px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .auth-navbar .nav-links li {
        display: flex;
        align-items: center;
    }
    .auth-navbar .nav-links li a {
        color: rgba(0, 80, 0, 0.85);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: color 0.3s;
    }
    .auth-navbar .nav-links li a:hover {
        color: #008000;
    }
    .auth-navbar .bls-global-btn {
        padding: 0.75rem 1.75rem;
        font-size: 0.9rem;
        color: #fff !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        line-height: 1;
    }
    .auth-navbar .btn-signin-outline {
        background: transparent !important;
        border: 2px solid #16a34a !important;
        color: #fff !important;
        box-shadow: none !important;
    }
    .auth-navbar .btn-signin-outline:hover {
        background: rgba(22, 163, 74, 0.15) !important;
        border-color: #15803d !important;
        color: #fff !important;
        transform: translateY(-2px);
    }
    .auth-navbar details summary {
        color: rgba(0, 80, 0, 0.85) !important;
        cursor: pointer;
    }
</style>

<div class="auth-navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="{{ url('/') }}">
                <img src="{{ $__logo_url }}" alt="logo" loading="lazy">
            </a>
        </div>
        <ul class="nav-links">
            @if (!($request->segment(1) == 'business' && $request->segment(2) == 'register'))
                @if (config('constants.allow_registration'))
                    <li>
                        <a href="{{ route('business.getRegister') }}@if (!empty(request()->lang)) {{ '?lang=' . request()->lang }} @endif" class="bls-global-btn"><span>{{ __('business.register') }}</span></a>
                    </li>

                @endif
            @endif
            @if ($request->segment(1) != 'login')
                <li>
                    <a href="{{ route('login') }}@if (!empty(request()->lang)) {{ '?lang=' . request()->lang }} @endif" class="bls-global-btn btn-signin-outline"><span>{{ __('business.sign_in') }}</span></a>
                </li>
            @endif
            <li>
                @include('layouts.partials.language_btn')
            </li>
        </ul>
    </div>
</div>
