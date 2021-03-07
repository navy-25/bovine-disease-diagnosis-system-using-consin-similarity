@extends('layout.app')
@section('body')

<div class="page-header clear-filter" filter-color="red" >
    <div class="page-header-image" style="margin-left:-10px;filter:blur(3px);background-image:url({{asset('../front/img/bglogin.jpg')}});witdh:105%;height:105%"></div>
        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto" style="margin-top:-50px;;border-radius:37px;">
                    <!--div class="card card-login card-plain"-->
                    <div class="card card-login card-plain"  >
                        <form class="form"method="POST" action="login">
                        {{csrf_field()}}
                            <div class="card-header text-center" >
                                <h2 style="margin-top:30px;color:white"><b>Masuk</b></h2>
                            </div>
                            <div class="card-body" >
                                <div class="form-group">
                                   <input name="email" style="text-color:#474747;background-color:" type="email" class="form-control" placeholder="Email">
                               </div>
                                <div class="form-group">
                                    <input name="password" type="password" placeholder="Password" class="form-control" style="margin-top:20px;text-color:#474747;background-color:" />
                                </div>  
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" style="background-color:#679902" class="btn btn-primary btn-round btn-md btn-block">Masuk</button>
                                <div class="pull-left" style="margin-top:20px">
                                    <h6>
                                    <a href="/daftar" class="link"  style="color:white">Buat Akun</a>
                                    </h6>
                                </div>
                                <div class="pull-right"  style="margin-top:20px">
                                    <h6>
                                    <a href="#pablo" class="link"  style="color:white">Lupa Password ?</a>
                                    </h6>
                                </div>
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