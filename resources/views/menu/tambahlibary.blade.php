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
                    <h3 class="col-6 card-title">Tambah Libary Penyakit</h3>        
                    <div class="col-6">
                        <a style="float:right" href="\home" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <form action="/tambahlibarystore" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}} <!-- token random caracter -->
                    <div class="form-group">
                        <label for="nama">Nama Penyakit</label> 
                        <input type="text" class="form-control" name="nama">                
                    </div>
                    <div class="form-group">
                        <label for="penyebab">Penyebab</label> 
                        <input type="text" class="form-control" name="penyebab">                
                    </div>
                    <div class="form-group">
                        <label for="penyebaran">Penyebaran</label> 
                        <textarea class="form-control" rows="7" name="penyebaran"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pengobatan">Pengobatan</label> 
                        <textarea class="form-control" rows="7" name="pengobatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pencegahan">Pencegahan</label> 
                        <textarea class="form-control" rows="7" name="pencegahan"></textarea>
                    </div>                    
                    <div class="form-group">                        
                        <button type="submit" class="btn btn-success" style="padding-left:20px;padding-right:20px">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection