<!DOCTYPE html>
<html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title> 

    <link rel="stylesheet" href="{{ asset('css/vendor.css?v='.$asset_v) }}">

    <!-- global css -->
    <style>
        html { overflow-x: clip; }
        html { scrollbar-width: thin; scrollbar-color: #008000 #e8f5e9; }
        html::-webkit-scrollbar { width: 8px; }
        html::-webkit-scrollbar-track { background: #e8f5e9; }
        html::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #00c853, #008000, #006600);
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: inset 0 1px 3px rgba(255,255,255,0.4), 0 2px 6px rgba(0,128,0,0.3);
        }
        body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #00e676, #009a00, #007700);
        }
    </style>

    <!-- app css -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v='.$asset_v) }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="app"></div>
    @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
    @endif
    @yield('content')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js?v=$asset_v"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js?v=$asset_v"></script>
    <![endif]-->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('js/vendor.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/functions.js?v=' . $asset_v) }}"></script>
    @yield('javascript')
</body>

</html>