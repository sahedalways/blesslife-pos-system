<link href="{{ asset('css/tailwind/app.css?v=' . $asset_v) }}"
      rel="stylesheet">

<link rel="stylesheet"
      href="{{ asset('css/vendor.css?v=' . $asset_v) }}">

@if (in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')))
    <link rel="stylesheet"
          href="{{ asset('css/rtl.css?v=' . $asset_v) }}">
@endif

@yield('css')

<!-- global css -->
<link rel="stylesheet"
      href="{{ asset('css/global.css?v=' . $asset_v) }}">

<!-- app css -->
<link rel="stylesheet"
      href="{{ asset('css/app.css?v=' . $asset_v) }}">

<style>
    .bls-global-btn {
        position: relative;
        background: linear-gradient(180deg, #009a00 0%, #008000 40%, #006600 100%);
        box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.25), inset 0 -2px 4px rgba(0, 0, 0, 0.15);
        color: #fff;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-align: center;
        text-decoration: none;
        overflow: hidden;
        z-index: 1;
        perspective: 600px;
    }

    .bls-global-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: linear-gradient(180deg, #f5a623 0%, #E58E24 40%, #cc7a1a 100%);
        box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.3), inset 0 -2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 50px;
        transition: width 0.45s ease;
        z-index: -1;
    }

    .bls-global-btn:hover::before,
    .bls-global-btn:focus::before {
        width: 100%;
    }

    .bls-global-btn:hover,
    .bls-global-btn:focus {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(229, 142, 36, 0.5);
    }

    .bls-global-btn span {
        display: inline-block;
        transition: transform 0.4s ease;
    }

    .bls-global-btn:hover span {
        animation: blsTextFlip 0.5s ease forwards;
    }

    @keyframes blsTextFlip {
        0% {
            transform: rotateX(0deg);
        }
        50% {
            transform: rotateX(90deg);
        }
        100% {
            transform: rotateX(0deg);
        }
    }

    .bls-global-btn {
        display: inline-block;
        padding: 12px 32px;
        font-size: 16px;
        font-weight: 600;
        color: #fff !important;
        background: linear-gradient(180deg, #00aa00, #006600);
        border: none;
        border-radius: 50px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        line-height: 1.2;
        min-width: 140px;
    }

    .bls-global-btn:hover {
        background: linear-gradient(180deg, #009a00, #005500);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        color: #fff !important;
        text-decoration: none;
    }

    .bls-global-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #business_register_form .wizard > .actions a[href="#previous"] {
        display: inline-block;
        padding: 12px 32px !important;
        font-size: 16px;
        font-weight: 600;
        color: #000 !important;
        background: linear-gradient(180deg, #f5e6c8, #e8d5b0) !important;
        border: none;
        border-radius: 50px !important;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        line-height: 1.2;
        min-width: 140px !important;
        height: auto;
        min-height: auto;
    }

    #business_register_form .wizard > .actions a[href="#previous"]:hover {
        background: linear-gradient(180deg, #e8d5b0, #dcc4a0) !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        color: #000 !important;
        text-decoration: none;
    }

    #business_register_form .wizard > .content {
        background: rgba(220, 252, 231, 0.6) !important;
        padding: 20px 15px !important;
        min-height: auto !important;
        overflow: visible !important;
        border-radius: 8px !important;
    }

    #business_register_form .wizard > .steps {
        margin-bottom: 32px;
        padding: 24px 32px 20px;
        background: #f8fafc;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
    }

    #business_register_form .wizard > .steps ul {
        display: flex !important;
        justify-content: center;
        align-items: center;
        gap: 40px;
        position: relative;
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important;
    }

    #business_register_form .wizard > .steps ul li {
        float: none !important;
        text-align: center;
        position: relative;
        width: auto !important;
    }

    #business_register_form .wizard > .steps ul li a {
        display: flex !important;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        padding: 0 !important;
        margin: 0 !important;
        background: transparent !important;
        border-radius: 0 !important;
        color: #9CA3AF !important;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        cursor: default;
        white-space: nowrap;
    }

    #business_register_form .wizard > .steps ul li a .number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        font-size: 1.1rem;
        font-weight: 800;
        transition: all 0.35s cubic-bezier(.4,0,.2,1);
        flex-shrink: 0;
        border: 3px solid #fff;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    #business_register_form .wizard > .steps ul li.disabled a .number {
        background: #f3f4f6;
        color: #b0b7c3;
        border-color: #f9fafb;
        box-shadow: none;
    }

    #business_register_form .wizard > .steps ul li.current a .number {
        background: linear-gradient(135deg, #00b300, #008000);
        color: #fff;
        border-color: #fff;
        box-shadow: 0 6px 20px rgba(0, 179, 0, 0.4), 0 0 0 5px rgba(0, 179, 0, 0.12);
        transform: scale(1.1);
    }

    #business_register_form .wizard > .steps ul li.done a .number {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #fff;
        border-color: #fff;
        box-shadow: 0 4px 14px rgba(34, 197, 94, 0.35);
    }

    #business_register_form .wizard > .steps ul li.done a .number {
        font-size: 0;
    }

    #business_register_form .wizard > .steps ul li.done a .number::after {
        content: '✓';
        font-size: 1.3rem;
        line-height: 1;
    }

    #business_register_form .wizard > .steps ul li.current a {
        color: #006600 !important;
        font-weight: 700;
    }

    #business_register_form .wizard > .steps ul li.done a {
        color: #16a34a !important;
        font-weight: 600;
    }

    #business_register_form fieldset > legend {
        width: 100%;
        text-align: center;
        font-size: 1.15rem;
        color: #1f2937;
        font-weight: 700;
        padding-bottom: 10px;
        margin-bottom: 20px;
        border-bottom: 2px solid #e5e7eb;
        letter-spacing: 0.3px;
    }

    .login-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        font-size: 14px;
        display: block;
    }

    #business_register_form .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        font-size: 14px;
        display: block;
    }

    .required-star {
        color: #dc2626;
        font-weight: 700;
    }

    input.auth-input,
    .auth-input {
        width: 100%;
        height: auto;
        background: #f9fafb;
        border: 2px solid #e5e7eb;
        border-radius: 14px;
        padding: 14px 20px;
        font-size: 0.95rem;
        color: #1F2937;
        margin-bottom: 16px;
        transition: all 0.3s ease;
        font-family: inherit;
        outline: none;
    }

    .auth-input::placeholder {
        color: #9CA3AF;
        font-weight: 400;
    }

    .auth-input:focus {
        background: #ffffff;
        border-color: #1B5E20;
        box-shadow: 0 0 0 4px rgba(27, 94, 32, 0.12);
        transform: translateY(-1px);
    }

    .auth-input:hover:not(:focus) {
        border-color: #d1d5db;
    }

    .form-group.has-error .auth-input,
    .auth-input.input-error {
        border-color: #dc2626 !important;
        background: #fef2f2 !important;
    }

    .auth-input.input-error:focus,
    .form-group.has-error .auth-input:focus {
        border-color: #dc2626 !important;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1) !important;
    }

    .auth-input.input-error:hover:not(:focus),
    .form-group.has-error .auth-input:hover:not(:focus) {
        border-color: #dc2626 !important;
    }

    select.auth-input,
    textarea.auth-input {
        min-height: 48px;
    }

</style>


@if (isset($pos_layout) && $pos_layout)
    <style type="text/css">
        .content {
            padding-bottom: 0px !important;
        }
    </style>
@endif
<style type="text/css">
    /*
 * Pattern lock css
 * Pattern direction
 * http://ignitersworld.com/lab/patternLock.html
 */
    .patt-wrap {
        z-index: 10;
    }

    .patt-circ.hovered {
        background-color: #cde2f2;
        border: none;
    }

    .patt-circ.hovered .patt-dots {
        display: none;
    }

    .patt-circ.dir {
        background-image: url("{{ asset('/img/pattern-directionicon-arrow.png') }}");
        background-position: center;
        background-repeat: no-repeat;
    }

    .patt-circ.e {
        -webkit-transform: rotate(0);
        transform: rotate(0);
    }

    .patt-circ.s-e {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .patt-circ.s {
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .patt-circ.s-w {
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
    }

    .patt-circ.w {
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .patt-circ.n-w {
        -webkit-transform: rotate(225deg);
        transform: rotate(225deg);
    }

    .patt-circ.n {
        -webkit-transform: rotate(270deg);
        transform: rotate(270deg);
    }

    .patt-circ.n-e {
        -webkit-transform: rotate(315deg);
        transform: rotate(315deg);
    }
</style>
@if (!empty($__system_settings['additional_css']))
    {!! $__system_settings['additional_css'] !!}
@endif
