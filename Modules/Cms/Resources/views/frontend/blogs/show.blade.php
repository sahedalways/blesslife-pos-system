@extends('cms::frontend.layouts.app')
@section('body-class', 'nav-overflow-hidden')
@section('title', $blog->title)
@section('meta')
    <meta name="description"
          content="{{ $blog->meta_description }}">
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
    <x-hero heroImage="{{ $blog->feature_image_url ?? asset('modules/cms/img/default.png') }}"
            heroSubtitle="{{ $blog->createdBy->user_full_name ?? '' }}"
            heroTitle="{{ $blog->title }}"
            description="{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}" />
    <div id="pro-article-section"
         class="pro-article-wrapper">

        <style>
            /* ===== MAIN WRAPPER ===== */
            #pro-article-section {
                position: relative;
                padding: 4rem 0 5rem;
                font-family: var(--text-font, 'Poppins', sans-serif);
            }

            /* Decorative Backgrounds */
            #pro-article-section .pas-bg-shape {
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            #pro-article-section .pas-shape-1 {
                width: 350px;
                height: 350px;
                top: 80px;
                left: -120px;
                background: radial-gradient(circle, rgba(0, 128, 0, 0.05) 0%, transparent 70%);
            }

            #pro-article-section .pas-shape-2 {
                width: 300px;
                height: 300px;
                bottom: 100px;
                right: -100px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.05) 0%, transparent 70%);
            }

            /* ===== CONTAINER ===== */
            #pro-article-section .pas-container {
                position: relative;
                z-index: 2;
                max-width: 1640px;
                margin: 0 auto;
                padding: 0 20px;
            }

            /* ===== ARTICLE CARD ===== */
            #pro-article-section .pas-article-card {
                background: #ffffff;
                border-radius: 24px;
                padding: 50px 55px;
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.06);
                border: 1px solid rgba(0, 128, 0, 0.08);
                position: relative;
                overflow: hidden;
            }

            /* Top accent line */
            #pro-article-section .pas-article-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 5px;
                background: linear-gradient(90deg, #008000, #E58E24, #008000);
                background-size: 200% 100%;
                animation: pasGradientShift 4s linear infinite;
            }

            @keyframes pasGradientShift {
                0% {
                    background-position: 0% 50%;
                }

                100% {
                    background-position: 200% 50%;
                }
            }

            /* ===== ARTICLE CONTENT TYPOGRAPHY ===== */
            #pro-article-section .pas-article-body {
                color: #374151;
                font-size: 1.05rem;
                line-height: 1.85;
                word-wrap: break-word;
            }

            /* Headings */
            #pro-article-section .pas-article-body h1,
            #pro-article-section .pas-article-body h2,
            #pro-article-section .pas-article-body h3,
            #pro-article-section .pas-article-body h4,
            #pro-article-section .pas-article-body h5,
            #pro-article-section .pas-article-body h6 {
                color: #1F2937;
                font-weight: 700;
                line-height: 1.3;
                margin-top: 2.2em;
                margin-bottom: 0.8em;
                letter-spacing: -0.5px;
                position: relative;
            }

            #pro-article-section .pas-article-body h1 {
                font-size: 2.2rem;
                font-weight: 800;
            }

            #pro-article-section .pas-article-body h2 {
                font-size: 1.85rem;
                padding-bottom: 12px;
                border-bottom: 2px solid rgba(0, 128, 0, 0.1);
            }

            #pro-article-section .pas-article-body h2::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 60px;
                height: 2px;
                background: linear-gradient(90deg, #008000, #E58E24);
            }

            #pro-article-section .pas-article-body h3 {
                font-size: 1.5rem;
                padding-left: 16px;
                border-left: 4px solid #008000;
            }

            #pro-article-section .pas-article-body h4 {
                font-size: 1.25rem;
                color: #008000;
            }

            #pro-article-section .pas-article-body h5 {
                font-size: 1.1rem;
            }

            #pro-article-section .pas-article-body h6 {
                font-size: 1rem;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                color: #E58E24;
            }

            /* First heading: no top margin */
            #pro-article-section .pas-article-body>*:first-child {
                margin-top: 0;
            }

            /* Paragraphs */
            #pro-article-section .pas-article-body p {
                margin-bottom: 1.5em;
                color: #4B5563;
                font-size: 1.05rem;
                line-height: 1.85;
            }

            /* First paragraph - lead style */
            #pro-article-section .pas-article-body>p:first-of-type {
                font-size: 1.2rem;
                font-weight: 500;
                color: #1F2937;
                line-height: 1.7;
                margin-bottom: 2em;
                padding-left: 18px;
                border-left: 3px solid #008000;
            }

            /* Links */
            #pro-article-section .pas-article-body a {
                color: #008000;
                font-weight: 600;
                text-decoration: none;
                border-bottom: 2px solid rgba(0, 128, 0, 0.25);
                transition: all 0.3s ease;
            }

            #pro-article-section .pas-article-body a:hover {
                color: #E58E24;
                border-bottom-color: #E58E24;
            }

            /* Strong, Bold */
            #pro-article-section .pas-article-body strong,
            #pro-article-section .pas-article-body b {
                color: #1F2937;
                font-weight: 700;
            }

            /* Italic */
            #pro-article-section .pas-article-body em,
            #pro-article-section .pas-article-body i {
                color: #4B5563;
                font-style: italic;
            }

            /* Images */
            #pro-article-section .pas-article-body img {
                max-width: 100%;
                height: auto;
                border-radius: 16px;
                margin: 2em auto;
                display: block;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
                transition: transform 0.4s ease;
            }

            #pro-article-section .pas-article-body img:hover {
                transform: scale(1.02);
            }

            /* Figures with captions */
            #pro-article-section .pas-article-body figure {
                margin: 2em 0;
                text-align: center;
            }

            #pro-article-section .pas-article-body figcaption {
                font-size: 0.88rem;
                color: #6B7280;
                font-style: italic;
                margin-top: 12px;
                padding: 0 20px;
            }

            /* Blockquotes */
            #pro-article-section .pas-article-body blockquote {
                position: relative;
                margin: 2em 0;
                padding: 28px 32px 28px 70px;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.05), rgba(229, 142, 36, 0.05));
                border-left: 5px solid #008000;
                border-radius: 12px;
                font-size: 1.1rem;
                font-style: italic;
                color: #1F2937;
                line-height: 1.7;
            }

            #pro-article-section .pas-article-body blockquote::before {
                content: '\201C';
                position: absolute;
                top: 0;
                left: 20px;
                font-size: 5rem;
                color: #008000;
                opacity: 0.4;
                font-family: Georgia, serif;
                line-height: 1;
            }

            #pro-article-section .pas-article-body blockquote p {
                margin-bottom: 0;
                color: inherit;
            }

            /* Lists */
            #pro-article-section .pas-article-body ul,
            #pro-article-section .pas-article-body ol {
                margin: 1.5em 0;
                padding-left: 28px;
            }

            #pro-article-section .pas-article-body li {
                margin-bottom: 0.6em;
                color: #4B5563;
                line-height: 1.75;
                padding-left: 8px;
            }

            #pro-article-section .pas-article-body ul li::marker {
                color: #008000;
            }

            #pro-article-section .pas-article-body ol li::marker {
                color: #E58E24;
                font-weight: 700;
            }

            #pro-article-section .pas-article-body li::marker {
                font-size: 1.1em;
            }

            /* Nested lists */
            #pro-article-section .pas-article-body ul ul,
            #pro-article-section .pas-article-body ol ol,
            #pro-article-section .pas-article-body ul ol,
            #pro-article-section .pas-article-body ol ul {
                margin: 0.5em 0;
            }

            /* Code Inline */
            #pro-article-section .pas-article-body code {
                background: rgba(0, 128, 0, 0.08);
                color: #008000;
                padding: 3px 8px;
                border-radius: 6px;
                font-size: 0.92em;
                font-family: 'Courier New', monospace;
                font-weight: 600;
                border: 1px solid rgba(0, 128, 0, 0.15);
            }

            /* Code Block */
            #pro-article-section .pas-article-body pre {
                background: #1F2937;
                color: #f3f4f6;
                padding: 24px 28px;
                border-radius: 14px;
                overflow-x: auto;
                margin: 1.8em 0;
                font-size: 0.92rem;
                line-height: 1.6;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
                position: relative;
            }

            #pro-article-section .pas-article-body pre::before {
                content: '● ● ●';
                position: absolute;
                top: 10px;
                left: 16px;
                color: #4B5563;
                font-size: 0.7rem;
                letter-spacing: 2px;
            }

            #pro-article-section .pas-article-body pre code {
                background: transparent;
                color: inherit;
                padding: 0;
                border: none;
                font-size: inherit;
                display: block;
                padding-top: 20px;
            }

            /* Tables */
            #pro-article-section .pas-article-body table {
                width: 100%;
                border-collapse: collapse;
                margin: 2em 0;
                background: #ffffff;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
            }

            #pro-article-section .pas-article-body thead {
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
            }

            #pro-article-section .pas-article-body th {
                padding: 14px 18px;
                text-align: left;
                font-weight: 700;
                font-size: 0.92rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            #pro-article-section .pas-article-body td {
                padding: 14px 18px;
                border-bottom: 1px solid #f3f4f6;
                color: #4B5563;
                font-size: 0.95rem;
            }

            #pro-article-section .pas-article-body tbody tr:hover {
                background: rgba(0, 128, 0, 0.03);
            }

            #pro-article-section .pas-article-body tbody tr:last-child td {
                border-bottom: none;
            }

            /* Horizontal Rule */
            #pro-article-section .pas-article-body hr {
                border: none;
                height: 2px;
                background: linear-gradient(90deg, transparent, rgba(0, 128, 0, 0.3), rgba(229, 142, 36, 0.3), transparent);
                margin: 3em 0;
            }

            /* Iframes / Videos */
            #pro-article-section .pas-article-body iframe,
            #pro-article-section .pas-article-body video {
                max-width: 100%;
                border-radius: 14px;
                margin: 2em 0;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
                display: block;
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 991px) {
                #pro-article-section {
                    padding: 3rem 0 4rem;
                }

                #pro-article-section .pas-article-card {
                    padding: 40px 35px;
                    border-radius: 20px;
                }

                #pro-article-section .pas-article-body h1 {
                    font-size: 1.85rem;
                }

                #pro-article-section .pas-article-body h2 {
                    font-size: 1.55rem;
                }

                #pro-article-section .pas-article-body h3 {
                    font-size: 1.3rem;
                }
            }

            @media (max-width: 575px) {
                #pro-article-section {
                    padding: 2rem 0 3rem;
                }

                #pro-article-section .pas-article-card {
                    padding: 28px 22px;
                    border-radius: 16px;
                }

                #pro-article-section .pas-article-body {
                    font-size: 1rem;
                }

                #pro-article-section .pas-article-body p {
                    font-size: 1rem;
                }

                #pro-article-section .pas-article-body>p:first-of-type {
                    font-size: 1.08rem;
                    padding-left: 14px;
                }

                #pro-article-section .pas-article-body h1 {
                    font-size: 1.6rem;
                }

                #pro-article-section .pas-article-body h2 {
                    font-size: 1.35rem;
                }

                #pro-article-section .pas-article-body h3 {
                    font-size: 1.18rem;
                }

                #pro-article-section .pas-article-body blockquote {
                    padding: 22px 22px 22px 55px;
                    font-size: 1rem;
                }

                #pro-article-section .pas-article-body blockquote::before {
                    font-size: 4rem;
                }

                #pro-article-section .pas-article-body pre {
                    padding: 20px 18px;
                    font-size: 0.85rem;
                }

                #pro-article-section .pas-article-body th,
                #pro-article-section .pas-article-body td {
                    padding: 10px 12px;
                    font-size: 0.85rem;
                }
            }
        </style>

        <!-- Decorative Backgrounds -->
        <div class="pas-bg-shape pas-shape-1"></div>
        <div class="pas-bg-shape pas-shape-2"></div>

        <div class="pas-container">

            <!-- Article Card -->
            <article class="pas-article-card">
                <div class="pas-article-body">
                    {!! $blog->content !!}
                </div>
            </article>

        </div>

    </div>

    @if ($suggestedBlogs->isNotEmpty())
        <section style="padding: 2rem 0 4rem;">
            <div style="max-width: 1640px; margin: 0 auto; padding: 0 20px;">
                <h2 class="suggested-heading"
                    style="font-size: 30px; font-weight: 700; color: #1F2937; margin-bottom: 0.5rem; text-align: center;">
                    Related Articles
                </h2>
                <div class="ds-title-bar" style="margin: 0 auto 2.5rem;"></div>
                <style>
                    .suggested-heading {
                        font-size: 30px;
                    }
                    .suggested-heading:hover ~ .ds-title-bar,
                    .ds-title-bar:hover {
                        width: 160px !important;
                    }
                    @media (max-width: 768px) {
                        .suggested-heading {
                            font-size: 23px;
                        }
                    }
                </style>
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1.5rem;">
                    @foreach ($suggestedBlogs as $suggested)
                        <a href="{{ action([\Modules\Cms\Http\Controllers\CmsController::class, 'viewBlog'], ['id' => $suggested->id, 'slug' => $suggested->slug]) }}"
                           class="suggested-card-link"
                           style="text-decoration: none; color: inherit; display: block; flex: 0 0 300px; max-width: 400px;">
                            <div class="suggested-card"
                                 style="background: #fff; border-radius: 16px; overflow: hidden; transition: all 0.4s ease; border: 1px solid rgba(0,128,0,0.08); position: relative;">
                                <div style="position: relative; overflow: hidden;">
                                    <img src="{{ $suggested->feature_image_url ?? asset('modules/cms/img/default.png') }}"
                                         class="suggested-card-img"
                                         style="width: 100%; height: 200px; object-fit: cover; display: block; transition: transform 0.5s ease;">
                                    <div
                                         style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 50%, rgba(0,128,0,0.1) 100%);">
                                    </div>
                                </div>
                                <div style="padding: 1.5rem 1.25rem 1.25rem;">
                                    <h3
                                        style="font-size: 1.1rem; font-weight: 600; color: #1F2937; margin: 0 0 0.5rem; line-height: 1.4;">
                                        {{ $suggested->title }}
                                    </h3>
                                    <div class="suggested-read-more"
                                         style="display: flex; align-items: center; gap: 0.5rem; transform: translateY(20px); opacity: 0; transition: all 0.4s ease;">
                                        <span style="font-size: 0.85rem; color: #008000; font-weight: 500;">
                                            Read More
                                        </span>
                                        <span style="font-size: 0.85rem; color: #008000; display: inline-block;">→</span>
                                        <span style="margin-left: auto; font-size: 0.8rem; color: #9CA3AF;">
                                            {{ \Carbon\Carbon::parse($suggested->created_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <style>
                            .suggested-card-link .suggested-card {
                                box-shadow: 0 8px 30px rgba(229,142,36,0.2);
                            }
                            .suggested-card-link:hover .suggested-card {
                                transform: translateY(-6px);
                                box-shadow: 0 16px 45px rgba(0,128,0,0.3);
                                border-color: rgba(0,128,0,0.2);
                            }
                            .suggested-card-link:hover .suggested-card-img {
                                transform: scale(1.08);
                            }
                            .suggested-card-link:hover .suggested-read-more {
                                transform: translateY(0) !important;
                                opacity: 1 !important;
                            }
                        </style>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
