<!DOCTYPE html>	
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->

        <title>{{ config('app.name', 'Rite-Away Pharmacy | Medical Supply') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! url('public/css/all.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! url('public/css/style.css') !!}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" >
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" >
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css" >
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="{!! url('public/css/select2.min.css') !!}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <style>
            .canvas-wrapper canvas {
                width: 200px !important;
            }
            input.checkPdf {
                position: absolute;
            }
            .filter_dropdown_font{
                font-size:12px;
            }
        </style>

    </head>

    <body>
        <div class="container-fluid p-0">
            <div class="sidebar-background "></div>
            @section('sidebar')
            @show
            <div class="main">
                @section('headingstart')
                @show
				<!--<a href="#" class="tgl-btn">
				<i class="fas fa-bars"></i>
				</a>-->
                <div class="user-profile float-right">
                    <div class="d-inline-block">
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                @section('headingend')
                @show
                <div class="p-3 order-tabs">
                    <div class="tab-content">
                        @yield('content')
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"></div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Jquery -->
            <script type="text/javascript" src="{!! asset('public/js/sweetalert.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('public/js/jquery.min.js') !!}" ></script>
            <script type="text/javascript" src="{!! asset('public/js/popper.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('public/js/bootstrap.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('public/js/accordion.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('public/js/custom.js') !!}"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
            <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js" ></script>
            <script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js" ></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.4.456/pdf.min.js" ></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
            <script type="text/javascript" src="{!! asset('public/js/select2.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('public/js/toggle.min.js') !!}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jQuery-Scanner-Detection@1.2.1/jquery.scannerdetection.js"></script>
            <script type="text/javascript" src="{!! asset('public/js/doubleclickevent.js') !!}"></script>
            @yield('footer_scripts')
            @yield('pdfmanipulation_script')
            <script>
                $(document).ready(function () {
                    $(".sidebar-hide-show").click(function () {
                        $(".side-bar").addClass("sidebar-new");
                        $(".side-bar").siblings(".sidebar-background").fadeIn();
                    });
                    $(".sidebar-background").click(function () {
                        $(this).fadeOut();
                        $(".side-bar").removeClass("sidebar-new");
                    });
                    getAccordion("#tabs", 1025);
                });

            </script>
    </body>
</html>
