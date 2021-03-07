@extends('layout.app')
@section('body')
<div class="page-header clear-filter" filter-color="orange" >
  <div class="page-header-image" style="margin-left:-10px;filter:blur(3px);background-image:url({{asset('../front/img/bglogin.jpg')}});witdh:105%;height:105%"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto" style="background-color:;border-radius:37px;">
          <div class="card card-login card-plain" >
            <form>                     
              <div class="card-header text-center" >
                <h2 style="margin-top:30px;color:white"><b>Berhasil</b></h2>
              </div>                    
              <div class="card-footer text-center">
                @if(Auth::user()->role=='admin')
                  <a style="background-color:#FF9900" class="btn btn-primary btn-round btn-lg btn-block" href="/home">Dashboard</a>
                @else
                  <a style="background-color:#679902" class="btn btn-primary btn-round btn-lg btn-block" href="/penyakit">Diagnosa Sekarang</a>
                @endif
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