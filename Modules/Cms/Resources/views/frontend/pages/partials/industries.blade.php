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
            }

            /* Background Gradient & Dots */
            #custom-industries-section-wrapper .cus-ind-bg-layer {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.08) 0%, rgba(229, 142, 36, 0.07) 100%);
                z-index: 0;
                pointer-events: none;
            }

            #custom-industries-section-wrapper .cus-ind-dots-decoration {
                position: absolute;
                top: 30px;
                left: 15px;
                width: 200px;
                height: 200px;
                background-image: radial-gradient(circle, rgba(0, 128, 0, 0.25) 2px, transparent 2px);
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

            /* Main Container Layout */
            #custom-industries-section-wrapper .cus-ind-container {
                position: relative;
                z-index: 1;
                max-width: 1600px;
                margin: 0 auto;
                padding: 0 15px;
            }

            /* Grid System Override for this Block Only */
            #custom-industries-section-wrapper .cus-ind-grid-row {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: 0;
                /* Important: Removes gap to control precise alignment */
            }

            #custom-industries-section-wrapper .cus-ind-col-half {
                flex: 0 0 100%;
                max-width: 100%;
                position: relative;
                /* Reset for Z-Index */
            }

            @media (min-width: 992px) {
                #custom-industries-section-wrapper .cus-ind-col-half {
                    flex: 0 0 50%;
                    max-width: 50%;
                    padding-left: 20px;
                }

                #custom-industries-section-wrapper .cus-ind-text-panel {
                    flex: 0 0 38%;
                    max-width: 38%;
                }

                #custom-industries-section-wrapper .cus-ind-slider-panel {
                    flex: 0 0 62%;
                    max-width: 62%;
                }
            }

            /* --- LEFT SIDE (Text) Fix --- */
            #custom-industries-section-wrapper .cus-ind-text-panel {
                order: 2;
                z-index: 10;
                /* Highest priority to keep text visible */
            }

            @media (min-width: 992px) {
                #custom-industries-section-wrapper .cus-ind-text-panel {
                    order: 1;
                    /* Text moves back to left on desktop */
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
                text-shadow: 0 1px 0 #fff;
            }

            #custom-industries-section-wrapper .cus-ind-text-panel:hover .ds-title-bar {
                width: 160px;
                box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            }

            #custom-industries-section-wrapper .cus-ind-description {
                font-size: 1rem;
                color: #6B7280;
                line-height: 1.7;
                margin-bottom: 2.5rem;
                max-width: 90%;
            }

            #custom-industries-section-wrapper .cus-ind-btn-wrapper {
                display: inline-flex;
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

            /* --- RIGHT SIDE (Slider) Fix --- */
            #custom-industries-section-wrapper .cus-ind-slider-panel {
                order: 1;
                position: relative;
                z-index: 1;
                overflow: hidden;
                width: 100%;
            }

            @media (min-width: 992px) {
                #custom-industries-section-wrapper .cus-ind-slider-panel {
                    order: 2;
                }
            }

            #custom-industries-section-wrapper .cus-ind-nav-controls {
                display: flex;
                justify-content: flex-end;
                gap: 12px;
                margin-top: 24px;
                margin-bottom: 0;
            }

            #custom-industries-section-wrapper .cus-ind-nav-btn {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #FFFFFF;
                border: 1px solid #E5E7EB;
                color: #1F2937;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                padding: 0;
                outline: none;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            }

            #custom-industries-section-wrapper .cus-ind-nav-btn svg {
                width: 20px;
                height: 20px;
                stroke: currentColor;
            }

            #custom-industries-section-wrapper .cus-ind-nav-btn:hover {
                border-color: #008000;
                color: #008000;
                background: #f0fdf4;
            }

            /* Slider Cards */
            #custom-industries-section-wrapper .cus-ind-slide-item {
                height: auto !important;
            }

            #custom-industries-section-wrapper .cus-ind-card-box {
                background: #FFFFFF;
                border-radius: 14px;
                padding: 22px 20px;
                border: 1px solid rgba(0, 128, 0, 0.08);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                height: 100%;
                display: flex;
                flex-direction: column;
                min-height: auto;
                position: relative;
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
                transform: translateY(-8px);
                border-color: rgba(0, 128, 0, 0.2);
                box-shadow: 0 20px 50px rgba(0, 128, 0, 0.12);
            }

            #custom-industries-section-wrapper .cus-ind-card-box:hover::before {
                opacity: 1;
            }

            #custom-industries-section-wrapper .cus-ind-icon-wrap {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.15rem;
                color: #FFFFFF;
                background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
                margin-bottom: 14px;
                box-shadow: 0 6px 15px rgba(0, 128, 0, 0.2);
                flex-shrink: 0;
                transition: transform 0.4s ease, box-shadow 0.4s ease;
            }

            #custom-industries-section-wrapper .cus-ind-card-box:hover .cus-ind-icon-wrap {
                transform: scale(1.1) rotate(-5deg);
                box-shadow: 0 10px 25px rgba(0, 128, 0, 0.35);
            }

            #custom-industries-section-wrapper .cus-ind-card-box:hover .cus-ind-title-txt {
                color: #008000;
            }

            #custom-industries-section-wrapper .cus-ind-title-txt {
                font-size: 0.95rem;
                font-weight: 700;
                color: #1F2937;
                margin: 0 0 8px 0;
                line-height: 1.3;
            }

            #custom-industries-section-wrapper .cus-ind-desc-txt {
                font-size: 0.82rem;
                color: #6B7280;
                line-height: 1.5;
                margin: 0;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Slider Track Adjustments */
            #custom-industries-section-wrapper .splide {
                width: 100%;
            }

            #custom-industries-section-wrapper .splide__track {
                overflow: hidden;
            }

            #custom-industries-section-wrapper .splide__slide {
                height: auto;
                padding: 8px 4px;
            }

            /* Responsive Tweaks */
            @media (max-width: 768px) {
                #custom-industries-section-wrapper {
                    padding: 4rem 0;
                }

                #custom-industries-section-wrapper .cus-ind-title {
                    font-size: 22px;
                }

                #custom-industries-section-wrapper .cus-ind-nav-controls {
                    justify-content: center;
                }

                #custom-industries-section-wrapper .cus-ind-card-box {
                    padding: 16px 14px;
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
                    @if (isset($industry['tagline']))
                        <span class="cus-ind-subtitle-tag">{{ $industry['tagline'] }}</span>
                    @endif

                    <h2 class="cus-ind-title">{{ $industry['title'] ?? '' }}</h2>
                    <div class="ds-title-bar"
                         style="margin-left: 0; margin-right: auto; margin-bottom: 24px;"></div>

                    <div class="cus-ind-description">
                        {!! $industry['description'] ?? '' !!}
                    </div>

                    <div class="cus-ind-btn-wrapper">
                        <a href="{{ $industry_btn['link'] }}"
                           class="cus-ind-primary-btn">
                            {{ $industry_btn['text'] }}
                            <i class="fas fa-arrow-right cus-ind-btn-icon"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Side: Slider -->
                <div class="cus-ind-col-half cus-ind-slider-panel">

                    <!-- Splide Slider Area -->
                    <div class="splide"
                         id="cus-ind-splide-track">
                        <div class="splide__track"
                             aria-label="Industry Slider">
                            <ul class="splide__list">
                                @foreach ($industry['content'] as $item)
                                    @if (!empty($item['icon']) && !empty($item['title']) && !empty($item['description']))
                                        <li class="splide__slide cus-ind-slide-item">
                                            <div class="cus-ind-card-box">
                                                <div class="cus-ind-icon-wrap">
                                                    <i class="{{ $item['icon'] }}"></i>
                                                </div>
                                                <h3 class="cus-ind-title-txt">
                                                    {{ $item['title'] ?? '' }}
                                                </h3>
                                                <p class="cus-ind-desc-txt">
                                                    {{ $item['description'] ?? '' }}
                                                </p>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <div class="cus-ind-nav-controls">
                        <button type="button"
                                class="cus-ind-nav-btn cus-ind-prev-btn">
                            <svg fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button type="button"
                                class="cus-ind-nav-btn cus-ind-next-btn">
                            <svg fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endif

<script>
    // Scoped Initialization Script
    document.addEventListener('DOMContentLoaded', function() {
        const splideId = '#cus-ind-splide-track';
        const prevBtn = document.querySelector('.cus-ind-prev-btn');
        const nextBtn = document.querySelector('.cus-ind-next-btn');

        if (typeof Splide !== 'undefined') {
            const instance = new Splide(splideId, {
                type: 'loop',
                perPage: 3,
                gap: '12px',
                autoplay: true,
                interval: 5000,
                speed: 800,
                arrows: false,
                pagination: false,
                breakpoints: {
                    768: {
                        perPage: 1
                    }
                }
            }).mount();

            if (prevBtn) {
                prevBtn.addEventListener('click', () => instance.go('<'));
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => instance.go('>'));
            }
        }
    });
</script>
