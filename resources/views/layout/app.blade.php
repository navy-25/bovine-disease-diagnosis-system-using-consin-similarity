<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/sipicow.png')}}">
  <title>siPicow @yield('title')</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="htt  ps://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('front/css/now-ui-kit.css?v=1.3.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('front/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">      
      <div class="navbar-translate">
        <a class="navbar-brand" href="/" rel="tooltip" data-placement="bottom" >
          siPicow
        </a>        
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{asset('../front/img/blurred-image-1.jpg')}}">
        <ul class="navbar-nav">        
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ url('masuk') }}">Masuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('daftar') }}">Buat Akun</a>
            </li>
          @else
            @if(Auth::user()->role == "admin")
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin') }}">Dashboard</a>
              </li>
            @elseif(Auth::user()->role == "user")
              <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
              </li>
            @elseif(Auth::user()->role == "expert")
              <li class="nav-item">
                <a class="nav-link" href="{{ url('expert') }}">Dashboard</a>
              </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ url('profil') }}">{{Auth()->user()->name}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('keluar') }}">Log out</a>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
@yield('body')

  <!--   Core JS Files   -->
  <script src="{{asset('front/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('front/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('front/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{asset('front/js/plugins/bootstrap-switch.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('front/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{asset('front/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('front/js/now-ui-kit.js?v=1.3.0')}}" type="text/javascript"></script>
</body>

</html>