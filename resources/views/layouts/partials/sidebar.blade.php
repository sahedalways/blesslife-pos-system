<!-- Left side column. contains the logo and sidebar -->
<aside class="side-bar tw-relative tw-hidden tw-h-full tw-w-64 xl:tw-w-64 lg:tw-flex lg:tw-flex-col tw-shrink-0"
       style="background: linear-gradient(180deg, #008000 0%, #007000 40%, #006000 100%); box-shadow: inset -2px 0 8px rgba(0,0,0,0.1), 2px 0 12px rgba(0,0,0,0.08);">
    <style>
        .side-bar .treeview-menu li a,
        .side-bar .treeview-menu li a:hover,
        .side-bar .treeview-menu li.active a,
        .side-bar .sidebar-menu li a,
        .side-bar .sidebar-menu li a:hover,
        .side-bar .sidebar-menu li.active a {
            color: #fff !important;
        }
        .side-bar .sidebar-menu li a i {
            color: rgba(255,255,255,0.7) !important;
        }
    </style>

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

    <!-- Sidebar Menu -->
    {!! Menu::render('admin-sidebar-menu', 'adminltecustom') !!}

    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>
