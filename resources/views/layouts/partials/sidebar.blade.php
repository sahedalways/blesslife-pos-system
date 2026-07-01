<!-- Left side column. contains the logo and sidebar -->
<aside class="side-bar tw-relative tw-hidden tw-h-full tw-w-64 xl:tw-w-64 lg:tw-flex lg:tw-flex-col tw-shrink-0"
       style="box-shadow: inset -2px 0 6px rgba(0,128,0,0.06), 2px 0 12px rgba(0,128,0,0.06);">

    <!-- sidebar: style can be found in sidebar.less -->

    {{-- <a href="{{route('home')}}" class="logo">
		<span class="logo-lg">{{ Session::get('business.name') }}</span>
	</a> --}}

    <a href="{{ route('home') }}"
        class="tw-flex tw-items-center tw-justify-center tw-w-full tw-h-15 tw-shrink-0 sidebar-brand-link">
        <p class="tw-text-lg tw-font-medium tw-text-center tw-mb-0 sidebar-brand-text">
            {{ Session::get('business.name') }} <span class="tw-inline-block tw-w-3 tw-h-3 tw-bg-green-400 tw-rounded-full" title="Online"></span>
        </p>
    </a>

    <style>
        aside.side-bar {
            background: #124033 !important;
        }
        aside.side-bar a.sidebar-brand-link {
            background: #008000 !important;
            border-bottom: 2px solid #ffffff;
            color: #ffffff !important;
            text-decoration: none;
            margin-top: 24px;
            margin-bottom: 24px;
            padding-top: 16px;
            padding-bottom: 16px;
        }
        aside.side-bar a.sidebar-brand-link:hover,
        aside.side-bar a.sidebar-brand-link:focus,
        aside.side-bar a.sidebar-brand-link:active {
            background-color: #008000 !important;
            color: #ffffff !important;
            border-bottom: 2px solid #ffffff;
        }
        aside.side-bar a.sidebar-brand-link p.sidebar-brand-text {
            color: #ffffff;
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
