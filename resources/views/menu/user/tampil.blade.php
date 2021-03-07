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
                <a href="ber    anda">Home</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </div>                    
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{$data_user->getDokumentasi()}}" class="img-circle" width="150" />
                    <h4 style="padding-top:20px" class="card-title m-t-10">{{$data_user->nama}}</h4>
                    <h6 class="card-subtitle">id : {{$data_user->id}}</h6>                                                         
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
                            <h4 style="padding-top:0px" class="col-md-10">{{$data_user->nama}}</h4>
                        </div>
                        <div class="col-2">
                            <a style="float:right" href="\datauser" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                        </div>                        
                    </div>                  
                    <div class="form-group">
                        <label class="col-md-12">Alamat</label>
                        <h4 style="padding-top:0px" class="col-md-12">{{$data_user->alamat}}</h4>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-12">Email</label>
                        <h4 style="padding-top:0px" class="col-md-12">{{$data_user->email}}</h4>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-12">Telepon</label>
                        <h4 style="padding-top:0px" class="col-md-12">{{$data_user->telepon}}</h4>
                    </div> 
                    <button type="button" style="margin-left:10px;width:100px" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-edit m-r-10"></i>Edit
                    </button>                                            
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="color:#399993" class="modal-title" id="exampleModalLabel"><b>Ubah Data User</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/datauser/{{$data_user->id}}/update" method="POST" enctype="multipart/form-data">
            {{csrf_field()}} <!-- token random caracter -->
            <div class="form-group">
                <label for="nama">Nama</label> 
                <input type="text" value="{{$data_user->nama}}" class="form-control" name="nama">                
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label> 
                <input type="text" value="{{$data_user->alamat}}" class="form-control" name="alamat">
            </div>
            <div class="form-group">
                <label for="email">Email</label> 
                <input type="text" value="{{$data_user->email}}" class="form-control" name="email">                
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label> 
                <input type="text" value="{{$data_user->telepon}}" class="form-control" name="telepon">              
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>
@endsection