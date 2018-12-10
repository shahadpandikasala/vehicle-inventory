<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Mini Car Inventory System" />
        <meta name="author" content="G data Technology" />
        <title>Mini Car Inventory System | @yield('title') </title>
        <!-- google font -->
        {{--  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />  --}}
        <!-- icons -->
        <link href="{{asset('plugins/assets/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
        <link rel="stylesheet" href="{{asset('plugins/assets/material-icon/material-icon.css')}}">
        <!--bootstrap -->

        <link href="{{asset('plugins/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" />

        <!-- Material Design Lite CSS -->
        <link rel="stylesheet" href="{{asset('plugins/assets/material/material.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/css/material_style.css')}}">
        <!-- Theme Styles -->
        <link href="{{asset('plugins/css/theme_style.css')}}" rel="stylesheet" id="rt_style_components" type="text/css" />
        <link href="{{asset('plugins/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/css/responsive.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/css/formlayout.css')}}" rel="stylesheet" type="text/css" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{asset('plugins/img/favicon.ico')}}" />
        <style type="text/css">
                .has-error {
                    border-color: red;
                }

                .mt-10 {
                    margin-top: 10px
                }

            </style>
            @stack('css')
            <style type="text/css">
                .dropdown-item-extra{
                    color:#005cbf;
                }
                ul.typeahead li {
                    background-color: #b8e0d694 !important ;
                }
            </style>
        </head>
        <!-- END HEAD -->

        <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
            <div class="page-wrapper">
                <!-- start header -->
                <div class="page-header navbar navbar-fixed-top">
                    <div class="page-header-inner ">
                        <!-- logo start -->
                        <div class="page-logo">
                            <a href="#">
                                <!-- <span class="logo-icon fa fa-medkit "></span> -->
                                <span class="logo-default">Inventory System</span> </a>
                        </div>
                        <!-- logo end -->
                        <ul class="nav navbar-nav navbar-left in">
                            <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                        </ul>
                        <!-- <form class="search-form-opened" action="#" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." name="query">
                                <span class="input-group-btn">
                                    <a href="javascript:;" class="btn submit">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </span>
                            </div>

                        </form> -->
                        <!-- start mobile menu -->
                        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                            <span></span>
                        </a>
                        <!-- end mobile menu -->
                        <!-- start header menu -->
                        <div class="top-menu">


                            <ul class="nav navbar-nav pull-right">

                                <!-- start language menu -->

                                <!-- start manage user dropdown -->
                                <li class="dropdown dropdown-user">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                       data-close-others="true">
                                        <span class="username username-hide-on-mobile"> {{ucfirst(auth()->user()->name)}}
                                        </span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">

                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="icon-logout"></i>Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <!-- end manage user dropdown -->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end header -->
                <!-- start page container -->
                <div class="page-container">
                    <!-- start sidebar menu -->
                    <div class="sidebar-container">
                        <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                            <div id="remove-scroll" class="left-sidemenu">
                                <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                                    data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                                    <li class="sidebar-toggler-wrapper hide">
                                        <div class="sidebar-toggler">
                                            <span></span>
                                        </div>
                                    </li>
                                    {{-- Dashboard--}}

                                    <li class="nav-item">
                                        <a href="{{route('home')}}" class="nav-link nav-toggle"> <i class="material-icons">dashboard</i>
                                            <span class="title">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('manufacturer')}}" class="nav-link nav-toggle"> <i class="material-icons">dashboard</i>
                                            <span class="title">Manufacturers</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{url('vehicle-model/create')}}" class="nav-link nav-toggle"> <i class="material-icons">dashboard</i>
                                            <span class="title">Add Model</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{url('vehicle-model')}}" class="nav-link nav-toggle"> <i class="material-icons">dashboard</i>
                                            <span class="title">View Inventory</span>
                                        </a>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end sidebar menu -->
                    <!-- start page content -->
                    <div class="page-content-wrapper">

                        @yield('contents')

                    </div>
                    <!-- end page content -->

                </div>
                <!-- end page container -->
                <!-- start footer -->
                <div class="page-footer">

                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                </div>
                <!-- end footer -->
            </div>
            <!-- start js include path -->
            <!-- <script src="{{asset('plugins/assets/jquery.min.js')}}" ></script>
            -->
            <script src="{{asset('plugins/assets/jquery/jquery.min.js')}}"></script>

            <script src="{{asset('plugins/assets/popper/popper.js')}}"></script>
            <script src="{{asset('plugins/assets/jquery.blockui.min.js')}}"></script>
            <script src="{{asset('plugins/assets/jquery-validation/js/jquery.validate.min.js')}}"></script>
            <script src="{{asset('plugins/assets/jquery-validation/js/additional-methods.min.js')}}"></script>
            <script src="{{asset('plugins/assets/jquery.slimscroll.js')}}"></script>




            <!-- bootstrap -->
            <script src="{{asset('plugins/assets/bootstrap/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('plugins/assets/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
            <!-- <script src="{{asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
            <script src="{{asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js')}}"></script> -->
            <!-- Common js-->
            <script src="{{asset('plugins/assets/app.js')}}"></script>
            <script src="{{asset('plugins/assets/layout.js')}}"></script>
            <script src="{{asset('plugins/assets/theme-color.js')}}"></script>

            <!-- counterup -->
            <script src="{{asset('plugins/assets/counterup/jquery.waypoints.min.js')}}"></script>
            <script src="{{asset('plugins/assets/counterup/jquery.counterup.min.js')}}"></script>


            <!-- bootstrap date-time-picker -->


            <!-- end js include path -->

            @stack('scripts')

            <script>

                //function to input only numbers
                function isNumberKey(evt)
                {
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                    return true;
                }

            </script>

        </body>

    </html>