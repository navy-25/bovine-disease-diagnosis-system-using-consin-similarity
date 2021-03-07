<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/sipicow.png')}}">
        <title>siPicow - Aplikasinya Peternak Cerdas</title>
        <link href="{{asset('assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/green.css')}}" id="theme" rel="stylesheet">    
    </head>
    <body class="fix-header card-no-border fix-sidebar">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Admin Wrap</p>
            </div>
        </div>
        <div id="main-wrapper">
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <div class="navbar-header" >
                    <a class="navbar-brand">
                        <b>
                            <img src="{{asset('assets/images/a.png')}}" alt="homepage" class="dark-logo" width="50px" height="50px" />
                        </b>
                        <span>
                        <img src="{{asset('assets/images/a_2.png')}}" alt="homepage" class="dark-logo" width="120px" height="50px" />
                    </div>
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                            <li class="nav-item hidden-xs-up search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                                <form class="app-search" >
                                    <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i  class="fa fa-times"></i></a> </form>
                            </li>
                        </ul>
                        <ul class="navbar-nav my-lg-0">
                            <li class="nav-item dropdown u-pro">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/admin.jpg')}}" alt="user" class="" /> <span class="hidden-md-down">{{Auth::user()->name}} &nbsp;</span> </a>
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark fa fa-sign-out m-r-10" onclick="return confirm('Are you sure?')" href="/keluar"></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li> <a class="waves-effect waves-dark" href="/home" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Beranda</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/datapenyakit" aria-expanded="false"><i class="fa fa-paw"></i><span class="hide-menu">Data Penyakit</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/list_artikel" aria-expanded="false"><i class="fa fa-bullhorn"></i><span class="hide-menu">Artikel</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="{{url('user/list')}}" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Pengguna</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="{{url('user/expert')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Pakar</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="/pengaturan" aria-expanded="false"><i class="fa fa-gears"></i><span class="hide-menu">Pengaturan</span></a>
                            </li>                            
                        </ul>                        
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                <div class="container-fluid">
                    @yield('body')                                 
                </div>
                <footer class="footer">
                    ©2019 Sistem Informasi Pakar Sapi - Envy Team
                </footer>
            </div>
        </div>
        <script src="{{asset('assets/node_modules/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/node_modules/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/node_modules/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
        @yield('js-action')
        <script src="{{asset('js/waves.js')}}"></script>
        <script src="{{asset('js/sidebarmenu.js')}}"></script>
        <script src="{{asset('js/custom.min.js')}}"></script>
    </body>
</html>