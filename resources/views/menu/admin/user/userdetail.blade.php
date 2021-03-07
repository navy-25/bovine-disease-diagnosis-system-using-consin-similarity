@extends('layout.master2')
@section('body')
@if(session('sukses'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('sukses')}}
  </div>
@endif
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">User</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>                    
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{$user->getDokumentasi()}}" class="img-circle" width="150" />
                    <h4 style="padding-top:20px" class="card-title m-t-10">{{$user->name}}</h4>
                    <h6 class="card-subtitle">
                        @if($user->role=='admin')
                            <span class="label label-primary">{{$user->role}}</span>
                        @elseif($user->role=='user')
                            <span class="label label-warning">{{$user->role}}</span>
                        @elseif($user->role=='pakar')
                            <span class="label label-success">{{$user->role}}</span>
                        @endif
                    </h6>                                                         
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material">
                    <div class="row form-group">
                        <div class="col-10">
                            <label class="col-10">Nama</label>
                            <h4 style="padding-top:0px" class="col-md-10">{{$user->name}}</h4>
                        </div>
                        <div class="col-2">
                            <a style="float:right" href="javascript:window.history.back()" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                        </div>                        
                    </div>                  
                    <div class="form-group">
                        <label class="col-md-12">Alamat</label>
                        <h4 style="padding-top:0px" class="col-md-12">{{$user->alamat}}</h4>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-12">Email</label>
                        <h4 style="padding-top:0px" class="col-md-12">{{$user->email}}</h4>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-12">Telepon</label>
                        <h4 style="padding-top:0px" class="col-md-12">{{$user->telepon}}</h4>
                    </div>                                           
                </form>
            </div>
        </div>
    </div>
</div>
@endsection