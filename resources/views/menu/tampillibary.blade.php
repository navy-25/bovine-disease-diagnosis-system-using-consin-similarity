@extends('layout.master2')
@section('body')
@if(session('sukses'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('sukses')}}
  </div>
@endif
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Beranda</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="beranda">Home</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>
    </div>                    
</div> 
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">                
                <div class="row" style="margin-bottom:20px;">
                    <h3 class="col-6 card-title">Detail Libary</h3>        
                    <div class="col-6">
                        <a style="float:right" href="\home" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}} <!-- token random caracter -->                    
                    <div class="form-group" >                        
                        <label for="nama">Tambah Gejala</label> 
                        <input type="text" style="radius:30px" class="form-control" name="nama">               
                        <button type="submit" class="btn btn-success" style="margin-top:10px;padding-left:20px;padding-right:20px">Tambahkan</button>
                    </div>                                        
                </form>
                <div class="table-responsive" style="margin-top:20px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="2%">ID</th>
                                <th width="38%">Nama Gejala</th>                               
                                <th width="38%">Penyebab</th>                               
                                <th width="28%">Relasi Gejala</th>    
                            </tr>
                        </thead>
                        <tbody>
                             
                            <tr>
                                <td>{{$penyakit->id}}</td>
                                <td>{{$penyakit->nama}}</td>
                                <td>{{$penyakit->penyebab}}</td>
                                <td align="justify">{{$penyakit->gejala}}</td>                                
                            </tr>
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection