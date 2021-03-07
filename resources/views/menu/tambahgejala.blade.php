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
                    <h3 class="col-6 card-title">Tambah Gejala</h3>        
                    <div class="col-6">
                        <a style="float:right" href="\home" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <form action="/tambahgejalastore" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}} <!-- token random caracter -->
                    <div class="form-group" >                        
                        <label for="nama">Nama Gejala</label> 
                        <input type="text" style="radius:30px" class="form-control" name="nama">               
                        <button type="submit" class="btn btn-success" style="margin-top:10px;padding-left:20px;padding-right:20px">Tambahkan</button>
                    </div>                                        
                </form>
                <div class="table-responsive" style="margin-top:20px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="2%">ID</th>
                                <th width="78%">Nama Gejala</th>                               
                                <th width="20%">Opsi</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gejala as $gejala)
                            <tr>
                                <td>{{$gejala->id}}</td>
                                <td>{{$gejala->nama}}</td>      
                                <td>                                        
                                    <a href="/tambahgejala/{{$gejala->id}}/hapus"><i onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger fa fa-times m-r-10"></i>                                        
                                </a>
                                </td>                          
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection