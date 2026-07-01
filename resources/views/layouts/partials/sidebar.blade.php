<!-- Left side column. contains the logo and sidebar -->
<aside class="side-bar tw-relative tw-hidden tw-h-full tw-w-64 xl:tw-w-64 lg:tw-flex lg:tw-flex-col tw-shrink-0"
       style="background: #114133; box-shadow: inset -2px 0 6px rgba(0,128,0,0.06), 2px 0 12px rgba(0,128,0,0.06);">

    <!-- sidebar: style can be found in sidebar.less -->

    {{-- <a href="{{route('home')}}" class="logo">
		<span class="logo-lg">{{ Session::get('business.name') }}</span>
	</a> --}}

    <div
         style="background: #008000; display: flex; align-items: center; justify-content: center; width: 100%; min-height: 90px; padding: 20px; border-bottom: 2px solid #ffffff; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow: hidden;">

        <a href="{{ route('home') }}"
           style="display: flex; align-items: center; justify-content: center; text-decoration: none; width: 100%; transition: transform 0.3s ease;"
           onmouseover="this.style.transform='scale(1.02)'"
           onmouseout="this.style.transform='scale(1)'">

            <p
               style="color: #ffffff; font-size: 1.2rem; font-weight: 700; letter-spacing: 0.8px; margin: 0; display: flex; align-items: center; gap: 10px; text-transform: capitalize; font-family: 'Poppins', sans-serif;">

                {{-- Business Name --}}
                <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 180px;">
                    {{ Session::get('business.name') }}
                </span>

                {{-- Professional Online Indicator --}}
                <span style="position: relative; display: flex; width: 10px; height: 10px;"
                      title="System Online">
                    <!-- Ping Effect (The outer glowing ring) -->
                    <span class="indicator-ping"></span>
                    <!-- Inner Solid Dot -->
                    <span
                          style="position: relative; display: inline-flex; width: 10px; height: 10px; border-radius: 50%; background-color: #22c55e; border: 1.5px solid #114133;"></span>
                </span>

            </p>
        </a>
    </div>

    <style>
        .indicator-ping {
            position: absolute;
            display: inline-flex;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #4ade80;
            opacity: 0.75;
            animation: brandPulse 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes brandPulse {

            75%,
            100% {
                transform: scale(2.5);
                opacity: 0;
            }
        }
    </style>
    <style>
        #side-bar a,
        #side-bar a span,
        #side-bar .chiled a span {
            color: #ffffff !important;
        }

        #side-bar a i {
            color: #ffffff !important;
        }

        #side-bar a svg {
            color: #ffffff !important;
            stroke: #ffffff !important;
        }

        #side-bar a:hover,
        #side-bar a:hover span,
        #side-bar a:hover i,
        #side-bar a:hover svg {
            color: #000000 !important;
            stroke: #000000 !important;
        }

        #side-bar a:hover {
            background: #DFB86B !important;
        }

        #side-bar .chiled a:hover {
            background: transparent !important;
        }

        #side-bar .chiled a:hover span {
            color: #DFB86B !important;
        }

        #side-bar a.menu-active,
        #side-bar a.menu-active span,
        #side-bar a.menu-active i,
        #side-bar a.menu-active svg {
            background: #DFB86B !important;
            color: #000000 !important;
            stroke: #000000 !important;
        }

        #side-bar div.menu-active>a.drop_down,
        #side-bar div.menu-active>a.drop_down span,
        #side-bar div.menu-active>a.drop_down i,
        #side-bar div.menu-active>a.drop_down svg {
            background: #DFB86B !important;
            color: #000000 !important;
            stroke: #000000 !important;
        }

        #side-bar a:focus,
        #side-bar a:focus span,
        #side-bar a:focus i,
        #side-bar a:focus svg {
            background: transparent !important;
            color: #ffffff !important;
            stroke: #ffffff !important;
        }

        #side-bar a.menu-active:focus,
        #side-bar a.menu-active:focus span,
        #side-bar a.menu-active:focus i,
        #side-bar a.menu-active:focus svg,
        #side-bar div.menu-active>a.drop_down:focus,
        #side-bar div.menu-active>a.drop_down:focus span,
        #side-bar div.menu-active>a.drop_down:focus i,
        #side-bar div.menu-active>a.drop_down:focus svg {
            background: #DFB86B !important;
            color: #000000 !important;
            stroke: #000000 !important;
        }
    </style>

    <!-- Sidebar Menu -->
    {!! Menu::render('admin-sidebar-menu', 'adminltecustom') !!}

    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>
