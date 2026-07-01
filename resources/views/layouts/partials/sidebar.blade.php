<!-- Left side column. contains the logo and sidebar -->
<aside class="side-bar tw-relative tw-hidden tw-h-full tw-w-64 xl:tw-w-64 lg:tw-flex lg:tw-flex-col tw-shrink-0"
       style="background: #114133; box-shadow: inset -2px 0 6px rgba(0,128,0,0.06), 2px 0 12px rgba(0,128,0,0.06);">

    <!-- sidebar: style can be found in sidebar.less -->

    {{-- <a href="{{route('home')}}" class="logo">
		<span class="logo-lg">{{ Session::get('business.name') }}</span>
	</a> --}}

    <a href="{{route('home')}}"
        class="tw-flex tw-items-center tw-justify-center tw-w-full tw-border-r tw-h-15 tw-shrink-0"
        style="background: linear-gradient(135deg, #008000, #006600); border-bottom: 2px solid rgba(0,128,0,0.15);">
        <p class="tw-text-lg tw-font-medium tw-text-white side-bar-heading tw-text-center">
            {{ Session::get('business.name') }} <span class="tw-inline-block tw-w-3 tw-h-3 tw-bg-green-400 tw-rounded-full" title="Online"></span>
        </p>
    </a>

    <style>
        .side-bar .sidebar-menu li a,
        .side-bar .sidebar-menu li a span,
        .side-bar .sidebar-menu .treeview-menu li a {
            color: #ffffff !important;
        }
        .side-bar .sidebar-menu li a i {
            color: #ffffff !important;
        }
    </style>

    <!-- Sidebar Menu -->
    {!! Menu::render('admin-sidebar-menu', 'adminltecustom') !!}

    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>
