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
                <a href="beranda">Home</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </div>                    
</div>
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data User</h3>
                <span>
                    <form class="row-12 form-inline" method="get">
                        <div class="col-9">                           
                            <button type="button" style="margin:-15px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus m-r-10"></i>
                                Tambah Data User
                            </button>                                                      
                        </div>                                                
                    </form>        
                </span>
                <div class="table-responsive" style="margin-top:20px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Nama User</th>
                                <th width="20%">Alamat</th>
                                <th width="20%">Email</th>
                                <th width="15%">Telepon</th>
                                <th width="20%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_user as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->alamat}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telepon}}</td>
                                <td>                                                                       
                                    <a href="/datauser/{{$user->id}}/tampil" style="width:36px"class="btn btn-info fa fa-eye m-r-10"></a>           
                                    <a href="/datauser/{{$user->id}}/hapus" class="btn btn-danger fa fa-times m-r-10"  onclick="return confirm('Apakah anda yakin ?')"></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$data_user->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color:#399993" class="modal-title" id="exampleModalLabel"><b>Tambah Data User</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/datauserstore" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nama">Nama</label> 
                    <input type="text" class="form-control" name="nama">                
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label> 
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="email">Email</label> 
                    <input type="text" class="form-control" name="email">                
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label> 
                    <input type="text" class="form-control" name="telepon">              
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input name="gambar" type="file" class="form-control-file">
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