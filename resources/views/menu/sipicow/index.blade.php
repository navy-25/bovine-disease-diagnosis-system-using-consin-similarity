@extends('layout.app')
@section('body')

<div class="page-header clear-filter" filter-color="orange" >
  <div class="page-header-image" style="margin-left:-10px;filter:blur(3px);background-image:url({{asset('../front/img/bglogin.jpg')}});witdh:105%;height:105%"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-7 ml-auto mr-auto" style="border-radius:37px;">
            <h2 style="color:white"><b>WELCOME TO SIPICOW</b></h2>            
            <form >
                <div class="form-group">                    
                    <a style="background-color:#679902"  href="/penyakit" class="btn btn-primary"> Cari sekarang !</a>
                </div>                
            </form>
        </div>        
      </div>                              
      <footer class="footer">      
        <small>
        © 2019 Sistem Informasi Pakar Sapi - Envy Team    
        </small>
      </footer>
    </div>
  </div>
</div>
@endsection