@php
    $feature = [];
    if (
        isset($page_meta['feature']) &&
        isset($page_meta['feature']['meta_value']) &&
        !empty($page_meta['feature']['meta_value'])
    ) {
        $feature = json_decode($page_meta['feature']['meta_value'], true);
    }
@endphp

@if (!empty($feature))
    <section id="pro-feature-section-wrap"
             class="pro-feature-section">

        <style>
            /* ===== MAIN SECTION ===== */
            #pro-feature-section-wrap {
                position: relative;
                padding: 7rem 0;
                background: #ffffff;
            }

            /* Decorative Background Layer */
            #pro-feature-section-wrap .pfs-bg-decor {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background:
                    radial-gradient(circle at 10% 20%, rgba(0, 128, 0, 0.05) 0%, transparent 40%),
                    radial-gradient(circle at 90% 80%, rgba(229, 142, 36, 0.05) 0%, transparent 40%);
                z-index: 0;
                pointer-events: none;
            }

            /* Floating Decorative Shapes */
            #pro-feature-section-wrap .pfs-floating-shape {
                position: absolute;
                border-radius: 50%;
                opacity: 0.4;
                pointer-events: none;
                z-index: 0;
            }

            #pro-feature-section-wrap .pfs-shape-1 {
                width: 300px;
                height: 300px;
                top: -100px;
                right: -100px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.08) 0%, transparent 70%);
            }

            #pro-feature-section-wrap .pfs-shape-2 {
                width: 250px;
                height: 250px;
                bottom: -80px;
                left: -80px;
                background: radial-gradient(circle, rgba(0, 128, 0, 0.08) 0%, transparent 70%);
            }

            /* Dot Pattern */
            #pro-feature-section-wrap .pfs-dot-pattern {
                position: absolute;
                width: 150px;
                height: 150px;
                background-image: radial-gradient(circle, rgba(0, 128, 0, 0.15) 1.5px, transparent 1.5px);
                background-size: 18px 18px;
                z-index: 0;
                pointer-events: none;
            }

            #pro-feature-section-wrap .pfs-dot-tl {
                top: 60px;
                left: 30px;
            }

            #pro-feature-section-wrap .pfs-dot-br {
                bottom: 60px;
                right: 30px;
            }

            /* ===== CONTAINER & GRID ===== */
            #pro-feature-section-wrap .pfs-container {
                position: relative;
                z-index: 2;
                max-width: 1320px;
                margin: 0 auto;
                padding: 0 20px;
                /* ❌ NO overflow here either */
            }

            #pro-feature-section-wrap .pfs-grid-wrap {
                display: flex;
                flex-direction: column;
                gap: 0;
                align-items: flex-start;
            }

            @media (min-width: 992px) {
                #pro-feature-section-wrap .pfs-grid-wrap {
                    flex-direction: row;
                }
            }

            #pro-feature-section-wrap .pfs-left-col,
            #pro-feature-section-wrap .pfs-right-col {
                flex: 0 0 100%;
                max-width: 100%;
            }

            @media (min-width: 992px) {
                #pro-feature-section-wrap .pfs-left-col {
                    flex: 0 0 42%;
                    max-width: 42%;
                    padding-right: 40px;
                    align-self: flex-start;
                    position: -webkit-sticky;
                    position: sticky;
                    top: 100px;
                    z-index: 5;
                }

                #pro-feature-section-wrap .pfs-right-col {
                    flex: 0 0 58%;
                    max-width: 58%;
                    padding-left: 20px;
                }
            }

            /* ===== LEFT SIDE - STICKY CONTENT ===== */

            #pro-feature-section-wrap .pfs-badge-tag {
                display: inline-block;
                font-size: 11px;
                font-weight: 700;
                color: #E58E24;
                text-transform: uppercase;
                letter-spacing: 2px;
                border-bottom: 1px solid rgba(229, 142, 36, 0.3);
                padding-bottom: 4px;
                margin-bottom: 16px;
                line-height: 1.4;
            }

            #pro-feature-section-wrap .pfs-main-title {
                font-size: 30px;
                font-weight: 700;
                color: #1F2937;
                line-height: 1.3;
                margin-bottom: 12px;
                letter-spacing: -0.5px;
            }

            #pro-feature-section-wrap .pfs-main-desc {
                font-size: 1rem;
                color: #6B7280;
                line-height: 1.7;
                margin-bottom: 2.5rem;
                max-width: 90%;
            }

            /* ===== Section Header Hover Effect ===== */
            #pro-feature-section-wrap .cus-ind-section-header {
                cursor: default;
            }

            #pro-feature-section-wrap .cus-ind-section-header:hover .ds-title-bar {
                width: 160px;
                box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            }

            /* Stats Box */
            #pro-feature-section-wrap .pfs-stats-row {
                display: flex;
                gap: 20px;
                margin-top: 30px;
                flex-wrap: wrap;
            }

            #pro-feature-section-wrap .pfs-stat-item {
                flex: 1;
                min-width: 120px;
                padding: 18px 16px;
                background: #ffffff;
                border-radius: 14px;
                border: 1px solid rgba(0, 128, 0, 0.1);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
                transition: all 0.3s ease;
            }

            #pro-feature-section-wrap .pfs-stat-item:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 30px rgba(0, 128, 0, 0.1);
                border-color: rgba(0, 128, 0, 0.25);
            }

            #pro-feature-section-wrap .pfs-stat-num {
                font-size: 28px;
                font-weight: 800;
                background: linear-gradient(135deg, #008000, #E58E24);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                line-height: 1;
                margin-bottom: 4px;
            }

            #pro-feature-section-wrap .pfs-stat-label {
                font-size: 12px;
                color: #6B7280;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            /* ===== RIGHT SIDE - SCROLLING CARDS ===== */
            #pro-feature-section-wrap .pfs-cards-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            @media (max-width: 767px) {
                #pro-feature-section-wrap .pfs-cards-grid {
                    grid-template-columns: 1fr;
                    gap: 16px;
                }
            }

            /* Individual Card */
            #pro-feature-section-wrap .pfs-card {
                position: relative;
                background: #ffffff;
                border-radius: 18px;
                padding: 28px 24px;
                border: 1px solid rgba(0, 128, 0, 0.08);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
                transition: all 0.45s cubic-bezier(0.25, 0.8, 0.25, 1);
                overflow: hidden;
                cursor: pointer;
            }

            #pro-feature-section-wrap .pfs-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #008000, #E58E24);
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.5s ease;
            }

            #pro-feature-section-wrap .pfs-card::after {
                content: '';
                position: absolute;
                bottom: -60px;
                right: -60px;
                width: 140px;
                height: 140px;
                background: radial-gradient(circle, rgba(0, 128, 0, 0.05) 0%, transparent 70%);
                border-radius: 50%;
                transition: all 0.5s ease;
            }

            #pro-feature-section-wrap .pfs-card:hover {
                transform: translateY(-10px);
                border-color: rgba(0, 128, 0, 0.2);
                box-shadow:
                    0 25px 50px rgba(0, 128, 0, 0.15),
                    0 10px 20px rgba(229, 142, 36, 0.08);
            }

            #pro-feature-section-wrap .pfs-card:hover::before {
                transform: scaleX(1);
            }

            #pro-feature-section-wrap .pfs-card:hover::after {
                background: radial-gradient(circle, rgba(229, 142, 36, 0.12) 0%, transparent 70%);
                transform: scale(1.3);
            }

            #pro-feature-section-wrap .pfs-card-num {
                position: absolute;
                top: 18px;
                right: 18px;
                font-size: 48px;
                font-weight: 800;
                color: rgba(0, 128, 0, 0.06);
                line-height: 1;
                transition: all 0.4s ease;
                pointer-events: none;
            }

            #pro-feature-section-wrap .pfs-card:hover .pfs-card-num {
                color: rgba(229, 142, 36, 0.15);
                transform: scale(1.1);
            }

            #pro-feature-section-wrap .pfs-card-icon-box {
                position: relative;
                width: 60px;
                height: 60px;
                border-radius: 16px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                color: #FFFFFF;
                background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
                margin-bottom: 20px;
                box-shadow: 0 10px 25px rgba(0, 128, 0, 0.25);
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                z-index: 1;
            }

            #pro-feature-section-wrap .pfs-card-icon-box::before {
                content: '';
                position: absolute;
                inset: -3px;
                border-radius: 16px;
                background: linear-gradient(135deg, #008000, #E58E24);
                opacity: 0;
                z-index: -1;
                filter: blur(10px);
                transition: opacity 0.4s ease;
            }

            #pro-feature-section-wrap .pfs-card:hover .pfs-card-icon-box {
                transform: rotate(-8deg) scale(1.1);
                border-radius: 50%;
            }

            #pro-feature-section-wrap .pfs-card:hover .pfs-card-icon-box::before {
                opacity: 0.6;
            }

            #pro-feature-section-wrap .pfs-card-title {
                font-size: 1.15rem;
                font-weight: 700;
                color: #1F2937;
                margin-bottom: 10px;
                line-height: 1.3;
                transition: color 0.3s ease;
                position: relative;
                z-index: 1;
            }

            #pro-feature-section-wrap .pfs-card:hover .pfs-card-title {
                color: #008000;
            }

            #pro-feature-section-wrap .pfs-card-desc {
                font-size: 0.9rem;
                color: #6B7280;
                line-height: 1.65;
                margin: 0;
                position: relative;
                z-index: 1;
            }

            #pro-feature-section-wrap .pfs-card-arrow {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                margin-top: 16px;
                font-size: 0.82rem;
                font-weight: 600;
                color: #008000;
                opacity: 0;
                transform: translateX(-10px);
                transition: all 0.4s ease;
                position: relative;
                z-index: 1;
            }

            #pro-feature-section-wrap .pfs-card:hover .pfs-card-arrow {
                opacity: 1;
                transform: translateX(0);
            }

            #pro-feature-section-wrap .pfs-card-arrow i {
                transition: transform 0.3s ease;
            }

            #pro-feature-section-wrap .pfs-card:hover .pfs-card-arrow i {
                transform: translateX(4px);
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 991px) {
                #pro-feature-section-wrap {
                    padding: 5rem 0;
                }

                #pro-feature-section-wrap .pfs-main-title {
                    font-size: 30px;
                }

                #pro-feature-section-wrap .pfs-left-col {
                    margin-bottom: 50px;
                    position: relative;
                    top: auto;
                }
            }

            @media (max-width: 768px) {
                #pro-feature-section-wrap .pfs-main-title {
                    font-size: 22px;
                }

                #pro-feature-section-wrap .cus-ind-section-header:hover .ds-title-bar {
                    width: 100px;
                }
            }

            @media (max-width: 575px) {
                #pro-feature-section-wrap {
                    padding: 4rem 0;
                }

                #pro-feature-section-wrap .pfs-card {
                    padding: 22px 18px;
                }

                #pro-feature-section-wrap .pfs-stats-row {
                    gap: 12px;
                }

                #pro-feature-section-wrap .pfs-stat-num {
                    font-size: 22px;
                }
            }
        </style>

        <!-- Decorative Backgrounds -->
        <div class="pfs-bg-decor"></div>
        <div class="pfs-floating-shape pfs-shape-1"></div>
        <div class="pfs-floating-shape pfs-shape-2"></div>
        <div class="pfs-dot-pattern pfs-dot-tl"></div>
        <div class="pfs-dot-pattern pfs-dot-br"></div>

        <!-- Main Container -->
        <div class="pfs-container">
            <div class="pfs-grid-wrap">

                <!-- LEFT SIDE - Sticky Content -->
                <div class="pfs-left-col">
                    <div class="pfs-sticky-box">

                        <div class="cus-ind-section-header">
                            <span class="pfs-badge-tag">Our Features</span>

                            <h2 class="pfs-main-title">
                                {{ $feature['title'] ?? '' }}
                            </h2>

                            <div class="ds-title-bar"
                                 style="margin-left: 0; margin-right: auto; margin-bottom: 24px;"></div>
                        </div>

                        <div class="pfs-main-desc">
                            {!! $feature['description'] ?? '' !!}
                        </div>

                        <!-- Optional Stats Row -->
                        <div class="pfs-stats-row">
                            <div class="pfs-stat-item">
                                <div class="pfs-stat-num">{{ count($feature['content'] ?? []) }}+</div>
                                <div class="pfs-stat-label">Features</div>
                            </div>
                            <div class="pfs-stat-item">
                                <div class="pfs-stat-num">100%</div>
                                <div class="pfs-stat-label">Quality</div>
                            </div>
                            <div class="pfs-stat-item">
                                <div class="pfs-stat-num">24/7</div>
                                <div class="pfs-stat-label">Support</div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT SIDE - Scrolling Cards Grid -->
                @if (!empty($feature['content']))
                    <div class="pfs-right-col">
                        <div class="pfs-cards-grid">

                            @foreach ($feature['content'] as $index => $content)
                                @if (!empty($content['icon']) && !empty($content['title']) && !empty($content['description']))
                                    <div class="pfs-card">
                                        <span
                                              class="pfs-card-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>

                                        <div class="pfs-card-icon-box">
                                            <i class="{{ $content['icon'] }}"></i>
                                        </div>

                                        <h3 class="pfs-card-title">
                                            {{ $content['title'] ?? '' }}
                                        </h3>

                                        <p class="pfs-card-desc">
                                            {{ $content['description'] ?? '' }}
                                        </p>

                                        <span class="pfs-card-arrow">
                                            Learn More <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                @endif

            </div>
        </div>

    </section>
@endif
