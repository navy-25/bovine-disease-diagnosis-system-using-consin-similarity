@extends(Auth::user()->role=="pakar" ? 'layout.app-expert' : 'layout.master2')
@section('body')
@if(session('sukses'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('sukses')}}
  </div>
@endif
<div class="row page-titles">
    <div class="col-md-6 col-6 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Artikel</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="beranda">Home</a></li>
            <li class="breadcrumb-item active">Artikel</li>
        </ol>
    </div>                      
</div>
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data Artikel</h3>
                    <form class="row-12 form-inline" method="get">
                        <div class="col-9">
                        <a  style="margin:-15px;" href="/artikel/tambah" class="btn btn-primary"><i class="fa fa-plus m-r-10"></i>
                            Tambah Data Artikel
                        </a>   
                        </div>      
                        <div class="col-3">
                            <div class="navbar-collapse">
                                <ul class="navbar-nav mr-auto mt-md-0 "></ul>
                                <ul class="navbar-nav my-lg-0">     
                                    <li class="nav-item dropdown">
                                        <div class="btn-group btn-group-toggle">
                                            <label class="btn btn-secondary">
                                                <a href="list_artikel" class="fa fa-list-ul m-r-10"></a>
                                            </label>
                                            <label class="btn btn-secondary">
                                                <a href="artikel"  class="fa fa-th-large m-r-10"></a>
                                            </label>                    
                                        </div>                    
                                    </li>                                            
                                </ul>
                            </div>                                
                        </div>
                    </form>    
                <div class="row">
                    @foreach($artikel as $artikel)
                        <div class="card" style="margin-top:50px;margin-left:20px;width: 25rem;">
                            <img style="padding:10px;margin-left:0px;" witdh="320px" height="240px" src="{{asset('../images/artikel/'.$artikel->gambar)}}" class="card-img-top" alt="{{$artikel->judul}}">
                            <div class="card-body" style="padding:10px;margin-left:0px;">
                                <a href="/artikel/{{$artikel->id}}/tampil" ><h4 href="/artikel/{{$artikel->id}}/tampil" class="card-title"><b>{{$artikel->judul}}</b></h4></a>                                
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            
                        </div>                
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection