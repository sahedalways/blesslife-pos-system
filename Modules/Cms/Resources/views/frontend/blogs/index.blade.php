@extends('cms::frontend.layouts.app')
@section('body-class', 'nav-overflow-hidden')
@section('title', __('cms::lang.blog'))
@section('css')
    <style type="text/css">
        .blog-img {
            height: 232px !important;
            object-fit: cover !important;
            max-width: 100% !important;
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
    <x-hero heroImage="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1600&q=80"
            heroSubtitle="Our Blog"
            heroTitle="Latest Blogs"
            description="Stay updated with the latest news, tips, and insights from our team." />
    <div id="pro-blog-section"
         class="pro-blog-wrapper">

        <style>
            /* ===== MAIN WRAPPER ===== */
            #pro-blog-section {
                position: relative;
                padding: 5rem 0;
                font-family: var(--text-font, 'Poppins', sans-serif);
            }

            /* Decorative Background */
            #pro-blog-section .pbs-bg-shape {
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            #pro-blog-section .pbs-shape-1 {
                width: 300px;
                height: 300px;
                top: 60px;
                left: -100px;
                background: radial-gradient(circle, rgba(0, 128, 0, 0.06) 0%, transparent 70%);
            }

            #pro-blog-section .pbs-shape-2 {
                width: 280px;
                height: 280px;
                bottom: 80px;
                right: -80px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.06) 0%, transparent 70%);
            }

            /* ===== CONTAINER ===== */
            #pro-blog-section .pbs-container {
                position: relative;
                z-index: 2;
                max-width: 1320px;
                margin: 0 auto;
                padding: 0 20px;
            }

            /* ===== GRID ===== */
            #pro-blog-section .pbs-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 28px;
            }

            @media (max-width: 991px) {
                #pro-blog-section .pbs-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 22px;
                }
            }

            @media (max-width: 575px) {
                #pro-blog-section .pbs-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }
            }

            /* ===== BLOG CARD ===== */
            #pro-blog-section .pbs-card {
                position: relative;
                background: #ffffff;
                border-radius: 20px;
                overflow: hidden;
                border: 1px solid rgba(0, 128, 0, 0.08);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
                transition: all 0.45s cubic-bezier(0.25, 0.8, 0.25, 1);
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            #pro-blog-section .pbs-card:hover {
                transform: translateY(-10px);
                border-color: rgba(0, 128, 0, 0.25);
                box-shadow: 0 25px 50px rgba(0, 128, 0, 0.15);
            }

            /* ===== IMAGE WRAPPER ===== */
            #pro-blog-section .pbs-img-wrap {
                position: relative;
                width: 100%;
                height: 220px;
                overflow: hidden;
                background: #f3f4f6;
            }

            #pro-blog-section .pbs-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.7s cubic-bezier(0.25, 0.8, 0.25, 1);
            }

            #pro-blog-section .pbs-card:hover .pbs-img {
                transform: scale(1.1);
            }

            /* Image Overlay */
            #pro-blog-section .pbs-img-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(180deg, transparent 0%, transparent 50%, rgba(0, 0, 0, 0.6) 100%);
                opacity: 0;
                transition: opacity 0.4s ease;
            }

            #pro-blog-section .pbs-card:hover .pbs-img-overlay {
                opacity: 1;
            }

            /* Date Badge on Image */
            #pro-blog-section .pbs-date-badge {
                position: absolute;
                top: 16px;
                left: 16px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 12px;
                padding: 8px 14px;
                display: flex;
                align-items: center;
                gap: 6px;
                font-size: 0.78rem;
                font-weight: 600;
                color: #1F2937;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                z-index: 3;
            }

            #pro-blog-section .pbs-date-badge i {
                color: #008000;
                font-size: 0.85rem;
            }

            /* Category Tag */
            #pro-blog-section .pbs-cat-tag {
                position: absolute;
                top: 16px;
                right: 16px;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
                padding: 6px 14px;
                border-radius: 50px;
                font-size: 0.7rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1px;
                box-shadow: 0 4px 15px rgba(0, 128, 0, 0.3);
                z-index: 3;
            }

            /* ===== CARD BODY ===== */
            #pro-blog-section .pbs-body {
                padding: 24px 22px;
                display: flex;
                flex-direction: column;
                flex: 1;
            }

            /* Title */
            #pro-blog-section .pbs-title-link {
                text-decoration: none;
                display: block;
                margin-bottom: 12px;
            }

            #pro-blog-section .pbs-title {
                font-size: 1.15rem;
                font-weight: 700;
                color: #1F2937;
                line-height: 1.4;
                margin: 0;
                transition: color 0.3s ease;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 3.2em;
            }

            #pro-blog-section .pbs-card:hover .pbs-title {
                color: #008000;
            }

            /* Description */
            #pro-blog-section .pbs-desc {
                font-size: 0.88rem;
                color: #6B7280;
                line-height: 1.65;
                margin: 0 0 20px 0;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                flex: 1;
            }

            /* Footer */
            #pro-blog-section .pbs-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: 16px;
                border-top: 1px dashed rgba(0, 128, 0, 0.15);
            }

            /* Read More Button */
            #pro-blog-section .pbs-read-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 10px 20px;
                background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
                color: #ffffff;
                border-radius: 50px;
                font-size: 0.82rem;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s ease;
                box-shadow: 0 6px 18px rgba(0, 128, 0, 0.25);
                border: none;
            }

            #pro-blog-section .pbs-read-btn i {
                transition: transform 0.3s ease;
                font-size: 0.75rem;
            }

            #pro-blog-section .pbs-read-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(229, 142, 36, 0.35);
                color: #ffffff;
            }

            #pro-blog-section .pbs-read-btn:hover i {
                transform: translateX(4px);
            }

            /* Time Ago */
            #pro-blog-section .pbs-time {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                font-size: 0.75rem;
                color: #9CA3AF;
                font-weight: 500;
            }

            #pro-blog-section .pbs-time i {
                color: #E58E24;
                font-size: 0.78rem;
            }

            /* ===== EMPTY STATE ===== */
            #pro-blog-section .pbs-empty-state {
                grid-column: 1 / -1;
                text-align: center;
                padding: 80px 30px;
                background: #ffffff;
                border-radius: 20px;
                border: 2px dashed rgba(0, 128, 0, 0.2);
            }

            #pro-blog-section .pbs-empty-icon {
                width: 90px;
                height: 90px;
                border-radius: 50%;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.1), rgba(229, 142, 36, 0.1));
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 2.5rem;
                color: #008000;
                margin-bottom: 20px;
            }

            #pro-blog-section .pbs-empty-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: #1F2937;
                margin-bottom: 10px;
            }

            #pro-blog-section .pbs-empty-text {
                font-size: 0.95rem;
                color: #6B7280;
                margin: 0;
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 767px) {
                #pro-blog-section {
                    padding: 3.5rem 0;
                }

                #pro-blog-section .pbs-img-wrap {
                    height: 200px;
                }

                #pro-blog-section .pbs-body {
                    padding: 20px 18px;
                }

                #pro-blog-section .pbs-title {
                    font-size: 1.05rem;
                }

                #pro-blog-section .pbs-footer {
                    flex-wrap: wrap;
                    gap: 10px;
                }

                #pro-blog-section .pbs-read-btn {
                    padding: 8px 16px;
                    font-size: 0.78rem;
                }
            }
        </style>

        <!-- Decorative Backgrounds -->
        <div class="pbs-bg-shape pbs-shape-1"></div>
        <div class="pbs-bg-shape pbs-shape-2"></div>

        <div class="pbs-container">
            <div class="pbs-grid">

                @forelse($blogs as $key => $blog)
                    <article class="pbs-card">

                        <!-- Image Section -->
                        <div class="pbs-img-wrap">
                            <img src="{{ $blog->feature_image_url ?? asset('modules/cms/img/default.png') }}"
                                 alt="{{ $blog->title }}"
                                 class="pbs-img"
                                 loading="lazy">

                            <div class="pbs-img-overlay"></div>

                            <!-- Date Badge -->
                            <div class="pbs-date-badge">
                                <i class="fas fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                            </div>


                        </div>

                        <!-- Body -->
                        <div class="pbs-body">

                            <a href="{{ action([\Modules\Cms\Http\Controllers\CmsController::class, 'viewBlog'], ['id' => $blog->id, 'slug' => $blog->slug]) }}"
                               class="pbs-title-link">
                                <h3 class="pbs-title">{{ $blog->title }}</h3>
                            </a>

                            @if (!empty($blog->meta_description))
                                <p class="pbs-desc"
                                   title="{{ $blog->meta_description }}">
                                    {{ substr($blog->meta_description, 0, 160) }}{{ strlen($blog->meta_description) > 160 ? '...' : '' }}
                                </p>
                            @endif

                            <!-- Footer -->
                            <div class="pbs-footer">
                                <a href="{{ action([\Modules\Cms\Http\Controllers\CmsController::class, 'viewBlog'], ['id' => $blog->id, 'slug' => $blog->slug]) }}"
                                   class="pbs-read-btn">
                                    Read More
                                    <i class="fas fa-arrow-right"></i>
                                </a>

                                <span class="pbs-time"
                                      title="Last updated">
                                    <i class="far fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                                </span>
                            </div>

                        </div>

                    </article>
                @empty
                    <div class="pbs-empty-state">
                        <div class="pbs-empty-icon">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <h2 class="pbs-empty-title">No Blogs Available</h2>
                        <p class="pbs-empty-text">Check back later for exciting articles and updates!</p>
                    </div>
                @endforelse

            </div>
        </div>

    </div>
@endsection
