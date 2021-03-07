<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>siPicow</title>
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="{{asset('images-landing/sipicow.png')}}">
    <link rel="shortcut icon" type="image-landing/ico" href="{{asset('images-landing/sipicow.png')}}" />
    <!-- Plugin-CSS -->
    
    <link rel="stylesheet" href="{{asset('css-landing/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css-landing/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css-landing/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css-landing/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css-landing/animate.css')}}">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="{{asset('css-landing/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('style-landing.css')}}">
    <link rel="stylesheet" href="{{asset('css-landing/responsive.css')}}">
    <script src="{{asset('js/vendor-landing/modernizr-2.8.3.min.js')}}"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target="#primary-menu">

    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <!--Mainmenu-area-->
    <div class="mainmenu-area" data-spy="affix" data-offset-top="100">
        <div class="container">
            <!--Logo-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand logo">
                    <h2>siPicow</h2>
                </a>
            </div>
            <!--Logo/-->
            <nav class="collapse navbar-collapse" id="primary-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#home-page">Beranda</a></li>
                    <li><a href="#service-page">Layanan</a></li>
                    <li><a href="#feature-page">Fitur</a></li>
                    <li><a href="#team-page">Team</a></li>   
                    <li><a href="#contact-page">Kontak</a></li>                               
                </ul>
            </nav>
        </div>
    </div>
    <!--Mainmenu-area/-->

    <!--Header-area-->    
    @include('landing.includes.header')
    <!--Header-area/-->

    <!--Feature-area-->
    @include('landing.includes.feature')
    <!--Feature-area/-->
   
    <!--Kelebihan-area>
    @include('landing.includes.full-feature')
    <Kelebihan-area/-->
    

    <!--Kelebihan-area-->
    @include('landing.includes.kelebihan')
    <!--Kelebihan-area/-->

    <!--team-area-->
    @include('landing.includes.team')
    <!--team-area/-->

    <footer class="footer-area relative sky-bg" id="contact-page">
        <div class="absolute footer-bg"></div>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                        <div class="page-title">
                            <h2>Kontak Kami</h2>
                        </div>
                    </div>
                </div>               
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                        <p>
                            <strong>Alamat: </strong><br>Universitas Muhammadiyah Malang<br>
                            Jl. Raya Tlogomas, Kabupaten Malang, Propinsi Jawa Timur</p>
                        <p>
                            <strong>Telepon: </strong><br>
                            <a href="https://api.whatsapp.com/send?phone=6285232070872" style="color:white"> 085232070872</a>
                        </p>
                        <p>
                            <strong>E-mail: </strong><br>
                            <a href="mailto:youremail@example.com" style="color:white">n_vi25@webmail.umm.ac.id</a> <br />
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <p>&copy;Copyright 2019 Sistem Informasi Pakar Sapi - Envy Team</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>





    <!--Vendor-JS-->
    <script src="{{asset('js-landing/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js-landing/vendor/bootstrap.min.js')}}"></script>
    <!--Plugin-JS-->
    <script src="{{asset('js-landing/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js-landing/contact-form.js')}}"></script>
    <script src="{{asset('js-landing/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset('js-landing/scrollUp.min.js')}}"></script>
    <script src="{{asset('js-landing/magnific-popup.min.js')}}"></script>
    <script src="{{asset('js-landing/wow.min.js')}}"></script>
    <!--Main-active-JS-->
    <script src="{{asset('js-landing/main.js')}}"></script>
</body>

</html>
