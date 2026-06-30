   <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <style>
       html {
           height: 100%;
           background: linear-gradient(135deg, rgba(15, 23, 42, 0.88), rgba(30, 41, 59, 0.8)), url('{{ asset('img/home-bg.jpg') }}');
           background-size: cover;
           background-position: center center;
           background-repeat: no-repeat;
           background-attachment: fixed;
       }

       body {
           min-height: 100vh;
           background: transparent;
           margin: 0;
           padding: 0;
       }

       .login-input {
           transition: all 0.2s ease;
       }

       .login-input:focus {
           border-color: #6366f1 !important;
           box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
       }

       .login-card {
           animation: fadeSlideUp 0.5s ease-out;
       }

       @keyframes fadeSlideUp {
           from {
               opacity: 0;
               transform: translateY(20px);
           }

           to {
               opacity: 1;
               transform: translateY(0);
           }
       }
   </style>

   <style type="text/css">
       /*
      * Pattern lock css
      * Pattern direction
      * http://ignitersworld.com/lab/patternLock.html
      */
       .patt-wrap {
           z-index: 10;
       }

       .patt-circ.hovered {
           background-color: #cde2f2;
           border: none;
       }

       .patt-circ.hovered .patt-dots {
           display: none;
       }

       .patt-circ.dir {
           background-image: url("http://pos.test/img/pattern-directionicon-arrow.png");
           background-position: center;
           background-repeat: no-repeat;
       }

       .patt-circ.e {
           -webkit-transform: rotate(0);
           transform: rotate(0);
       }

       .patt-circ.s-e {
           -webkit-transform: rotate(45deg);
           transform: rotate(45deg);
       }

       .patt-circ.s {
           -webkit-transform: rotate(90deg);
           transform: rotate(90deg);
       }

       .patt-circ.s-w {
           -webkit-transform: rotate(135deg);
           transform: rotate(135deg);
       }

       .patt-circ.w {
           -webkit-transform: rotate(180deg);
           transform: rotate(180deg);
       }

       .patt-circ.n-w {
           -webkit-transform: rotate(225deg);
           transform: rotate(225deg);
       }

       .patt-circ.n {
           -webkit-transform: rotate(270deg);
           transform: rotate(270deg);
       }

       .patt-circ.n-e {
           -webkit-transform: rotate(315deg);
           transform: rotate(315deg);
       }
   </style>
   <style>
       h1 {
           color: #fff;
       }
   </style>
   <style>
       .action-link[data-v-1552a5b6] {
           cursor: pointer;
       }
   </style>
   <style>
       .action-link[data-v-397d14ca] {
           cursor: pointer;
       }
   </style>
   <style>
       .action-link[data-v-49962cc0] {
           cursor: pointer;
       }
   </style>

   <link href="{{ asset('css/tailwind/app.css') }}"
         rel="stylesheet">

   <style>
       .text {
           display: inline-block;
           margin-top: 1.5rem;
           padding: 0.85rem 2.5rem;
           background: linear-gradient(135deg, #6366f1, #4f46e5);
           color: #fff;
           font-size: 1.05rem;
           font-weight: 700;
           border: none;
           border-radius: 50px;
           text-decoration: none;
           display: inline-flex;
           align-items: center;
           justify-content: center;

           transition: all 0.3s ease;
           box-shadow: 0 8px 25px rgba(99, 102, 241, 0.35);
       }

        .text:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(99, 102, 241, 0.5);
            color: #fff;
        }

        .input-group .select2-container {
            width: 100% !important;
        }

        .input-group .select2-container--default .select2-selection--single {
            border: 2px solid #e5e7eb;
            background: #f9fafb;
            border-radius: 0 14px 14px 0;
            height: auto;
            padding: 0;
        }

        .input-group .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #1F2937;
            font-size: 0.95rem;
            line-height: 1.5;
            padding: 13px 36px 11px 20px;
        }

        .input-group .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 12px;
            right: 16px;
        }

        .input-group .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #9CA3AF;
        }

        .input-group .select2-container--default.select2-container--open .select2-selection--single,
        .input-group .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #1B5E20;
            box-shadow: 0 0 0 4px rgba(27, 94, 32, 0.12);
            background: #ffffff;
        }

        /* Upload Logo - fileinput widget */
        .file-input .input-group {
            width: 100%;
            height: auto;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            background: #f9fafb;
            transition: all 0.3s ease;
        }

        .file-input .input-group:hover:not(:focus-within) {
            border-color: #d1d5db;
        }

        .file-input .input-group:focus-within {
            background: #ffffff;
            border-color: #1B5E20;
            box-shadow: 0 0 0 4px rgba(27, 94, 32, 0.12);
        }

        .file-input .input-group .file-caption.form-control {
            border: none !important;
            box-shadow: none !important;
            background: transparent;
            border-radius: 0;
            height: auto;
            padding: 0;
            font-size: 0.95rem;
            color: #1F2937;
            float: none;
        }

        .file-input .input-group .file-caption-name {
            padding: 14px 20px;
            height: auto;
            line-height: 1.5;
            font-size: 0.95rem;
            color: #9CA3AF;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .file-input.file-input-exists .file-caption-name {
            color: #1F2937;
        }

        .file-input .input-group-btn .btn-file {
            background: linear-gradient(180deg, #4ade80, #22c55e);
            border: none;
            color: #fff;
            padding: 14px 24px;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 0;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(255,255,255,0.25), inset 0 -2px 4px rgba(0,0,0,0.15);
            line-height: 1.5;
            height: auto;
        }

        .file-input .input-group-btn .btn-file:hover {
            background: linear-gradient(180deg, #22c55e, #16a34a);
            transform: translateY(-1px);
            color: #fff;
        }

        .file-input .input-group-btn .btn-file:active {
            transform: translateY(0);
        }

        .file-input .input-group-btn .fileinput-remove.fileinput-remove-button {
            background: #fff;
            border: none;
            color: #dc2626;
            padding: 14px 16px;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 0;
            transition: all 0.3s ease;
            line-height: 1.5;
            height: auto;
        }

        .file-input .input-group-btn .fileinput-remove.fileinput-remove-button:hover {
            background: #fef2f2;
            color: #b91c1c;
        }
    </style>
