<div class="fixed-nav-container">
    <nav class="hero-nav position-relative container mx-auto px-0">
        <ul class="nav w-100 list-unstyled align-items-center p-0">
            <li class="hero-nav__item">
                <a href="{{ url('/') }}">
                    <img class="hero-nav__logo"
                         src="{{ $__logo_url }}"
                         change-src-onscroll="{{ $__logo_url }}"
                         alt="logo"
                         loading="lazy">
                </a>
                <!-- Don't remove this empty span -->
                <span class="mx-2"></span>
            </li>
            <li id="hero-menu"
                class="flex-grow-1 hero__nav-list hero__nav-list--mobile-menu ft-menu">
                <ul
                    class="hero__menu-content nav flex-column flex-lg-row ft-menu__slider animated list-unstyled p-2 p-lg-0">
                    <li class="flex-grow-1">
                        <ul
                            class="nav nav--lg-side flex-column-reverse flex-lg-row-reverse list-unstyled align-items-center p-0">
                            <li class="flex-grow-1">
                                <ul
                                    class="nav nav--lg-side flex-column-reverse flex-lg-row-reverse list-unstyled align-items-center p-0">
                                    <li class="hero-nav__item">
                                        <a href="{{ $navbar_btn['link'] }}"
                                           target="_blank"
                                           class="btn btn-primary">
                                            {{ $navbar_btn['text'] }}
                                        </a>
                                    </li>
                                    @if (Route::has('login'))
                                        @if (!Auth::check())
                                            <li class="hero-nav__item">
                                                <a href="{{ route('login') }}"
                                                   class="hero-nav__link">
                                                    <strong>
                                                        @lang('lang_v1.login')
                                                    </strong>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (Auth::check())
                                        <li class="hero-nav__item">
                                            <a href="{{ route('home') }}"
                                               class="hero-nav__link">
                                                <strong>
                                                    @lang('cms::lang.dashboard')
                                                </strong>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>

                            {{-- If already loggedin show dashboard link --}}

                            <li class="hero-nav__item">
                                <a href="{{ route('cms.contact.us') }}"
                                   class="hero-nav__link">Contact us</a>
                            </li>
                            @if (Route::has('pricing') && config('app.env') != 'demo')
                                <li class="hero-nav__item">
                                    <a href="{{ action([\Modules\Superadmin\Http\Controllers\PricingController::class, 'index']) }}"
                                       class="hero-nav__link">
                                        @lang('superadmin::lang.pricing')
                                    </a>
                                </li>
                            @endif
                            @if ($__blog_count >= 1)
                                <li class="hero-nav__item">
                                    <a href="{{ action([\Modules\Cms\Http\Controllers\CmsController::class, 'getBlogList']) }}"
                                       class="hero-nav__link">
                                        {{ __('cms::lang.blogs') }}
                                    </a>
                                </li>
                            @endif

                            @if (count($__pages) > 0)
                                <li class="hero-nav__item hero-nav__item--with-dropdown">
                                    <span class="hero-nav__link"
                                          tabindex="1"
                                          role="button">
                                        <span class="flex-grow-1 me-2">
                                            {{ $navbar_btn['drop_down_text'] }}
                                        </span>
                                        <svg class="hero-nav__item-chevron bi bi-chevron-down"
                                             width=".8em"
                                             height=".8em"
                                             viewBox="0 0 16 16"
                                             fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div class="hero-nav__dropdown dropdown dropdown--of-1-columns">
                                        <div class="row flex-wrap">
                                            <div class="col-lg-12">
                                                @foreach ($__pages as $page)
                                                    <a href="{{ action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'showPage'], ['page' => $page->slug]) }}"
                                                       class="dropdown__link">
                                                        <!-- Don't remove this empty "span" -->
                                                        <span class="mx-2"></span>
                                                        <!-- ------------------------------ -->
                                                        <div class="dropdown__item">
                                                            <span class="dropdown__item-title">
                                                                {{ $page->title }}
                                                            </span>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if (count($__seperate_menu_pages) > 0)
                                @foreach ($__seperate_menu_pages as $s_page)
                                    <li class="hero-nav__item">
                                        <a
                                           href="{{ action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'showPage'], ['page' => $s_page->slug]) }}"class="hero-nav__link">
                                            {{ $s_page->title }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif

                            <li class="hero-nav__item">
                                <a href="{{ url('/') }}"
                                   class="hero-nav__link">
                                    Home
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <button close-nav-menu=""
                        class="ft-menu__close-btn animated">
                    <svg class="bi bi-x"
                         width="1em"
                         height="1em"
                         viewBox="0 0 16 16"
                         fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z"
                              clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                              d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
            <li class="hero-nav__item d-lg-none d-flex flex-row-reverse">
                <button open-nav-menu=""
                        class="text-center px-2 text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>

<style>
    .hero.container-fluid {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 10;
        background: transparent;
    }

    .hero-nav__link,
    .hero-nav__item-chevron,
    .hero-nav__item>span,
    .hero-nav__item a {
        color: #fff !important;
    }

    .hero-nav__link,
    .hero-nav__item a:not(.btn) {
        position: relative !important;
        transition: color 0.3s ease, text-shadow 0.3s ease !important;
    }

    .hero-nav__link::after {
        content: '' !important;
        position: absolute !important;
        bottom: -2px !important;
        left: 50% !important;
        width: 0 !important;
        height: 2px !important;
        background: var(--secondary-orange) !important;
        transition: all 0.3s ease !important;
        transform: translateX(-50%) !important;
        border-radius: 1px !important;
    }

    .hero-nav__link:hover::after {
        width: 100% !important;
    }

    .hero-nav__link:hover,
    .hero-nav__item a:not(.btn):hover {
        color: #fff !important;
        opacity: 1 !important;
        text-shadow: 0 0 12px rgba(255, 255, 255, 0.4) !important;
    }

    .hero-nav__item .btn-primary {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-orange)) !important;
        border: none !important;
        border-radius: 50px !important;
        box-shadow: 0 4px 15px rgba(0, 128, 0, 0.3) !important;
        padding: 0.5rem 1.5rem !important;
        font-weight: 700 !important;
        transition: all 0.3s ease !important;
    }

    .hero-nav__item .btn-primary:hover {
        transform: translateY(-1px) !important;
        box-shadow: 0 8px 25px rgba(229, 142, 36, 0.45) !important;
    }

    .hero-nav__item a[href*="login"] strong {
        font-size: 0.9rem !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        padding: 5px 18px !important;
        border-radius: 50px !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }

    .hero-nav__item a[href*="login"]:hover strong {
        border-color: rgba(255, 255, 255, 0.7) !important;
        background: rgba(255, 255, 255, 0.08) !important;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.15) !important;
    }

    .hero-nav--is-sticky {
        position: fixed !important;
        top: 0 !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        margin: 0 !important;
        padding: 0 !important;
        background: rgba(240, 248, 240, 0.7) !important;
        backdrop-filter: blur(12px) !important;
        -webkit-backdrop-filter: blur(12px) !important;
        border-bottom: 1px solid rgba(0, 128, 0, 0.15) !important;
        border-radius: 0 0 16px 16px;
        box-shadow: 0 4px 30px rgba(0, 128, 0, 0.12);
        height: auto !important;
        animation: none !important;
    }

    .hero-nav--is-sticky .hero-nav__link,
    .hero-nav--is-sticky .hero-nav__item a:not(.btn),
    .hero-nav--is-sticky .hero-nav__item-chevron,
    .hero-nav--is-sticky .hero-nav__item>span {
        color: #1e293b !important;
    }

    .hero-nav--is-sticky .hero-nav__link:hover,
    .hero-nav--is-sticky .hero-nav__item a:not(.btn):hover {
        color: var(--primary-green) !important;
    }

    .hero-nav--is-sticky .hero-nav__item a[href*="login"] strong {
        border-color: rgba(0, 0, 0, 0.2) !important;
    }

    .hero-nav--is-sticky .fa-bars {
        color: #1e293b !important;
    }

    .ft-menu--js-show.ft-menu .hero-nav__link,
    .ft-menu--js-show.ft-menu .hero-nav__item a:not(.btn) {
        color: #000000 !important;
    }

    @media (max-width: 991.98px) {
        .hero-nav--is-sticky {
            width: calc(100vw - 30px) !important;
            max-width: 100% !important;
            right: auto !important;
        }

        .hero-nav__link {
            color: #000 !important;
        }

        .ft-menu::before {
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.6), rgba(229, 142, 36, 0.4)) !important;
            backdrop-filter: blur(4px) !important;
            -webkit-backdrop-filter: blur(4px) !important;
        }

        .ft-menu__slider {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 40%, #f0fdf4 100%) !important;
            width: 85% !important;
            max-width: 340px !important;
            border-radius: 0 20px 20px 0 !important;
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.15) !important;
            padding-top: 80px !important;
            overflow-y: auto !important;
        }

        .ft-menu--js-show .ft-menu__close-btn {
            top: 16px !important;
            right: 16px !important;
            width: 40px !important;
            height: 40px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-orange)) !important;
            border-radius: 50% !important;
            color: #fff !important;
            font-size: 1.4rem !important;
            margin: 0 !important;
            z-index: 2001 !important;
            border: 2px solid rgba(255, 255, 255, 0.4) !important;
            transform: none !important;
            position: fixed !important;
            box-shadow: 0 4px 15px rgba(0, 128, 0, 0.3) !important;
            animation: none !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .ft-menu__close-btn svg {
            width: 20px !important;
            height: 20px !important;
        }

        .ft-menu ul,
        .ft-menu ul ul {
            padding: 0 !important;
            margin: 0 !important;
            list-style: none !important;
        }

        .ft-menu .flex-grow-1 {
            width: 100% !important;
        }

        .ft-menu .hero-nav__item {
            margin: 0 12px !important;
            border-radius: 0 !important;
            position: relative !important;
        }

        .ft-menu .hero-nav__item::after {
            content: '' !important;
            position: absolute !important;
            bottom: 0 !important;
            left: 20px !important;
            right: 20px !important;
            height: 1px !important;
            background: linear-gradient(90deg, transparent, rgba(0, 128, 0, 0.1), rgba(229, 142, 36, 0.08), transparent) !important;
        }

        .ft-menu .hero-nav__item:last-child::after {
            display: none !important;
        }

        .ft-menu .hero-nav__item .hero-nav__link,
        .ft-menu .hero-nav__item a:not(.btn) {
            padding: 16px 20px 16px 24px !important;
            font-size: 0.95rem !important;
            font-weight: 500 !important;
            color: var(--neutral-dark) !important;
            transition: all 0.3s ease !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            position: relative !important;
        }

        .ft-menu .hero-nav__item .hero-nav__link::before,
        .ft-menu .hero-nav__item a:not(.btn)::before {
            content: '' !important;
            width: 6px !important;
            height: 6px !important;
            border-radius: 50% !important;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-orange)) !important;
            flex-shrink: 0 !important;
            transition: all 0.3s ease !important;
            opacity: 0.5 !important;
        }

        .ft-menu .hero-nav__item:not(.hero-nav__item--with-dropdown) .hero-nav__link:hover,
        .ft-menu .hero-nav__item a:not(.btn):hover {
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.06), rgba(229, 142, 36, 0.04)) !important;
            color: var(--primary-green) !important;
        }

        .ft-menu .hero-nav__item:not(.hero-nav__item--with-dropdown) .hero-nav__link:hover::before,
        .ft-menu .hero-nav__item a:not(.btn):hover::before {
            opacity: 1 !important;
            transform: scale(1.3) !important;
            box-shadow: 0 0 10px rgba(0, 128, 0, 0.3) !important;
        }

        .ft-menu .hero-nav__item .hero-nav__link::after,
        .ft-menu .hero-nav__item a::after {
            display: none !important;
        }

        .ft-menu .hero-nav__item--with-dropdown>.hero-nav__link {
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.04), rgba(229, 142, 36, 0.03)) !important;
            border-radius: 10px !important;
            margin: 4px 0 !important;
            font-weight: 600 !important;
        }

        .ft-menu .hero-nav__item--with-dropdown .hero-nav__item-chevron {
            margin-left: auto !important;
            color: var(--primary-green) !important;
            opacity: 0.6 !important;
        }

        .ft-menu .hero-nav__item--with-dropdown.hero-nav__item--show-dropdown>.hero-nav__link {
            border-radius: 10px 10px 0 0 !important;
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.05)) !important;
        }

        .ft-menu .btn-primary {
            width: auto !important;
            min-width: 160px !important;
            text-align: center !important;
            padding: 12px 28px !important;
            font-size: 0.95rem !important;
            margin: 8px 12px !important;
            border-radius: 50px !important;
            display: inline-flex !important;
        }

        .ft-menu .hero-nav__dropdown {
            position: static !important;
            box-shadow: none !important;
            background: transparent !important;
            padding: 0 8px !important;
            margin: 0 !important;
            max-height: 0 !important;
            overflow: hidden !important;
            transition: max-height 0.3s ease !important;
        }

        .ft-menu .hero-nav__item--show-dropdown .hero-nav__dropdown {
            max-height: 500px !important;
        }

        .ft-menu .dropdown__link {
            padding: 12px 16px 12px 36px !important;
            margin-bottom: 2px !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
            font-size: 0.9rem !important;
            position: relative !important;
        }

        .ft-menu .dropdown__link::before {
            content: '' !important;
            position: absolute !important;
            left: 20px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            width: 4px !important;
            height: 4px !important;
            border-radius: 50% !important;
            background: var(--secondary-orange) !important;
            opacity: 0.4 !important;
        }

        .ft-menu .dropdown__link:hover {
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.06), rgba(229, 142, 36, 0.04)) !important;
            color: var(--primary-green) !important;
            padding-left: 42px !important;
        }

        .ft-menu .dropdown__link:hover::before {
            opacity: 1 !important;
            background: var(--primary-green) !important;
        }
    }


    @media (max-width: 991.98px) {

        html,
        body {
            overflow-x: hidden;
        }
    }

    @media (max-width: 767.98px) {

        html,
        body {
            overflow-x: hidden;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menu = document.querySelector('#hero-menu');
        if (menu) {
            menu.addEventListener('click', function(e) {
                if (e.target === menu && menu.classList.contains('ft-menu--js-show')) {
                    menu.classList.remove('ft-menu--js-show');
                    if (typeof bodyScrollLock !== 'undefined') {
                        bodyScrollLock.unlock(menu);
                    }
                }
            });
        }
    });
</script>
