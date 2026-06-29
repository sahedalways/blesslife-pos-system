@extends('cms::frontend.layouts.app')
@section('body-class', 'nav-overflow-hidden')
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
    @endphp
    @includeIf('cms::frontend.layouts.home_header')
    <x-hero heroImage="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1600&q=80"
            heroSubtitle="Get In Touch"
            heroTitle="Contact Us"
            description="We'd love to hear from you. Reach out with any questions, feedback, or inquiries." />
    <!------------------------------>
    <!--Section Name---------------->
    <!------------------------------>
    <div class="block-27 space-between-blocks pro-contact-section"
         id="pro-contact-wrap">
        <style>
            /* ===== MAIN WRAPPER ===== */
            #pro-contact-wrap {
                position: relative;
                padding: 5rem 0 6rem;
                font-family: var(--text-font, 'Poppins', sans-serif);
                overflow: hidden;
            }

            /* Decorative Background Shapes */
            #pro-contact-wrap::before {
                content: '';
                position: absolute;
                top: 50px;
                left: -150px;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(0, 128, 0, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            #pro-contact-wrap::after {
                content: '';
                position: absolute;
                bottom: 80px;
                right: -120px;
                width: 350px;
                height: 350px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            /* ===== MAIN CONTAINER ===== */
            #pro-contact-wrap>.container {
                position: relative;
                z-index: 2;
            }

            /* ===== CONTACT FORM ===== */
            #pro-contact-wrap .contact-form {
                background: #ffffff;
                border-radius: 24px;
                padding: 45px 40px;
                border: 1px solid rgba(0, 128, 0, 0.1);
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
                position: relative;
                overflow: hidden;
            }

            /* Top accent line on form */
            #pro-contact-wrap .contact-form::before {
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

            /* Form Header */
            #pro-contact-wrap .contact-form__header {
                position: relative;
                z-index: 1;
            }

            #pro-contact-wrap .contact-form__title {
                font-size: 2rem;
                font-weight: 800;
                color: #1F2937;
                line-height: 1.2;
                letter-spacing: -0.5px;
                background: linear-gradient(135deg, #008000, #E58E24);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                display: inline-block;
            }

            /* Underline under title */
            #pro-contact-wrap .contact-form__header::after {
                content: '';
                display: block;
                width: 70px;
                height: 4px;
                background: linear-gradient(90deg, #008000, #E58E24);
                margin: 14px auto 20px;
                border-radius: 4px;
            }

            #pro-contact-wrap .contact-form__paragraph {
                font-size: 0.98rem;
                color: #6B7280;
                line-height: 1.7;
                max-width: 500px;
            }

            /* Alert Box */
            #pro-contact-wrap .enquire_response_alert {
                border-radius: 12px;
                border: 1px solid rgba(0, 128, 0, 0.25);
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
                color: #008000;
                padding: 14px 20px;
                font-weight: 500;
                font-size: 0.92rem;
            }

            /* Form Inputs */
            #pro-contact-wrap .contact-form__input {
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

            #pro-contact-wrap .contact-form__input::placeholder {
                color: #9CA3AF;
                font-weight: 400;
            }

            #pro-contact-wrap .contact-form__input:focus {
                background: #ffffff;
                border-color: #008000;
                box-shadow: 0 0 0 4px rgba(0, 128, 0, 0.1);
                transform: translateY(-1px);
            }

            #pro-contact-wrap .contact-form__input:hover:not(:focus) {
                border-color: rgba(0, 128, 0, 0.3);
            }

            #pro-contact-wrap textarea.contact-form__input {
                min-height: 120px;
                resize: vertical;
                line-height: 1.6;
            }

            /* Hide number input arrows */
            #pro-contact-wrap input[type=number]::-webkit-inner-spin-button,
            #pro-contact-wrap input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            #pro-contact-wrap input[type=number] {
                -moz-appearance: textfield;
            }

            /* ===== CONTACT INFO SECTION ===== */
            #pro-contact-wrap .pro-contact-info-col {
                padding: 0 20px;
            }

            #pro-contact-wrap .pro-info-card {
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

            #pro-contact-wrap .pro-info-card::before {
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

            #pro-contact-wrap .pro-info-card:hover {
                transform: translateY(-5px);
                border-color: rgba(0, 128, 0, 0.2);
                box-shadow: 0 20px 40px rgba(0, 128, 0, 0.1);
            }

            #pro-contact-wrap .pro-info-card:hover::before {
                background: radial-gradient(circle, rgba(229, 142, 36, 0.1) 0%, transparent 70%);
                transform: scale(1.4);
            }

            /* Info card headings */
            #pro-contact-wrap .pro-info-card h4 {
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

            #pro-contact-wrap .pro-info-card h4 strong {
                background: linear-gradient(135deg, #008000, #E58E24);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 800;
            }

            /* Heading Icon */
            #pro-contact-wrap .pro-info-card h4::before {
                content: '';
                width: 42px;
                height: 42px;
                border-radius: 12px;
                background: linear-gradient(135deg, #008000, #E58E24);
                display: inline-flex;
                align-items: center;
                justify-content: center;
                color: #ffffff;
                font-family: 'Font Awesome 6 Free', 'FontAwesome';
                font-weight: 900;
                font-size: 1rem;
                box-shadow: 0 6px 15px rgba(0, 128, 0, 0.25);
                flex-shrink: 0;
            }

            #pro-contact-wrap .pro-call-card h4::before {
                content: '\f095';
            }

            #pro-contact-wrap .pro-mail-card h4::before {
                content: '\f0e0';
            }

            /* List */
            #pro-contact-wrap .non-bullet-list {
                list-style: none;
                padding: 0;
                margin: 0;
                position: relative;
                z-index: 1;
            }

            #pro-contact-wrap .non-bullet-list li {
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

            #pro-contact-wrap .non-bullet-list li:last-child {
                margin-bottom: 0;
            }

            #pro-contact-wrap .non-bullet-list li:hover {
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
                border-color: rgba(0, 128, 0, 0.2);
                transform: translateX(5px);
            }

            /* List Icons */
            #pro-contact-wrap .non-bullet-list li i.fas {
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

            #pro-contact-wrap .non-bullet-list li strong {
                font-size: 0.92rem;
                color: #1F2937 !important;
                font-weight: 600;
            }

            #pro-contact-wrap .non-bullet-list li a {
                font-size: 0.95rem;
                color: #4B5563 !important;
                font-weight: 500;
                transition: color 0.3s ease;
                text-decoration: none !important;
                word-break: break-all;
            }

            #pro-contact-wrap .non-bullet-list li:hover a {
                color: #008000 !important;
                font-weight: 600;
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 991px) {
                #pro-contact-wrap .contact-form {
                    padding: 35px 28px;
                }

                #pro-contact-wrap .contact-form__title {
                    font-size: 1.6rem;
                }

                #pro-contact-wrap .pro-info-card {
                    padding: 24px 22px;
                }
            }

            @media (max-width: 575px) {
                #pro-contact-wrap {
                    padding: 3rem 0 4rem;
                }

                #pro-contact-wrap .contact-form {
                    padding: 28px 20px;
                    border-radius: 18px;
                }

                #pro-contact-wrap .contact-form__title {
                    font-size: 1.4rem;
                }

                #pro-contact-wrap .pro-info-card h4 {
                    font-size: 1.1rem;
                }

                #pro-contact-wrap .non-bullet-list li {
                    padding: 10px 12px;
                    gap: 10px;
                }
            }
        </style>

        <div class="container">
            @php
                $mail_us =
                    isset($__site_details['mail_us']) && !empty($__site_details['mail_us'])
                        ? $__site_details['mail_us']
                        : [];
                $mail_us_collection = collect($mail_us);
                $filtered_mail_us = $mail_us_collection->filter(function ($value, $key) {
                    return !empty($value['label']) && !empty($value['email']);
                });

                $contact_us =
                    isset($__site_details['contact_us']) && !empty($__site_details['contact_us'])
                        ? $__site_details['contact_us']
                        : [];
                $contact_us_collection = collect($contact_us);
                $filtered_contact_us = $contact_us_collection->filter(function ($value, $key) {
                    return !empty($value['label']) && !empty($value['num']);
                });
            @endphp
            <div class="row g-5 align-items-start">
                <div class="col-lg-6 px-4 px-xl-5 py-3">
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
                </div>
                @if (!empty($filtered_contact_us) || !empty($filtered_mail_us))
                    <div class="col-lg-6 px-4 px-xl-5 py-3 pro-contact-info-col">
                        @if (!empty($filtered_contact_us))
                            <div class="pro-info-card pro-call-card">
                                <h4 class="pt-3">
                                    Call <strong>Us</strong>
                                </h4>
                                <ul class="non-bullet-list mt-2">
                                    @foreach ($filtered_contact_us as $filtered_contact)
                                        <li>
                                            <i class="fas fa-phone"></i> &nbsp;
                                            <strong class="text-dark">
                                                {{ $filtered_contact['label'] }}:
                                            </strong> &nbsp;
                                            <a href="tel:{{ $filtered_contact['num'] }}"
                                               class="text-dark text-decoration-none"
                                               target="_blank">
                                                {{ $filtered_contact['num'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (!empty($filtered_mail_us))
                            <div class="pro-info-card pro-mail-card">
                                <h4 class="pt-3">
                                    Mail <strong>Us</strong>
                                </h4>
                                <ul class="non-bullet-list mt-2">
                                    @foreach ($filtered_mail_us as $filtered_mail)
                                        <li>
                                            <i class="fas fa-envelope"></i> &nbsp;
                                            <strong class="text-dark">
                                                {{ $filtered_mail['label'] }}:
                                            </strong> &nbsp;
                                            <a href="mailto:{{ $filtered_mail['email'] }}"
                                               target="_blank"
                                               class="text-dark text-decoration-none">
                                                {{ $filtered_mail['email'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @endif
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
