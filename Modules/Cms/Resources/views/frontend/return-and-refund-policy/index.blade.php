@extends('cms::frontend.layouts.app')
@section('title', 'Return and Refund Policy')
@php
    $navbar_btn['text'] = 'Try For Free';
    $navbar_btn['link'] = route('business.getRegister');
    $navbar_btn['drop_down_text'] = 'Pages';
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
        !empty($__site_details['btns']['navbar']['link'])
    ) {
        $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
    }
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['navbar']) &&
        !empty($__site_details['btns']['navbar']['drop_down_text'])
    ) {
        $navbar_btn['drop_down_text'] = $__site_details['btns']['navbar']['drop_down_text'] ?? 'Pages';
    }
@endphp
@includeIf('cms::frontend.layouts.home_header')

<x-hero heroImage="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1600&q=80"
        heroSubtitle="Policy"
        heroTitle="Return and Refund Policy"
        description="Understand our return, refund, and cancellation terms for subscriptions and services." />

@section('content')

    <section id="pro-policy-section"
             class="pro-policy-wrapper">

        <style>
            /* ===== MAIN WRAPPER (100% Match with T&C) ===== */
            #pro-policy-section {
                position: relative;
                padding: 5rem 0 6rem;
                font-family: var(--text-font, 'Poppins', sans-serif);
            }

            /* Decorative Backgrounds */
            #pro-policy-section::before {
                content: '';
                position: absolute;
                top: 80px;
                left: -150px;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(0, 128, 0, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            #pro-policy-section::after {
                content: '';
                position: absolute;
                bottom: 100px;
                right: -120px;
                width: 350px;
                height: 350px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            /* ===== CONTAINER ===== */
            #pro-policy-section .pps-container {
                position: relative;
                z-index: 2;
                max-width: 1640px;
                margin: 0 auto;
                padding: 0 20px;
            }

            /* ===== INFO BAR ===== */
            #pro-policy-section .pps-info-bar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 16px;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.05), rgba(229, 142, 36, 0.05));
                border: 1px solid rgba(0, 128, 0, 0.15);
                border-radius: 16px;
                padding: 18px 26px;
                margin-bottom: 35px;
            }

            #pro-policy-section .pps-info-item {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                font-size: 0.88rem;
                color: #4B5563;
                font-weight: 500;
            }

            #pro-policy-section .pps-info-item i {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.9rem;
                box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            }

            /* ===== GRID LAYOUT ===== */
            #pro-policy-section .pps-grid {
                display: grid;
                grid-template-columns: 280px 1fr;
                gap: 35px;
                align-items: start;
            }

            @media (max-width: 991px) {
                #pro-policy-section .pps-grid {
                    grid-template-columns: 1fr;
                    gap: 25px;
                }
            }

            /* ===== SIDEBAR / TOC ===== */
            #pro-policy-section .pps-sidebar {
                background: #ffffff;
                border-radius: 20px;
                padding: 25px 20px;
                border: 1px solid rgba(0, 128, 0, 0.1);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                position: sticky;
                top: 100px;
                max-height: calc(100vh - 120px);
                overflow-y: auto;
            }

            #pro-policy-section .pps-sidebar-title {
                font-size: 0.78rem;
                font-weight: 800;
                color: #008000;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                margin: 0 0 16px 0;
                padding-bottom: 12px;
                border-bottom: 2px dashed rgba(0, 128, 0, 0.15);
                display: flex;
                align-items: center;
                gap: 8px;
            }

            #pro-policy-section .pps-toc-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            #pro-policy-section .pps-toc-list li {
                margin-bottom: 4px;
            }

            #pro-policy-section .pps-toc-list a {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 9px 12px;
                border-radius: 10px;
                color: #4B5563;
                font-size: 0.85rem;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            #pro-policy-section .pps-toc-list a:hover,
            #pro-policy-section .pps-toc-list a.active {
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
                color: #008000;
                font-weight: 600;
                transform: translateX(4px);
            }

            #pro-policy-section .pps-toc-num {
                min-width: 22px;
                height: 22px;
                border-radius: 6px;
                background: rgba(0, 128, 0, 0.1);
                color: #008000;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.7rem;
                font-weight: 700;
            }

            #pro-policy-section .active .pps-toc-num {
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
            }

            /* ===== MAIN CONTENT ===== */
            #pro-policy-section .pps-content {
                background: #ffffff;
                border-radius: 24px;
                padding: 45px 50px;
                border: 1px solid rgba(0, 128, 0, 0.1);
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.06);
                position: relative;
                overflow: hidden;
            }

            #pro-policy-section .pps-content::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 5px;
                background: linear-gradient(90deg, #008000, #E58E24, #008000);
                background-size: 200% 100%;
                animation: ppsGradientShift 4s linear infinite;
            }

            @keyframes ppsGradientShift {
                0% {
                    background-position: 0% 50%;
                }

                100% {
                    background-position: 200% 50%;
                }
            }

            /* Typography */
            #pro-policy-section .pps-section {
                margin-bottom: 38px;
                scroll-margin-top: 100px;
            }

            #pro-policy-section .pps-section-title {
                display: flex;
                align-items: center;
                gap: 14px;
                font-size: 1.45rem;
                font-weight: 700;
                color: #1F2937;
                margin: 0 0 20px 0;
                padding-bottom: 14px;
                border-bottom: 2px solid rgba(0, 128, 0, 0.1);
                position: relative;
            }

            #pro-policy-section .pps-section-title::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 70px;
                height: 2px;
                background: linear-gradient(90deg, #008000, #E58E24);
            }

            #pro-policy-section .pps-section-num {
                min-width: 42px;
                height: 42px;
                border-radius: 12px;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.95rem;
                font-weight: 800;
            }

            #pro-policy-section .pps-bullet-list {
                list-style: none;
                padding: 0;
                margin: 14px 0;
            }

            #pro-policy-section .pps-bullet-list li {
                position: relative;
                padding: 8px 0 8px 28px;
                font-size: 0.95rem;
                color: #4B5563;
                line-height: 1.6;
            }

            #pro-policy-section .pps-bullet-list li::before {
                content: '';
                position: absolute;
                top: 16px;
                left: 0;
                width: 16px;
                height: 2px;
                background: linear-gradient(90deg, #008000, #E58E24);
                border-radius: 2px;
            }

            /* Note Box */
            #pro-policy-section .pps-note-box {
                display: flex;
                align-items: flex-start;
                gap: 14px;
                padding: 18px 22px;
                background: #fffbeb;
                border-left: 5px solid #E58E24;
                border-radius: 12px;
                margin: 16px 0;
            }

            #pro-policy-section .pps-note-box i {
                color: #E58E24;
                font-size: 1.4rem;
            }

            /* Contact Card */
            #pro-policy-section .pps-contact-card {
                background: linear-gradient(135deg, #008000 0%, #2d5016 60%, #E58E24 100%);
                color: #ffffff;
                border-radius: 20px;
                padding: 30px 26px;
            }

            #pro-policy-section .pps-contact-list {
                list-style: none;
                padding: 0;
                display: grid;
                gap: 10px;
            }

            #pro-policy-section .pps-contact-list li {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 16px;
                background: rgba(255, 255, 255, 0.15);
                border-radius: 10px;
                font-size: 0.88rem;
            }

            #pro-policy-section .pps-contact-list a {
                color: #fff;
                text-decoration: none;
                font-weight: 600;
            }

            /* Special Guarantee Box */
            #pro-policy-section .pps-guarantee-box {
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
                border: 2px dashed #008000;
                border-radius: 16px;
                padding: 25px;
                text-align: center;
                margin-top: 30px;
            }

            #pro-policy-section .pps-guarantee-box i {
                font-size: 2.5rem;
                color: #008000;
                margin-bottom: 15px;
                display: block;
            }
        </style>

        <div class="pps-container">

            <!-- Info Bar -->
            <div class="pps-info-bar">
                <div class="pps-info-item">
                    <i class="fas fa-calendar-check"></i>
                    <span><strong>Effective Date:</strong> {{ date('F j, Y') }}</span>
                </div>
                <div class="pps-info-item">
                    <i class="fas fa-sync-alt"></i>
                    <span><strong>Last Updated:</strong> {{ date('F j, Y') }}</span>
                </div>
                <div class="pps-info-item">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span><strong>Transparent</strong> Billing Policy</span>
                </div>
            </div>

            <div class="pps-grid">
                <!-- Sidebar TOC -->
                <aside class="pps-sidebar">
                    <h5 class="pps-sidebar-title"><i class="fas fa-list-ul"></i> Navigation</h5>
                    <ul class="pps-toc-list">
                        <li><a href="#sec-1"><span class="pps-toc-num">1</span> Nature of Services</a></li>
                        <li><a href="#sec-2"><span class="pps-toc-num">2</span> Subscription Fees</a></li>
                        <li><a href="#sec-3"><span class="pps-toc-num">3</span> Refund Eligibility</a></li>
                        <li><a href="#sec-4"><span class="pps-toc-num">4</span> Non-Refundable Items</a></li>
                        <li><a href="#sec-5"><span class="pps-toc-num">5</span> Free Trial</a></li>
                        <li><a href="#sec-6"><span class="pps-toc-num">6</span> Cancellation</a></li>
                        <li><a href="#sec-7"><span class="pps-toc-num">7</span> Automatic Renewal</a></li>
                        <li><a href="#sec-8"><span class="pps-toc-num">8</span> Service Interruptions</a></li>
                        <li><a href="#sec-9"><span class="pps-toc-num">9</span> Refund Procedure</a></li>
                        <li><a href="#sec-10"><span class="pps-toc-num">10</span> Processing Time</a></li>
                        <li><a href="#sec-11"><span class="pps-toc-num">11</span> Suspension</a></li>
                        <li><a href="#sec-12"><span class="pps-toc-num">12</span> Custom Work</a></li>
                        <li><a href="#sec-13"><span class="pps-toc-num">13</span> Chargebacks</a></li>
                        <li><a href="#sec-14"><span class="pps-toc-num">14</span> Policy Changes</a></li>
                        <li><a href="#sec-15"><span class="pps-toc-num">15</span> Contact Us</a></li>
                    </ul>
                </aside>

                <!-- Main Content -->
                <div class="pps-content">
                    <div class="pps-section">
                        <p style="font-size: 1.05rem; line-height: 1.8; font-weight: 500; color: #1F2937;">
                            At <strong>BlessLife Ltd</strong>, we strive to provide reliable and high-quality cloud-based
                            ERP, POS, and ZATCA E-Invoicing software. This Return & Refund Policy explains how subscription
                            cancellations and refunds are handled.
                        </p>
                    </div>

                    <!-- Section 1 -->
                    <div class="pps-section"
                         id="sec-1">
                        <h2 class="pps-section-title"><span class="pps-section-num">01</span> Nature of Our Services</h2>
                        <p>BlessLife ERP is a Software as a Service (SaaS) platform delivered online. Because customers
                            receive immediate access to the software upon activation, our services are generally
                            <strong>non-returnable</strong>.</p>
                    </div>

                    <!-- Section 2 -->
                    <div class="pps-section"
                         id="sec-2">
                        <h2 class="pps-section-title"><span class="pps-section-num">02</span> Subscription Fees</h2>
                        <p>Subscription fees are billed in advance on a monthly or annual basis depending on your chosen plan. All fees are non-transferable and non-refundable unless explicitly stated otherwise in this policy.</p>
                        <p>We reserve the right to modify subscription pricing with at least 30 days' notice. Price changes will not affect your current billing cycle.</p>
                    </div>

                    <!-- Section 3 -->
                    <div class="pps-section"
                         id="sec-3">
                        <h2 class="pps-section-title"><span class="pps-section-num">03</span> Refund Eligibility</h2>
                        <p>Refunds may be considered only in specific circumstances:</p>
                        <ul class="pps-bullet-list">
                            <li>Duplicate or accidental payments.</li>
                            <li>Incorrect billing caused by a system error.</li>
                            <li>Multiple charges for the same subscription.</li>
                            <li>Billing errors confirmed by BlessLife Ltd support.</li>
                        </ul>
                    </div>

                    <!-- Section 4 -->
                    <div class="pps-section"
                         id="sec-4">
                        <h2 class="pps-section-title"><span class="pps-section-num">04</span> Non-Refundable Services</h2>
                        <p>The following are strictly non-refundable:</p>
                        <ul class="pps-bullet-list"
                            style="display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px;">
                            <li>Subscription fees after activation</li>
                            <li>Partial subscription periods</li>
                            <li>Setup or onboarding services</li>
                            <li>Data migration & Training</li>
                            <li>Custom software development</li>
                            <li>Consultation services</li>
                        </ul>
                    </div>

                    <!-- Section 5 -->
                    <div class="pps-section"
                         id="sec-5">
                        <h2 class="pps-section-title"><span class="pps-section-num">05</span> Free Trial</h2>
                        <p>We may offer a free trial period for new users. During the trial period, you will have full access to the platform at no cost. If you cancel before the trial ends, you will not be charged.</p>
                        <p>At the end of the trial period, your subscription will automatically convert to a paid plan unless you cancel before the conversion date. No refunds are issued for charges incurred after trial conversion.</p>
                    </div>

                    <!-- Section 6 -->
                    <div class="pps-section"
                         id="sec-6">
                        <h2 class="pps-section-title"><span class="pps-section-num">06</span> Cancellation</h2>
                        <p>You may cancel your subscription at any time through your account dashboard or by contacting our support team. Upon cancellation, your access to the platform will continue until the end of the current billing period.</p>
                        <p>No prorated refunds will be issued for the remaining days of the billing period after cancellation. You will retain access to your data for export purposes for 30 days following cancellation.</p>
                    </div>

                    <!-- Section 7 -->
                    <div class="pps-section"
                         id="sec-7">
                        <h2 class="pps-section-title"><span class="pps-section-num">07</span> Automatic Renewal</h2>
                        <p>All subscriptions renew automatically at the end of each billing period unless cancelled at least 24 hours before the renewal date. You authorize us to charge the then-applicable subscription fee to your selected payment method.</p>
                        <p>If a payment fails, we will attempt to process the payment again within 5 business days. Continued failure to pay may result in service suspension and data loss.</p>
                    </div>

                    <!-- Section 8 -->
                    <div class="pps-section"
                         id="sec-8">
                        <h2 class="pps-section-title"><span class="pps-section-num">08</span> Service Interruptions</h2>
                        <div class="pps-note-box">
                            <i class="fas fa-tools"></i>
                            <p class="mb-0">Temporary interruptions due to maintenance or government systems (ZATCA
                                platform availability) do not automatically qualify for refunds.</p>
                        </div>
                    </div>

                    <!-- Section 9 -->
                    <div class="pps-section"
                         id="sec-9">
                        <h2 class="pps-section-title"><span class="pps-section-num">09</span> Refund Procedure</h2>
                        <p>To request a refund, please contact our support team at <strong>support@blesslifeltd.com</strong> with your account details and a clear explanation of the issue.</p>
                        <p>All refund requests must be submitted within 30 days of the billing date. We will review your request and respond within 5-7 business days. Approved refunds will be processed to the original payment method.</p>
                    </div>

                    <!-- Section 10 -->
                    <div class="pps-section"
                         id="sec-10">
                        <h2 class="pps-section-title"><span class="pps-section-num">10</span> Processing Time</h2>
                        <p>Once a refund is approved, it may take 5-10 business days for the amount to appear in your account, depending on your payment provider and banking institution.</p>
                        <ul class="pps-bullet-list">
                            <li>Credit/debit card refunds: 5-7 business days</li>
                            <li>Bank transfer refunds: 7-10 business days</li>
                            <li>Digital wallet refunds: 3-5 business days</li>
                        </ul>
                    </div>

                    <!-- Section 11 -->
                    <div class="pps-section"
                         id="sec-11">
                        <h2 class="pps-section-title"><span class="pps-section-num">11</span> Suspension &amp; Termination</h2>
                        <p>We reserve the right to suspend or terminate your account for violation of our Terms of Service, non-payment, or fraudulent activity. In such cases, no refund will be issued for the remaining subscription period.</p>
                        <p>If your account is suspended in error, please contact support immediately to resolve the issue.</p>
                    </div>

                    <!-- Section 12 -->
                    <div class="pps-section"
                         id="sec-12">
                        <h2 class="pps-section-title"><span class="pps-section-num">12</span> Custom Development Work</h2>
                        <p>Fees for custom development, integrations, or professional services are non-refundable once work has commenced. If you have paid for custom work that has not yet been started, you may request a full refund within 7 days of payment.</p>
                        <p>All custom work deliverables are subject to the scope defined in your project agreement. Additional features or changes requested after work begins may incur extra charges.</p>
                    </div>

                    <!-- Section 13 -->
                    <div class="pps-section"
                         id="sec-13">
                        <h2 class="pps-section-title"><span class="pps-section-num">13</span> Chargebacks</h2>
                        <p>Please contact us before initiating a chargeback with your provider. Fraudulent or unjustified
                            chargebacks may result in immediate account termination.</p>
                    </div>

                    <!-- Optional Guarantee Section -->
                    <div class="pps-guarantee-box">
                        <i class="fas fa-medal"></i>
                        <h4>30-Day Money-Back Guarantee</h4>
                        <p class="mb-0">For first-time subscribers: If you are not satisfied within your first 30 days
                            (and no custom work has been done), you may request a review for a refund.</p>
                    </div>

                    <!-- Section 14 -->
                    <div class="pps-section"
                         id="sec-14"
                         style="margin-top: 40px;">
                        <h2 class="pps-section-title"><span class="pps-section-num">14</span> Policy Changes</h2>
                        <p>We may update this Return and Refund Policy from time to time. Changes will be posted on this page with an updated effective date. Continued use of our services after changes constitutes acceptance of the revised policy.</p>
                        <p>Material changes will be communicated via email at least 14 days before taking effect.</p>
                    </div>

                    <!-- Section 15 -->
                    <div class="pps-section"
                         id="sec-15"
                         style="margin-top: 40px;">
                        <h2 class="pps-section-title"><span class="pps-section-num">15</span> Contact Us</h2>
                        <div class="pps-contact-card">
                            <h3>BlessLife Ltd Support</h3>
                            <p>Questions about billing? We are here to help.</p>
                            <ul class="pps-contact-list">
                                <li><i class="fas fa-phone"></i> <a href="tel:+112242650">+1 122 426 50</a></li>
                                <li><i class="fas fa-envelope"></i> <a
                                       href="mailto:support@blesslifeltd.com">support@blesslifeltd.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tocLinks = document.querySelectorAll('#pro-policy-section .pps-toc-list a');
            const sections = document.querySelectorAll('#pro-policy-section .pps-section');

            tocLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 90,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            window.addEventListener('scroll', function() {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 120;
                    if (pageYOffset >= sectionTop) {
                        current = section.getAttribute('id');
                    }
                });
                tocLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection
