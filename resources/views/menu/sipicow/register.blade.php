@extends('layout.app')
@section('body')
<div class="page-header clear-filter" filter-color="orange" >
    <div class="page-header-image" style="margin-left:-10px;filter:blur(3px);background-image:url({{asset('../front/img/bglogin.jpg')}});witdh:105%;height:105%"></div>
        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto" style="margin-top:-70px;background-color:;border-radius:37px;">
                    <!--div class="card card-login card-plain"-->
                    <div class="card card-login card-plain" >
                        <form class="form" form method="POST" action="/daftar">
                        {{csrf_field()}}
                            <div class="card-header text-center" >
                                <h2 style="margin-top:30px;color:white"><b>Buat Akun</b></h2>
                            </div>
                            <div class="card-body" >
                                <div class="form-group">
                                  <input  placeholder="Nama Lengkap" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="text-color:#474747;background-color:">
                                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                               </div>
                               <div class="form-group">
                                  <input  placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style=";text-color:#474747;background-color:">
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                               </div>
                               <div class="form-group">
                                  <input  placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" autofocus style="margin-top:20px;text-color:#474747;background-color:">
                                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                               </div>
                               <div class="form-group">
                                  <input  placeholder="Konfirmasi-password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style=";text-color:#474747;background-color:">                                  
                               </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" style="background-color:#679902" class="btn btn-primary btn-round btn-md btn-block">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                    
            <footer class="footer">      
            <small>
                ©2019 Sistem Informasi Pakar Sapi - Envy Team
                </small>
      </footer>
        </div>
    </div>
</div>
@endsection