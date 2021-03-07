<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/sipicow.png')}}">
        <title>siPicow @yield('title')</title>
        <link href="{{asset('assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/green.css')}}" id="theme" rel="stylesheet">    
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">    
        <style type="text/css">
            .text-content {
                white-space: pre-wrap;                
                line-height: 15px;
            }
        </style>
    </head>
    <body class="fix-header card-no-border fix-sidebar">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">siPicow</p>
            </div>
        </div>
        <div id="main-wrapper">
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <div class="navbar-header" >
                        <div class="navbar-brand">
                            <img src="{{asset('assets/images/a.png')}}" alt="homepage" class="dark-logo" style="max-height: 40px" />
                            <img src="{{asset('assets/images/a_2.png')}}" alt="homepage" class="dark-logo" style="max-height: 40px" />
                        </div>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                                    <div class="notify" id="notif-dot"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                    <ul>
                                        <li>
                                            <div class="drop-title">Notifikasi</div>
                                        </li>
                                        <li>
                                            <div class="message-center" id="notif-items">
                                                <!-- Message -->
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="javascript:void(0);"> <strong>Lihat semua notifikasi</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
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
                            <li> <a class="waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="{{url('info/penyakit-sapi')}}" aria-expanded="false"><i class="fa fa-paw"></i><span class="hide-menu">Penyakit Sapi</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="{{url('info/pengelolaan')}}" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Pengelolaan Sapi</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="{{url('info/artikel')}}" aria-expanded="false"><i class="fa fa-bullhorn"></i><span class="hide-menu">Artikel</span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="{{url('chat')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Tanya Pakar</span></a>
                            </li>
                            <!-- <li> <a class="waves-effect waves-dark" href="{{url('profil')}}" aria-expanded="false"><i class="fa fa-gears"></i><span class="hide-menu">Pengaturan</span></a>
                            </li>                             -->
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
        @if (Auth::check())
            <script type="text/javascript">
                checkNotif();
                function checkNotif() {
                    $.ajax({
                        url: "{{ url('unread-notif') }}",
                        type:"GET",
                        dataType:"json",
                        beforeSend: function () {
                            $("#notif-items").html('');
                        },
                        success: function (res) {
                            if(res.count > 0){
                                $("#notif-dot").show();
                            } else {
                                $("#notif-dot").hide();
                            }
                            $.each(res.data, function (i, v) {
                                var item = '<a href="'+v.url+'">' +
                                    '<div class="user-img"> <img src="'+v.gambar+'" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>' +
                                    '<div class="mail-contnet">' +
                                        '<h5>'+v.pengirim+'</h5> <span class="mail-desc">'+v.pesan+'</span> <span class="time">'+v.created_at+'</span> </div>' +
                                '</a>';
                                $("#notif-items").append(item);
                            });
                        }
                    });
                }
                setInterval(checkNotif, 5000);
            </script>
        @endif
        <script src="{{asset('js/waves.js')}}"></script>
        <script src="{{asset('js/sidebarmenu.js')}}"></script>
        <script src="{{asset('js/custom.min.js')}}"></script>
    </body>
</html>