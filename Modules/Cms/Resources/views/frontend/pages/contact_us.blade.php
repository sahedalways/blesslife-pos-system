@extends('cms::frontend.layouts.app')
@section('body-class', '')
@section('title', 'Contact us')
@section('meta')
    <meta name="description"
          content="{{ $page->meta_description }}">
@endsection
@section('css')
    <style type="text/css">
        .error {
            color: #e55151 !important;
            margin-bottom: 0.5rem;
        }

        .non-bullet-list {
            list-style: none;
            margin-left: 0px;
            padding-left: 0px;
        }
    </style>
@endsection
@section('content')
    @php
        $navbar_btn['text'] = 'Try For Free';
        $navbar_btn['drop_down_text'] = 'Pages';
        $navbar_btn['link'] = route('business.getRegister');
        if (
            isset($__site_details['btns']) &&
            isset($__site_details['btns']['navbar']) &&
            !empty($__site_details['btns']['navbar']['text'])
        ) {
            $navbar_btn['text'] = $__site_details['btns']['navbar']['text'] ?? 'Try For Free';
        }
        if (
            isset($__site_details['btns']) &&
            isset($__site_details['btns']['navbar']) &&
            !empty($__site_details['btns']['navbar']['drop_down_text'])
        ) {
            $navbar_btn['drop_down_text'] = $__site_details['btns']['navbar']['drop_down_text'] ?? 'Pages';
        }
        if (
            isset($__site_details['btns']) &&
            isset($__site_details['btns']['navbar']) &&
            !empty($__site_details['btns']['navbar']['link'])
        ) {
            $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
        }

        $bg_img_url = asset('modules/cms/img/contact.jpg');
        if (!empty($page->feature_image_url)) {
            $bg_img_url = $page->feature_image_url;
        }
    @endphp
    @includeIf('cms::frontend.layouts.home_header')
    <x-hero heroImage="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1600&q=80"
            heroSubtitle="Get In Touch"
            heroTitle="Contact Us"
            description="We'd love to hear from you. Reach out with any questions, feedback, or inquiries." />

    <style>
        /* ===== SPLIT CONTACT LAYOUT ===== */
        .contact-split {
            display: flex;
            min-height: calc(100vh - 80px);
            font-family: var(--text-font, 'Poppins', sans-serif);
            max-width: 1600px;
            margin: 0 auto;
        }

        /* ===== LEFT: IMAGE COLUMN (sticky) ===== */
        .contact-split__image-col {
            flex: 0 0 45%;
            max-width: 45%;
            position: relative;
        }

        .contact-split__image-inner {
            position: sticky;
            top: 0;
            height: 100vh;
            background-size: cover;
            background-position: center 80%;
            background-repeat: no-repeat;
        }

        /* ===== RIGHT: FORM COLUMN (scrollable) ===== */
        .contact-split__form-col {
            flex: 0 0 55%;
            max-width: 55%;
            overflow-y: auto;
            padding: 4rem 4rem 5rem;
            background: #f8fafc;
        }

        /* Form */
        .contact-split__form-col .contact-form {
            background: #ffffff;
            border-radius: 24px;
            padding: 45px 40px;
            border: 1px solid rgba(0, 128, 0, 0.1);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .contact-split__form-col .contact-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #008000, #E58E24, #008000);
            background-size: 200% 100%;
            animation: proContactShift 4s linear infinite;
        }

        @keyframes proContactShift {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }

        .contact-split__form-col .contact-form__header {
            position: relative;
            z-index: 1;
        }

        .contact-split__form-col .contact-form__title {
            font-size: 30px;
            font-weight: 800;
            color: #000000;
            line-height: 1.2;
            letter-spacing: -0.5px;
            display: inline-block;
        }

        .contact-split__form-col .contact-form__header::after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #008000, #E58E24);
            margin: 14px auto 20px;
            border-radius: 4px;
            transition: width 0.4s ease;
        }

        .contact-split__form-col .contact-form__header:hover::after {
            width: 100%;
        }

        .contact-split__form-col .contact-form__paragraph {
            font-size: 0.98rem;
            color: #6B7280;
            line-height: 1.7;
            max-width: 500px;
        }

        .contact-split__form-col .enquire_response_alert {
            border-radius: 12px;
            border: 1px solid rgba(0, 128, 0, 0.25);
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
            color: #008000;
            padding: 14px 20px;
            font-weight: 500;
            font-size: 0.92rem;
        }

        .contact-split__form-col .contact-form__input {
            width: 100%;
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

        .contact-split__form-col .contact-form__input::placeholder {
            color: #9CA3AF;
            font-weight: 400;
        }

        .contact-split__form-col .contact-form__input:focus {
            background: #ffffff;
            border-color: #008000;
            box-shadow: 0 0 0 4px rgba(0, 128, 0, 0.1);
            transform: translateY(-1px);
        }

        .contact-split__form-col .contact-form__input:hover:not(:focus) {
            border-color: rgba(0, 128, 0, 0.3);
        }

        .contact-split__form-col textarea.contact-form__input {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        .contact-split__form-col input[type=number]::-webkit-inner-spin-button,
        .contact-split__form-col input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .contact-split__form-col input[type=number] {
            -moz-appearance: textfield;
        }

        /* ===== INFO CARDS ===== */
        .contact-split__form-col .pro-info-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px 28px;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 128, 0, 0.08);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .contact-split__form-col .pro-info-card::before {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, rgba(0, 128, 0, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            transition: all 0.5s ease;
        }

        .contact-split__form-col .pro-info-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 128, 0, 0.2);
            box-shadow: 0 20px 40px rgba(0, 128, 0, 0.1);
        }

        .contact-split__form-col .pro-info-card:hover::before {
            background: radial-gradient(circle, rgba(229, 142, 36, 0.1) 0%, transparent 70%);
            transform: scale(1.4);
        }

        .contact-split__form-col .pro-info-card h4 {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.3rem;
            font-weight: 700;
            color: #1F2937;
            margin: 0 0 20px 0;
            padding: 0 0 14px 0;
            border-bottom: 2px dashed rgba(0, 128, 0, 0.15);
            position: relative;
            z-index: 1;
        }

        .contact-split__form-col .pro-info-card h4 strong {
            background: linear-gradient(135deg, #008000, #E58E24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .contact-split__form-col .pro-info-card h4::before {
            content: '';
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #008000, #E58E24);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-family: 'Font Awesome 5 Free', 'FontAwesome';
            font-weight: 900;
            font-size: 1rem;
            box-shadow: 0 6px 15px rgba(0, 128, 0, 0.25);
            flex-shrink: 0;
        }

        .contact-split__form-col .pro-call-card h4::before {
            content: '\f095';
        }

        .contact-split__form-col .pro-mail-card h4::before {
            content: '\f0e0';
        }

        .contact-split__form-col .non-bullet-list {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .contact-split__form-col .non-bullet-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin-bottom: 10px;
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.03), rgba(229, 142, 36, 0.03));
            border-radius: 12px;
            border: 1px solid rgba(0, 128, 0, 0.08);
            transition: all 0.3s ease;
            flex-wrap: wrap;
        }

        .contact-split__form-col .non-bullet-list li:last-child {
            margin-bottom: 0;
        }

        .contact-split__form-col .non-bullet-list li:hover {
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
            border-color: rgba(0, 128, 0, 0.2);
            transform: translateX(5px);
        }

        .contact-split__form-col .non-bullet-list li i.fas {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #008000, #E58E24);
            color: #ffffff !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            box-shadow: 0 4px 12px rgba(0, 128, 0, 0.25);
            flex-shrink: 0;
        }

        .contact-split__form-col .non-bullet-list li strong {
            font-size: 0.92rem;
            color: #1F2937 !important;
            font-weight: 600;
        }

        .contact-split__form-col .non-bullet-list li a {
            font-size: 0.95rem;
            color: #4B5563 !important;
            font-weight: 500;
            transition: color 0.3s ease;
            text-decoration: none !important;
            word-break: break-all;
        }

        .contact-split__form-col .non-bullet-list li:hover a {
            color: #008000 !important;
            font-weight: 600;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .contact-split {
                flex-direction: column;
                min-height: auto;
            }

            .contact-split__image-col {
                flex: none;
                max-width: 100%;
            }

            .contact-split__image-inner {
                position: relative;
                height: 40vh;
                min-height: 250px;
            }

            .contact-split__image-text h2 {
                font-size: 2rem;
            }

            .contact-split__form-col {
                flex: none;
                max-width: 100%;
                padding: 2rem 1.5rem 3rem;
            }

            .contact-split__form-col .contact-form {
                padding: 35px 28px;
            }

            .contact-split__form-col .contact-form__title {
                font-size: 23px;
            }

            .contact-split__form-col .pro-info-card {
                padding: 24px 22px;
            }
        }

        @media (max-width: 575px) {
            .contact-split__image-inner {
                height: 30vh;
                min-height: 200px;
            }

            .contact-split__form-col {
                padding: 1.5rem 1rem 2.5rem;
            }

            .contact-split__form-col .contact-form {
                padding: 28px 20px;
                border-radius: 18px;
            }

            .contact-split__form-col .contact-form__title {
                font-size: 23px;
            }

            .contact-split__form-col .pro-info-card h4 {
                font-size: 1.1rem;
            }

            .contact-split__form-col .non-bullet-list li {
                padding: 10px 12px;
                gap: 10px;
            }
        }
    </style>

    @php
        $custom_contact = [
            ['label' => 'Phone', 'num' => '+112242650'],
        ];
        $custom_mail = [
            ['label' => 'Email', 'email' => 'info@blesslifeltd.com'],
        ];
    @endphp

    <div class="contact-split">
        <div class="contact-split__image-col">
            <div class="contact-split__image-inner"
                 style="background-image: url('{{ $bg_img_url }}');">
                <div class="contact-split__image-text"></div>
            </div>
        </div>
        <div class="contact-split__form-col">
            <form class="contact-form text-center"
                  id="contact_form">
                <div class="contact-form__header mb-5">
                    <h6 class="contact-form__title mb-3">
                        {{ $page->title ?? 'Contact Us' }}
                    </h6>
                    <p class="contact-form__paragraph mb-0 mx-auto">
                        {!! $page->content ?? "We're happy to receive your message. Ask us anything, we'll respond as soon as possible." !!}
                    </p>
                </div>
                <div class="alert mt-4 alert-primary enquire_response_alert"
                     role="alert"
                     style="display:none;">
                    <span class="enquire_response"></span>
                </div>
                <input type="text"
                       name="name"
                       class="contact-form__input"
                       placeholder="Full Name"
                       required>
                <input type="number"
                       name="mobile"
                       class="contact-form__input"
                       placeholder="Mobile"
                       required>
                <input type="email"
                       name="email"
                       class="contact-form__input"
                       placeholder="Email"
                       required>
                <textarea class="contact-form__input"
                          name="message"
                          placeholder="Message"
                          required></textarea>
                <button id="submit-btn"
                        class="bls-global-btn w-100">
                    <span>SEND MESSAGE</span>
                </button>
            </form>

            <div class="pro-info-card pro-call-card">
                <h4 class="pt-3">
                    Call <strong>Us</strong>
                </h4>
                <ul class="non-bullet-list mt-2">
                    @foreach ($custom_contact as $item)
                        <li>
                            <i class="fas fa-phone"></i> &nbsp;
                            <strong class="text-dark">{{ $item['label'] }}:</strong> &nbsp;
                            <a href="tel:{{ $item['num'] }}"
                               class="text-dark text-decoration-none"
                               target="_blank">{{ $item['num'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="pro-info-card pro-mail-card">
                <h4 class="pt-3">
                    Mail <strong>Us</strong>
                </h4>
                <ul class="non-bullet-list mt-2">
                    @foreach ($custom_mail as $item)
                        <li>
                            <i class="fas fa-envelope"></i> &nbsp;
                            <strong class="text-dark">{{ $item['label'] }}:</strong> &nbsp;
                            <a href="mailto:{{ $item['email'] }}"
                               target="_blank"
                               class="text-dark text-decoration-none">{{ $item['email'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        new Sticky("[sticky]");
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#contact_form").validate({
                submitHandler: function(form, e) {
                    if ($('#contact_form').valid()) {
                        let data = $('form#contact_form').serialize();
                        $("#submit-btn").attr('disabled', true);
                        $.ajax({
                            method: 'POST',
                            dataType: "json",
                            url: "{{ route('cms.submit.contact.form') }}",
                            data: data,
                            success: function(result) {
                                $("#submit-btn").attr('disabled', false);
                                if (result.success) {
                                    $('form#contact_form').trigger("reset");
                                    $('form#enquire_now_form').trigger("reset");
                                    $(".enquire_response_alert").css({
                                        'display': ''
                                    });
                                    $(".enquire_response").text(result.msg);
                                } else {
                                    $(".enquire_response_alert").css({
                                        'display': ''
                                    });
                                    $(".enquire_response").text(result.msg);
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
