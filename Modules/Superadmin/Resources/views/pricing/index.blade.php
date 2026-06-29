@extends('cms::frontend.layouts.app')
@section('body-class', 'nav-overflow-hidden')
@section('title', __('superadmin::lang.pricing'))

@section('meta')
    <meta name="description"
          content="Choose the perfect pricing plan for your business. Compare features, flexible subscription options, and affordable plans designed to help you manage sales, inventory, customers, and business operations efficiently.">
@endsection

@section('content')
    @php
        $navbar_btn['text'] = 'Try For Free';
        $navbar_btn['drop_down_text'] = 'Pages';
        $navbar_btn['link'] = route('business.getRegister');
    @endphp
    @includeIf('cms::frontend.layouts.home_header')
    <x-hero heroImage="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1600&q=80"
            heroSubtitle="Pricing"
            heroTitle="Choose Your Plan"
            description="Select the perfect plan for your business. Start with a free trial, no credit card required." />

    <div id="pro-pricing-section"
         class="pro-pricing-wrapper">

        <style>
            /* ===== MAIN WRAPPER ===== */
            #pro-pricing-section {
                position: relative;
                padding: 5rem 0 6rem;
                overflow: hidden;
                font-family: var(--text-font, 'Poppins', sans-serif);
                    background: linear-gradient(180deg, #f0fdf4 0%, #ffffff 40%, #fefce8 100%);
            }

            /* Decorative Background Elements */
            #pro-pricing-section .pps-bg-shape {
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            #pro-pricing-section .pps-shape-1 {
                width: 450px;
                height: 450px;
                top: -150px;
                left: -150px;
                    background: radial-gradient(circle, rgba(0, 128, 0, 0.06) 0%, transparent 70%);
            }

            #pro-pricing-section .pps-shape-2 {
                width: 400px;
                height: 400px;
                bottom: -120px;
                right: -120px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.15) 0%, transparent 70%);
            }

            #pro-pricing-section .pps-dot-grid {
                position: absolute;
                width: 200px;
                height: 200px;
                    background-image: radial-gradient(circle, rgba(0, 128, 0, 0.1) 1.5px, transparent 1.5px);
                background-size: 20px 20px;
                top: 80px;
                right: 60px;
                z-index: 0;
                opacity: 0.6;
            }

            /* ===== CONTAINER ===== */
            #pro-pricing-section .pps-container {
                position: relative;
                z-index: 2;
                max-width: 1320px;
                margin: 0 auto;
                padding: 0 20px;
            }

            /* ===== HEADER ===== */
            #pro-pricing-section .pps-header {
                text-align: center;
                max-width: 700px;
                margin: 0 auto 50px;
            }

            #pro-pricing-section .ds-subtitle {
                color: #E58E24;
            }

            #pro-pricing-section .ds-subtitle::before,
            #pro-pricing-section .ds-subtitle::after {
                background: linear-gradient(90deg, transparent, #E58E24);
            }

            #pro-pricing-section .ds-title-bar {
                background: linear-gradient(90deg, #008000, #E58E24);
            }

            #pro-pricing-section .ds-title-bar::before {
                background: linear-gradient(90deg, #008000, #E58E24);
            }

                /* ===== TOGGLE SWITCH ===== */
                #pro-pricing-section .pps-toggle-wrap {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 18px;
                    margin: 35px 0 50px;
                    padding: 12px 22px;
                    background: #ffffff;
                    border: 1px solid rgba(0, 128, 0, 0.1);
                    border-radius: 60px;
                    width: fit-content;
                    margin-left: auto;
                    margin-right: auto;
                    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
                }

                #pro-pricing-section .pps-toggle-label {
                    font-size: 15px;
                    font-weight: 600;
                    color: #9CA3AF;
                    cursor: pointer;
                    transition: color 0.3s ease;
                    user-select: none;
                }

                #pro-pricing-section .pps-toggle-label.active {
                    color: #008000;
                }

            /* Custom Toggle */
            #pro-pricing-section .pps-toggle-switch {
                position: relative;
                display: inline-block;
                width: 56px;
                height: 30px;
                flex-shrink: 0;
            }

            #pro-pricing-section .pps-toggle-switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            #pro-pricing-section .pps-toggle-slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, #FFD700, #E58E24);
                border-radius: 30px;
                transition: 0.4s;
                box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.15);
            }

            #pro-pricing-section .pps-toggle-slider::before {
                content: '';
                position: absolute;
                height: 22px;
                width: 22px;
                left: 4px;
                bottom: 4px;
                background: #ffffff;
                border-radius: 50%;
                transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.25);
            }

            #pro-pricing-section .pps-toggle-switch input:checked+.pps-toggle-slider::before {
                transform: translateX(26px);
            }

            /* Save Badge */
            #pro-pricing-section .pps-save-tag {
                display: inline-flex;
                align-items: center;
                gap: 4px;
                padding: 4px 12px;
                background: linear-gradient(135deg, #10b981, #059669);
                color: #ffffff;
                font-size: 11px;
                font-weight: 700;
                border-radius: 20px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-left: 4px;
                box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35);
                animation: ppsBounce 2s ease-in-out infinite;
            }

            @keyframes ppsBounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-3px);
                }
            }

            /* ===== PRICING GRID ===== */
            #pro-pricing-section .pps-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 28px;
                align-items: stretch;
            }

            @media (max-width: 991px) {
                #pro-pricing-section .pps-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 640px) {
                #pro-pricing-section .pps-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }
            }

            /* ===== PRICING CARD ===== */
            #pro-pricing-section .pps-card {
                position: relative;
                background: #ffffff;
                border-radius: 24px;
                padding: 38px 32px;
                border: 2px solid transparent;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
                transition: all 0.45s cubic-bezier(0.25, 0.8, 0.25, 1);
                display: flex;
                flex-direction: column;
                overflow: hidden;
            }

            /* Background shimmer */
            #pro-pricing-section .pps-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 5px;
                background: linear-gradient(90deg, #008000, #E58E24);
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.5s ease;
            }

            #pro-pricing-section .pps-card:hover {
                transform: translateY(-12px);
                box-shadow: 0 30px 70px rgba(0, 0, 0, 0.2);
                border-color: rgba(0, 128, 0, 0.2);
            }

            #pro-pricing-section .pps-card:hover::before {
                transform: scaleX(1);
            }

            /* ===== POPULAR/FEATURED CARD ===== */
            #pro-pricing-section .pps-card.pps-featured {
                background: linear-gradient(160deg, #008000 0%, #2d5016 60%, #E58E24 100%);
                color: #ffffff;
                transform: scale(1.05);
                box-shadow: 0 25px 60px rgba(0, 128, 0, 0.4);
                border-color: rgba(255, 255, 255, 0.2);
                z-index: 2;
            }

            #pro-pricing-section .pps-card.pps-featured:hover {
                transform: scale(1.05) translateY(-12px);
            }

            #pro-pricing-section .pps-card.pps-featured::before {
                background: linear-gradient(90deg, #FFD700, #ffffff);
                transform: scaleX(1);
            }

            /* Featured background pattern */
            #pro-pricing-section .pps-card.pps-featured::after {
                content: '';
                position: absolute;
                top: -50px;
                right: -50px;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
                border-radius: 50%;
                animation: ppsFloat 6s ease-in-out infinite;
            }

            @keyframes ppsFloat {

                0%,
                100% {
                    transform: translateY(0) scale(1);
                }

                50% {
                    transform: translateY(-15px) scale(1.05);
                }
            }

            /* Popular Ribbon */
            #pro-pricing-section .pps-popular-tag {
                position: absolute;
                top: 20px;
                right: 20px;
                background: linear-gradient(135deg, #FFD700, #f39c12);
                color: #1F2937;
                padding: 6px 14px;
                border-radius: 50px;
                font-size: 10px;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1px;
                box-shadow: 0 6px 18px rgba(255, 215, 0, 0.4);
                z-index: 3;
                display: inline-flex;
                align-items: center;
                gap: 4px;
            }

            #pro-pricing-section .pps-popular-tag i {
                font-size: 0.7rem;
            }

            /* ===== CARD CONTENT ===== */
            #pro-pricing-section .pps-card-icon {
                width: 64px;
                height: 64px;
                border-radius: 18px;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.1), rgba(229, 142, 36, 0.1));
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 1.6rem;
                color: #008000;
                margin-bottom: 20px;
                transition: all 0.4s ease;
                position: relative;
                z-index: 2;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-card-icon {
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(10px);
                color: #ffffff;
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            #pro-pricing-section .pps-card:hover .pps-card-icon {
                transform: rotate(-8deg) scale(1.1);
            }

            #pro-pricing-section .pps-card-name {
                font-size: 1.5rem;
                font-weight: 700;
                color: #1F2937;
                margin-bottom: 8px;
                line-height: 1.3;
                position: relative;
                z-index: 2;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-card-name {
                color: #ffffff;
            }

            #pro-pricing-section .pps-card-desc {
                font-size: 0.9rem;
                color: #6B7280;
                line-height: 1.6;
                margin-bottom: 24px;
                position: relative;
                z-index: 2;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-card-desc {
                color: rgba(255, 255, 255, 0.9);
            }

            /* Price */
            #pro-pricing-section .pps-price-wrap {
                position: relative;
                z-index: 2;
                margin-bottom: 28px;
                padding-bottom: 24px;
                border-bottom: 1px dashed rgba(0, 128, 0, 0.2);
            }

            #pro-pricing-section .pps-card.pps-featured .pps-price-wrap {
                border-bottom-color: rgba(255, 255, 255, 0.25);
            }

            #pro-pricing-section .pps-price-box {
                display: flex;
                align-items: baseline;
                gap: 4px;
                margin-bottom: 6px;
            }

            #pro-pricing-section .pps-currency {
                font-size: 1.5rem;
                font-weight: 700;
                color: #1F2937;
                line-height: 1;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-currency {
                color: #ffffff;
            }

            #pro-pricing-section .pps-amount {
                font-size: 3.2rem;
                font-weight: 800;
                color: #1F2937;
                line-height: 1;
                letter-spacing: -2px;
                background: linear-gradient(135deg, #008000, #E58E24);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-amount {
                background: linear-gradient(135deg, #FFD700, #ffffff);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            #pro-pricing-section .pps-period {
                font-size: 0.95rem;
                color: #6B7280;
                font-weight: 500;
                margin-left: 4px;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-period {
                color: rgba(255, 255, 255, 0.85);
            }

            #pro-pricing-section .pps-price-note {
                font-size: 0.78rem;
                color: #9CA3AF;
                font-weight: 500;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-price-note {
                color: rgba(255, 255, 255, 0.75);
            }

            /* Features List */
            #pro-pricing-section .pps-features {
                list-style: none;
                padding: 0;
                margin: 0 0 28px 0;
                flex: 1;
                position: relative;
                z-index: 2;
            }

            #pro-pricing-section .pps-features li {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                padding: 10px 0;
                font-size: 0.92rem;
                color: #4B5563;
                line-height: 1.5;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-features li {
                color: rgba(255, 255, 255, 0.95);
            }

            #pro-pricing-section .pps-features li .pps-check-icon {
                flex-shrink: 0;
                width: 22px;
                height: 22px;
                border-radius: 50%;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.15), rgba(229, 142, 36, 0.15));
                color: #008000;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.7rem;
                margin-top: 2px;
            }

            #pro-pricing-section .pps-card.pps-featured .pps-features li .pps-check-icon {
                background: rgba(255, 255, 255, 0.2);
                color: #FFD700;
            }

            #pro-pricing-section .pps-features li.pps-disabled {
                color: #D1D5DB;
                text-decoration: line-through;
            }

            #pro-pricing-section .pps-features li.pps-disabled .pps-check-icon {
                background: rgba(0, 0, 0, 0.05);
                color: #D1D5DB;
            }

            /* CTA Button */
            #pro-pricing-section .pps-cta-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                padding: 14px 24px;
                background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
                color: #ffffff;
                border-radius: 50px;
                font-size: 0.95rem;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                position: relative;
                z-index: 2;
                box-shadow: 0 10px 25px rgba(0, 128, 0, 0.25);
            }

            #pro-pricing-section .pps-cta-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 35px rgba(229, 142, 36, 0.4);
                color: #ffffff;
            }

            #pro-pricing-section .pps-cta-btn i {
                transition: transform 0.3s ease;
            }

            #pro-pricing-section .pps-cta-btn:hover i {
                transform: translateX(5px);
            }

            #pro-pricing-section .pps-card.pps-featured .pps-cta-btn {
                background: #ffffff;
                color: #008000;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }

            #pro-pricing-section .pps-card.pps-featured .pps-cta-btn:hover {
                color: #E58E24;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            }

            /* Trust Section */
                #pro-pricing-section .pps-trust {
                    text-align: center;
                    margin-top: 50px;
                    color: #4B5563;
                }

            #pro-pricing-section .pps-trust-items {
                display: flex;
                justify-content: center;
                gap: 30px;
                flex-wrap: wrap;
                margin-top: 16px;
            }

            #pro-pricing-section .pps-trust-item {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                font-size: 0.9rem;
                font-weight: 500;
            }

                #pro-pricing-section .pps-trust-item i {
                    color: #E58E24;
                    font-size: 1rem;
                }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 767px) {
                #pro-pricing-section {
                    padding: 3.5rem 0 4rem;
                }

                #pro-pricing-section .pps-title {
                    font-size: 30px;
                }

                #pro-pricing-section .pps-card {
                    padding: 30px 24px;
                }

                #pro-pricing-section .pps-card.pps-featured {
                    transform: scale(1);
                }

                #pro-pricing-section .pps-card.pps-featured:hover {
                    transform: translateY(-12px);
                }

                #pro-pricing-section .pps-amount {
                    font-size: 2.5rem;
                }

                #pro-pricing-section .pps-trust-items {
                    gap: 16px;
                }
            }
        </style>

        <!-- Decorative Backgrounds -->
        <div class="pps-bg-shape pps-shape-1"></div>
        <div class="pps-bg-shape pps-shape-2"></div>
        <div class="pps-dot-grid"></div>

        <div class="pps-container">

            <!-- Header -->
            <div class="pps-header">
                <div class="ds-section-header-wrapper">
                    <span class="ds-subtitle">Pricing</span>
                    <h2 class="ds-page-title">Choose Your Perfect Plan</h2>
                    <div class="ds-title-bar"></div>
                </div>
                <p
                   style="font-size: 1.05rem; color: #4B5563; line-height: 1.7; margin: 0; margin-top: 1.5rem;">
                    Select the best {{ config('app.name', 'ultimatePOS') }} pricing plan that fits your business needs.

                </p>

                <!-- Toggle Switch -->
                <div class="pps-toggle-wrap">
                    <span class="pps-toggle-label active"
                          id="monthlyLabel">Monthly</span>

                    <label class="pps-toggle-switch">
                        <input type="checkbox"
                               id="durationCheck"
                               class="duration_check">
                        <span class="pps-toggle-slider"></span>
                    </label>

                    <span class="pps-toggle-label"
                          id="annualLabel">
                        Annual
                        <span class="pps-save-tag">
                            <i class="fas fa-tag"></i> Save 20%
                        </span>
                    </span>
                </div>
            </div>

            <!-- Pricing Cards Grid -->
            <div class="pps-grid"
                 id="packages">

                {{-- @include('superadmin::subscription.partials.packages', [
                'action_type' => 'register',
            ]) --}}

                {{-- ============================================ --}}
                {{-- DEMO CARDS - Replace with your @include --}}
                {{-- ============================================ --}}

                <!-- Card 1: Starter -->
                <div class="pps-card">
                    <div class="pps-card-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="pps-card-name">Starter</h3>
                    <p class="pps-card-desc">Perfect for small businesses getting started</p>

                    <div class="pps-price-wrap">
                        <div class="pps-price-box">
                            <span class="pps-currency">$</span>
                            <span class="pps-amount">19</span>
                            <span class="pps-period">/month</span>
                        </div>
                        <span class="pps-price-note">Billed monthly</span>
                    </div>

                    <ul class="pps-features">
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Up to 5 users</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> 10GB Storage</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Basic Reports</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Email Support</li>
                        <li class="pps-disabled"><span class="pps-check-icon"><i class="fas fa-times"></i></span>
                            Priority Support</li>
                    </ul>

                    <a href="#"
                       class="pps-cta-btn">
                        Get Started <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 2: Professional (FEATURED) -->
                <div class="pps-card pps-featured">
                    <span class="pps-popular-tag">
                        <i class="fas fa-star"></i> Most Popular
                    </span>

                    <div class="pps-card-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3 class="pps-card-name">Professional</h3>
                    <p class="pps-card-desc">Best for growing businesses with advanced needs</p>

                    <div class="pps-price-wrap">
                        <div class="pps-price-box">
                            <span class="pps-currency">$</span>
                            <span class="pps-amount">49</span>
                            <span class="pps-period">/month</span>
                        </div>
                        <span class="pps-price-note">Billed monthly</span>
                    </div>

                    <ul class="pps-features">
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Up to 25 users</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> 100GB Storage</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Advanced Reports</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Priority Support</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> API Access</li>
                    </ul>

                    <a href="#"
                       class="pps-cta-btn">
                        Choose Plan <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 3: Enterprise -->
                <div class="pps-card">
                    <div class="pps-card-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h3 class="pps-card-name">Enterprise</h3>
                    <p class="pps-card-desc">For large teams with unlimited possibilities</p>

                    <div class="pps-price-wrap">
                        <div class="pps-price-box">
                            <span class="pps-currency">$</span>
                            <span class="pps-amount">99</span>
                            <span class="pps-period">/month</span>
                        </div>
                        <span class="pps-price-note">Billed monthly</span>
                    </div>

                    <ul class="pps-features">
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Unlimited users</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Unlimited Storage</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> Custom Reports</li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> 24/7 Dedicated Support
                        </li>
                        <li><span class="pps-check-icon"><i class="fas fa-check"></i></span> White Label Solution</li>
                    </ul>

                    <a href="#"
                       class="pps-cta-btn">
                        Contact Sales <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>

            <!-- Trust Indicators -->
            <div class="pps-trust">
                <div class="pps-trust-items">
                    <span class="pps-trust-item">
                        <i class="fas fa-shield-alt"></i> Secure Payment
                    </span>
                    <span class="pps-trust-item">
                        <i class="fas fa-undo"></i> 30-Day Money Back
                    </span>
                    <span class="pps-trust-item">
                        <i class="fas fa-headset"></i> 24/7 Support
                    </span>
                    <span class="pps-trust-item">
                        <i class="fas fa-sync-alt"></i> Cancel Anytime
                    </span>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('durationCheck');
            const monthlyLabel = document.getElementById('monthlyLabel');
            const annualLabel = document.getElementById('annualLabel');

            if (toggle && monthlyLabel && annualLabel) {
                toggle.addEventListener('change', function() {
                    if (this.checked) {
                        monthlyLabel.classList.remove('active');
                        annualLabel.classList.add('active');
                    } else {
                        monthlyLabel.classList.add('active');
                        annualLabel.classList.remove('active');
                    }
                });
            }
        });
    </script>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.change_lang').click(function() {
                window.location = "{{ route('pricing') }}?lang=" + $(this).attr('value');
            });

            $('#durationCheck').off('change').on('change', function() {
                var interval = $(this).is(':checked') ? 'years' : 'months';
                set_packages(interval);
            });

            function set_packages(interval) {
                $.ajax({
                    method: 'get',
                    url: "{{ route('package_duration_update') }}",
                    dataType: 'html',
                    data: {
                        interval: interval
                    },
                    success: function(response) {
                        $('#packages').html(response);
                        // this function use for formate currency
                        __currency_convert_recursively($('.price_card'))
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown);
                    },
                });
            }
            set_packages('months');
        })
    </script>
@endsection
