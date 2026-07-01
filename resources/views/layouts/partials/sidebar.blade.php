<!-- Left side column. contains the logo and sidebar -->
<aside class="side-bar tw-relative tw-hidden tw-h-full tw-w-64 xl:tw-w-64 lg:tw-flex lg:tw-flex-col tw-shrink-0"
       style="background: #114133; box-shadow: inset -2px 0 6px rgba(0,128,0,0.06), 2px 0 12px rgba(0,128,0,0.06);">

    <!-- sidebar: style can be found in sidebar.less -->

    {{-- <a href="{{route('home')}}" class="logo">
		<span class="logo-lg">{{ Session::get('business.name') }}</span>
	</a> --}}


    <div
         style="
    background-color: #114133;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 85px;
    padding: 15px 20px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    overflow: hidden;
">

        <a href="{{ route('home') }}"
           style="
           display: flex;
           align-items: center;
           justify-content: center;
           text-decoration: none;
           width: 100%;
           transition: all 0.3s ease;
       "
           onmouseover="this.style.opacity='0.9'"
           onmouseout="this.style.opacity='1'">

            <p
               style="
             color: #e0e0e0;
             font-size: 1rem;
             font-weight: 600;
             letter-spacing: 0.5px;
             margin: 0;
             display: flex;
             align-items: center;
             gap: 12px;
             text-transform: capitalize;
             font-family: 'Poppins', sans-serif;
             white-space: nowrap;
         ">

                {{-- Business Name - Full Display --}}
                <span
                      style="
                white-space: nowrap;
                overflow: visible;
                text-overflow: clip;
            ">
                    {{ Session::get('business.name') }}
                </span>

                {{-- Professional Online Indicator --}}
                <span style="
                position: relative;
                display: inline-flex;
                width: 10px;
                height: 10px;
                flex-shrink: 0;
            "
                      title="System Online">

                    <!-- Ping Effect (Outer Glowing Ring) -->
                    <span
                          style="
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
                    background-color: #22c55e;
                    opacity: 0.7;
                    animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
                "></span>

                    <!-- Inner Solid Dot -->
                    <span
                          style="
                    position: relative;
                    display: inline-flex;
                    width: 10px;
                    height: 10px;
                    border-radius: 50%;
                    background-color: #22c55e;
                    border: 2px solid #114133;
                    box-shadow: 0 0 8px rgba(34, 197, 94, 0.6);
                "></span>
                </span>

            </p>
        </a>

        <style>
            @keyframes ping {

                75%,
                100% {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        </style>
    </div>
    <style>
        #side-bar a,
        #side-bar a span,
        #side-bar .chiled a span {
            color: #e0e0e0 !important;
        }

        #side-bar a i {
            color: #e0e0e0 !important;
        }

        #side-bar a svg {
            color: #e0e0e0 !important;
            stroke: #e0e0e0 !important;
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
            color: #e0e0e0 !important;
            stroke: #e0e0e0 !important;
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

        body.sidebar-collapse aside.side-bar {
            width: 64px !important;
            min-width: 64px !important;
            transition: width 0.3s ease;
            overflow: hidden;
        }

        body.sidebar-collapse aside.side-bar > div:first-of-type {
            height: 64px !important;
            padding: 8px !important;
        }

        body.sidebar-collapse aside.side-bar > div:first-of-type p {
            justify-content: center !important;
        }

        body.sidebar-collapse aside.side-bar > div:first-of-type p > span:first-child,
        body.sidebar-collapse aside.side-bar > div:first-of-type p > span[title="System Online"] {
            display: none !important;
        }

        body.sidebar-collapse #side-bar a > span {
            display: none !important;
        }

        body.sidebar-collapse #side-bar .chiled {
            display: none !important;
        }

        body.sidebar-collapse #side-bar a {
            justify-content: center !important;
            padding-left: 8px !important;
            padding-right: 8px !important;
            gap: 0 !important;
        }

        body.sidebar-collapse #side-bar a > svg.svg {
            display: none !important;
        }

        body.sidebar-collapse #side-bar > div {
            padding-left: 4px !important;
            padding-right: 4px !important;
        }
    </style>

    <!-- Sidebar Menu -->
    {!! Menu::render('admin-sidebar-menu', 'adminltecustom') !!}

    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>
