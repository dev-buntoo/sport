<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Members Mcorpx</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('main')}}/img/logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/css/font-awesome.min.css">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/css/dataTables.bootstrap4.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/css/bootstrap-datetimepicker.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/css/line-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/css/style.css">

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{asset('main')}}/plugins/summernote/dist/summernote-bs4.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="{{asset('main')}}/js/html5shiv.min.js"></script>
			<script src="{{asset('main')}}/js/respond.min.js"></script>
        <![endif]-->
        @stack('style')
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">


            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <!-- Header Title -->
            <div class="page-title-box">
                <h3>PDRLRA SYSTEM</h3>
            </div>
            <!-- /Header Title -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="{{asset('main')}}/img/profile/{{ Auth::user()->photo }}" alt="">
                            <span class="status online"></span></span>
                            <span>{{ Auth::user()->roles->name }}</span>
                    </a>
                    <div class="dropdown-menu">
                         <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
                        <!--<a class="dropdown-item" href="settings.html">Settings</a>-->
                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
                        <!--<a class="dropdown-item" href="settings.html">Settings</a>-->
                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
        <!-- /Header -->
