@extends('layout.master2')
@section('body')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
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
                <h3 class="card-title">Data Penyakit</h3>
                <span>
                    <form class="row-12 form-inline" method="get">
                        <div class="col">
                            <a style="margin-left:-15px;" href="/tambahlibary" class="btn btn-primary"><i class="fa fa-plus m-r-10"></i>
                                Tambah Libary Penyakit
                            </a>                        
                            <a style="margin-left:25px;" href="/tambahgejala" class="btn btn-warning"><i class="fa fa-plus m-r-10"></i>
                                Lihat List Gejala
                            </a>                                                  
                    </form>                
                </span>           
                <div class="table-responsive" style="margin-top:20px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="2%">ID</th>
                                <th width="20%">Nama Penyakit</th>
                                <th width="33%">Penyebab</th>
                                <th width="20%">Gejala</th>
                                <th width="20%">Opsi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diagnosa as $diagnosa)
                            <tr>
                                <td>{{$diagnosa->id}}</td>
                                <td>{{$diagnosa->nama}}</td>
                                <td align="justify">{{$diagnosa->penyebab}}</td>                  
                                <td>{{$diagnosa->gejala}}</td>
                                <td>                                                                       
                                    <a href="/datalibary/{{$diagnosa->id}}/tampil" style="width:36px"class="btn btn-info fa fa-eye m-r-10"></a>           
                                    <a href="/datalibary/{{$diagnosa->id}}/hapus" class="btn btn-danger fa fa-times m-r-10"  onclick="return confirm('Apakah anda yakin ?')"></a>
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