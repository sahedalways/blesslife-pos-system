<!doctype html>
<html lang="en">
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- custom metas -->
        @if(!empty($__site_details['meta_tags']))
            {!!$__site_details['meta_tags']!!}
        @endif

        @yield('meta')

        <!-- font awesome 5 free -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- Splide CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css"/>
        <!-- Your Custom CSS file that will include your blocks CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('modules/cms/css/cms.css?v=' . $asset_v) }}">
        <style>
            html { overflow-x: clip; }
            body { scrollbar-width: thin; scrollbar-color: #008000 #e8f5e9; }
            body::-webkit-scrollbar { width: 8px; }
            body::-webkit-scrollbar-track { background: #e8f5e9; }
            body::-webkit-scrollbar-thumb {
                background: linear-gradient(180deg, #00c853, #008000, #006600);
                border-radius: 10px;
                border: 1px solid rgba(255,255,255,0.3);
                box-shadow: inset 0 1px 3px rgba(255,255,255,0.4), 0 2px 6px rgba(0,128,0,0.3);
            }
            body::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(180deg, #00e676, #009a00, #007700);
            }
        </style>
        <script src="https://unpkg.com/tua-body-scroll-lock"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{config('app.name', 'ultimatePOS')}}</title>
        <!-- custom css code -->
        @if(!empty($__site_details['custom_css']))
            {!!$__site_details['custom_css']!!}
        @endif

        <!-- in app chat widget css -->
        @if(
            isset($__site_details['chat']) && 
            isset($__site_details['chat']['enable']) && 
            $__site_details['chat']['enable'] == 'in_app_chat'
        )
            @includeIf('cms::components.chat_widget.css.chat-widget-style.chat_widget-style1')
            @includeIf('cms::components.chat_widget.css.chat-widget-colors.color-green')
        @endif

        @yield('css')
        <style type="text/css">
            .far.fa-comments{
                padding-top: 3px !important;
                font-size: 25px !important;
            }
        </style>
    </head>
    <body class="@yield('body-class')">
        @yield('content')

        @if(
            isset($__site_details['chat']) && 
            isset($__site_details['chat']['enable']) && 
            $__site_details['chat']['enable'] == 'in_app_chat'
        )
            @includeIf('cms::components.chat_widget.chat_widget')
        @endif

        @includeIf('cms::frontend.layouts.footer')

        <button id="scrollToTop" aria-label="Scroll to top">
            <i class="fas fa-arrow-up"></i>
        </button>

        <style>
            #scrollToTop {
                position: fixed;
                bottom: 80px;
                right: 21px;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #fff;
                border: none;
                font-size: 18px;
                cursor: pointer;
                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                opacity: 0;
                visibility: hidden;
                transform: translateY(20px);
                transition: all 0.3s ease;
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #scrollToTop.show {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            #scrollToTop:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            }
        </style>

        <script>
            const scrollBtn = document.getElementById('scrollToTop');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 400) {
                    scrollBtn.classList.add('show');
                } else {
                    scrollBtn.classList.remove('show');
                }
            });
            scrollBtn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/tua-body-scroll-lock"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-js/1.3.0/sticky.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="{{ asset('modules/cms/js/cms.js?v=' . $asset_v) }}"></script>

        <!-- Google analytics code -->
        @if(!empty($__site_details['google_analytics']))
            {!!$__site_details['google_analytics']!!}
        @endif

        <!-- facebook pixel code -->
        @if(!empty($__site_details['fb_pixel']))
            {!!$__site_details['fb_pixel']!!}
        @endif

        <!-- custom js -->
        @if(!empty($__site_details['custom_js']))
            {!!$__site_details['custom_js']!!}
        @endif

        <!-- 3rd party chat_widget -->
        @if(
            (
                isset($__site_details['chat']) && 
                isset($__site_details['chat']['enable']) && 
                $__site_details['chat']['enable'] == 'other' &&
                !empty($__site_details['chat_widget'])
            ) ||
            (
                !isset($__site_details['chat']) &&
                empty($__site_details['chat']) &&
                !empty($__site_details['chat_widget'])
            )
        )
            {!!$__site_details['chat_widget']!!}
        @endif
        <!-- in app chat js -->
        @if(
            isset($__site_details['chat']) && 
            isset($__site_details['chat']['enable']) && 
            $__site_details['chat']['enable'] == 'in_app_chat'
        )
            @includeIf('cms::components.chat_widget.js.chat_widget-style1')
        @endif
        @yield('javascript')
    </body>
</html>