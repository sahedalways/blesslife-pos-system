@php
    $industry = [];
    if (
        isset($page_meta['industry']) &&
        isset($page_meta['industry']['meta_value']) &&
        !empty($page_meta['industry']['meta_value'])
    ) {
        $industry = json_decode($page_meta['industry']['meta_value'], true);
    }
@endphp

@if (!empty($industry))

    <div id="custom-industries-section-wrapper">

        <style>
            #custom-industries-section-wrapper {
                position: relative;
                width: 100%;
                padding: 6rem 0;
                overflow: hidden;
                font-family: var(--text-font, sans-serif);
                background: #fafbfc;
            }

            /* ===== Decorative Background ===== */
            #custom-industries-section-wrapper .cus-ind-bg-layer {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.05) 0%, rgba(229, 142, 36, 0.05) 100%);
                z-index: 0;
                pointer-events: none;
            }

            #custom-industries-section-wrapper .cus-ind-dots-decoration {
                position: absolute;
                top: 30px;
                left: 15px;
                width: 200px;
                height: 200px;
                background-image: radial-gradient(circle, rgba(0, 128, 0, 0.2) 2px, transparent 2px);
                background-size: 20px 20px;
                pointer-events: none;
                z-index: 0;
            }

            #custom-industries-section-wrapper .cus-ind-dots-right {
                right: 15px;
                bottom: 30px;
                left: auto;
                top: auto;
            }

            /* ===== Main Container ===== */
            #custom-industries-section-wrapper .cus-ind-container {
                position: relative;
                z-index: 1;
                max-width: 1600px;
                margin: 0 auto;
                padding: 0 15px;
            }

            #custom-industries-section-wrapper .cus-ind-grid-row {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: 0;
            }

            #custom-industries-section-wrapper .cus-ind-col-half {
                flex: 0 0 100%;
                max-width: 100%;
                position: relative;
            }

            @media (min-width: 992px) {
                #custom-industries-section-wrapper .cus-ind-text-panel {
                    flex: 0 0 38%;
                    max-width: 38%;
                    padding-right: 30px;
                }

                #custom-industries-section-wrapper .cus-ind-slider-panel {
                    flex: 0 0 62%;
                    max-width: 62%;
                    padding-left: 20px;
                }
            }

            /* ===== LEFT SIDE - Text Panel ===== */
            #custom-industries-section-wrapper .cus-ind-text-panel {
                order: 1;
                z-index: 10;
                margin-bottom: 40px;
            }

            @media (min-width: 992px) {
                #custom-industries-section-wrapper .cus-ind-text-panel {
                    order: 1;
                    margin-bottom: 0;
                }
            }

            #custom-industries-section-wrapper .cus-ind-subtitle-tag {
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

            #custom-industries-section-wrapper .cus-ind-title {
                font-size: 30px;
                font-weight: 700;
                color: #1F2937;
                line-height: 1.3;
                margin-bottom: 12px;
                letter-spacing: -0.5px;
            }

            #custom-industries-section-wrapper .cus-ind-description {
                font-size: 1rem;
                color: #6B7280;
                line-height: 1.7;
                margin-bottom: 2.5rem;
                max-width: 90%;
            }

            #custom-industries-section-wrapper .cus-ind-primary-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 12px 30px;
                font-size: 0.95rem;
                font-weight: 600;
                color: #FFFFFF;
                background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
                border-radius: 50px;
                box-shadow: 0 10px 25px rgba(0, 128, 0, 0.25);
                transition: all 0.3s ease;
                text-decoration: none;
                cursor: pointer;
                border: none;
            }

            #custom-industries-section-wrapper .cus-ind-primary-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 30px rgba(229, 142, 36, 0.3);
                color: #ffffff;
            }

            #custom-industries-section-wrapper .cus-ind-btn-icon {
                margin-left: 8px;
                transition: transform 0.3s ease;
            }

            #custom-industries-section-wrapper .cus-ind-primary-btn:hover .cus-ind-btn-icon {
                transform: translateX(5px);
            }

            /* ===== Section Header Hover Effect ===== */
            #custom-industries-section-wrapper .cus-ind-section-header {
                cursor: default;
            }

            #custom-industries-section-wrapper .cus-ind-section-header:hover .ds-title-bar {
                width: 160px;
                box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            }

            /* ===== RIGHT SIDE - STATIC FRAME with SCROLLING CONTENT ===== */
            #custom-industries-section-wrapper .cus-ind-slider-panel {
                order: 2;
            }

            @media (min-width: 992px) {
                #custom-industries-section-wrapper .cus-ind-slider-panel {
                    order: 2;
                }
            }

            /* The Static Frame */
            #custom-industries-section-wrapper .cus-ind-frame {
                position: relative;
                background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
                border-radius: 24px;
                padding: 30px 20px;
                box-shadow:
                    0 20px 60px rgba(0, 128, 0, 0.08),
                    0 5px 15px rgba(0, 0, 0, 0.04);
                border: 1px solid rgba(0, 128, 0, 0.1);
                overflow: hidden;
            }

            /* Top decorative gradient bar on frame */
            #custom-industries-section-wrapper .cus-ind-frame::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 5px;
                background: linear-gradient(90deg, #008000, #E58E24, #008000);
                background-size: 200% 100%;
                animation: gradientShift 4s linear infinite;
            }

            @keyframes gradientShift {
                0% {
                    background-position: 0% 50%;
                }

                100% {
                    background-position: 200% 50%;
                }
            }

            /* Corner accents */
            #custom-industries-section-wrapper .cus-ind-frame::after {
                content: '';
                position: absolute;
                bottom: -50px;
                right: -50px;
                width: 150px;
                height: 150px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.1) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }

            /* Frame Header */
            #custom-industries-section-wrapper .cus-ind-frame-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 1px dashed rgba(0, 128, 0, 0.15);
                position: relative;
                z-index: 2;
            }

            #custom-industries-section-wrapper .cus-ind-frame-label {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 12px;
                font-weight: 700;
                color: #008000;
                text-transform: uppercase;
                letter-spacing: 1.5px;
            }

            #custom-industries-section-wrapper .cus-ind-pulse-dot {
                width: 10px;
                height: 10px;
                background: #008000;
                border-radius: 50%;
                position: relative;
                animation: pulse 1.5s infinite;
            }

            @keyframes pulse {
                0% {
                    box-shadow: 0 0 0 0 rgba(0, 128, 0, 0.7);
                }

                70% {
                    box-shadow: 0 0 0 10px rgba(0, 128, 0, 0);
                }

                100% {
                    box-shadow: 0 0 0 0 rgba(0, 128, 0, 0);
                }
            }

            #custom-industries-section-wrapper .cus-ind-frame-count {
                font-size: 11px;
                font-weight: 600;
                color: #6B7280;
                background: rgba(0, 128, 0, 0.08);
                padding: 4px 10px;
                border-radius: 20px;
            }

            /* Marquee Track - Two Rows */
            #custom-industries-section-wrapper .cus-ind-marquee-area {
                position: relative;
                overflow: hidden;
                padding: 10px 0;
                -webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
                mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
            }

            #custom-industries-section-wrapper .cus-ind-marquee-row {
                display: flex;
                gap: 16px;
                width: max-content;
                padding: 8px 0;
            }

            /* Row 1 - Left to Right */
            #custom-industries-section-wrapper .cus-ind-row-1 {
                animation: scrollLeft 30s linear infinite;
                margin-bottom: 16px;
            }

            /* Row 2 - Right to Left */
            #custom-industries-section-wrapper .cus-ind-row-2 {
                animation: scrollRight 35s linear infinite;
            }

            @keyframes scrollLeft {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }

            @keyframes scrollRight {
                0% {
                    transform: translateX(-50%);
                }

                100% {
                    transform: translateX(0);
                }
            }

            /* Pause on hover */
            #custom-industries-section-wrapper .cus-ind-marquee-area:hover .cus-ind-marquee-row {
                animation-play-state: paused;
            }

            /* ===== CARDS ===== */
            #custom-industries-section-wrapper .cus-ind-card-box {
                flex: 0 0 auto;
                width: 240px;
                background: #FFFFFF;
                border-radius: 14px;
                padding: 18px 16px;
                border: 1px solid rgba(0, 128, 0, 0.08);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                display: flex;
                align-items: flex-start;
                gap: 14px;
                position: relative;
                cursor: pointer;
            }

            #custom-industries-section-wrapper .cus-ind-card-box::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(90deg, #008000, #E58E24);
                border-radius: 14px 14px 0 0;
                opacity: 0;
                transition: opacity 0.4s ease;
            }

            #custom-industries-section-wrapper .cus-ind-card-box:hover {
                transform: translateY(-6px) scale(1.02);
                border-color: rgba(0, 128, 0, 0.25);
                box-shadow: 0 18px 40px rgba(0, 128, 0, 0.15);
                z-index: 5;
            }

            #custom-industries-section-wrapper .cus-ind-card-box:hover::before {
                opacity: 1;
            }

            #custom-industries-section-wrapper .cus-ind-icon-wrap {
                width: 42px;
                height: 42px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.1rem;
                color: #FFFFFF;
                background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
                box-shadow: 0 6px 15px rgba(0, 128, 0, 0.25);
                flex-shrink: 0;
                transition: transform 0.4s ease;
            }

            #custom-industries-section-wrapper .cus-ind-card-box:hover .cus-ind-icon-wrap {
                transform: scale(1.1) rotate(-8deg);
            }

            #custom-industries-section-wrapper .cus-ind-card-content {
                flex: 1;
                min-width: 0;
            }

            #custom-industries-section-wrapper .cus-ind-title-txt {
                font-size: 0.9rem;
                font-weight: 700;
                color: #1F2937;
                margin: 0 0 5px 0;
                line-height: 1.3;
                transition: color 0.3s ease;
            }

            #custom-industries-section-wrapper .cus-ind-card-box:hover .cus-ind-title-txt {
                color: #008000;
            }

            #custom-industries-section-wrapper .cus-ind-desc-txt {
                font-size: 0.78rem;
                color: #6B7280;
                line-height: 1.45;
                margin: 0;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* ===== Responsive ===== */
            @media (max-width: 768px) {
                #custom-industries-section-wrapper {
                    padding: 4rem 0;
                }

                #custom-industries-section-wrapper .cus-ind-title {
                    font-size: 22px;
                }

                #custom-industries-section-wrapper .cus-ind-frame {
                    padding: 20px 12px;
                    border-radius: 18px;
                }

                #custom-industries-section-wrapper .cus-ind-card-box {
                    width: 220px;
                    padding: 14px 12px;
                }

                #custom-industries-section-wrapper .cus-ind-icon-wrap {
                    width: 38px;
                    height: 38px;
                    font-size: 1rem;
                }

                #custom-industries-section-wrapper .cus-ind-section-header:hover .ds-title-bar {
                    width: 100px;
                }
            }
        </style>

        <!-- Decorative Background Elements -->
        <div class="cus-ind-bg-layer"></div>
        <div class="cus-ind-dots-decoration"></div>
        <div class="cus-ind-dots-right cus-ind-dots-decoration"></div>

        <!-- Main Container -->
        <div class="cus-ind-container">
            <div class="cus-ind-grid-row">

                <!-- Left Side: Content -->
                <div class="cus-ind-col-half cus-ind-text-panel">
                    <div class="cus-ind-section-header">
                        @if (isset($industry['tagline']))
                            <span class="cus-ind-subtitle-tag">{{ $industry['tagline'] }}</span>
                        @endif
                        <span class="ds-subtitle">Ready to Grow</span>
                        <h2 class="cus-ind-title">{{ $industry['title'] ?? '' }}</h2>
                        <div class="ds-title-bar"
                             style="margin-left: 0; margin-right: auto; margin-bottom: 24px;"></div>
                    </div>

                    <div class="cus-ind-description">
                        {!! $industry['description'] ?? '' !!}
                    </div>

                    <div class="cus-ind-btn-wrapper">
                        <a href="{{ $industry_btn['link'] ?? '#' }}"
                           class="cus-ind-primary-btn">
                            {{ $industry_btn['text'] ?? 'Explore More' }}
                            <i class="fas fa-arrow-right cus-ind-btn-icon"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Side: Static Frame with Scrolling Content -->
                <div class="cus-ind-col-half cus-ind-slider-panel">

                    <!-- Static Frame -->
                    <div class="cus-ind-frame">

                        <!-- Frame Header -->
                        <div class="cus-ind-frame-header">
                            <div class="cus-ind-frame-label">
                                <span class="cus-ind-pulse-dot"></span>
                                <span>Industries We Serve</span>
                            </div>

                        </div>

                        <!-- Marquee Scroll Area -->
                        <div class="cus-ind-marquee-area">

                            @php
                                $allItems = collect($industry['content'] ?? [])
                                    ->filter(
                                        fn($i) => !empty($i['icon']) &&
                                            !empty($i['title']) &&
                                            !empty($i['description']),
                                    )
                                    ->values();
                                $half = ceil($allItems->count() / 2);
                                $row1 = $allItems->slice(0, $half);
                                $row2 = $allItems->slice($half);

                                // If row2 is empty, split equally
                                if ($row2->isEmpty()) {
                                    $row2 = $row1;
                                }
                            @endphp

                            <!-- Row 1: Scrolls Left -->
                            <div class="cus-ind-marquee-row cus-ind-row-1">
                                <!-- Duplicate items for infinite loop -->
                                @for ($i = 0; $i < 2; $i++)
                                    @foreach ($row1 as $item)
                                        <div class="cus-ind-card-box">
                                            <div class="cus-ind-icon-wrap">
                                                <i class="{{ $item['icon'] }}"></i>
                                            </div>
                                            <div class="cus-ind-card-content">
                                                <h3 class="cus-ind-title-txt">{{ $item['title'] }}</h3>
                                                <p class="cus-ind-desc-txt">{{ $item['description'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endfor
                            </div>

                            <!-- Row 2: Scrolls Right -->
                            <div class="cus-ind-marquee-row cus-ind-row-2">
                                @for ($i = 0; $i < 2; $i++)
                                    @foreach ($row2 as $item)
                                        <div class="cus-ind-card-box">
                                            <div class="cus-ind-icon-wrap">
                                                <i class="{{ $item['icon'] }}"></i>
                                            </div>
                                            <div class="cus-ind-card-content">
                                                <h3 class="cus-ind-title-txt">{{ $item['title'] }}</h3>
                                                <p class="cus-ind-desc-txt">{{ $item['description'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endfor
                            </div>

                        </div>
                        <!-- End Marquee -->

                    </div>
                    <!-- End Static Frame -->

                </div>
            </div>
        </div>

    </div>
@endif
