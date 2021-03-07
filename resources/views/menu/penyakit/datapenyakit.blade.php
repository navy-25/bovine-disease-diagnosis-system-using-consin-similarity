@extends(Auth::user()->role=="pakar" ? 'layout.app-expert' : 'layout.master2')
@section('body')
@if(session('sukses'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('sukses')}}
  </div>
@endif
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Penyakit</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="beranda">Home</a></li>
            <li class="breadcrumb-item active">Penyakit</li>
        </ol>
    </div>                    
</div>
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data Penyakit (Berdasarkan Kasus tertentu)</h3>
                <span>
                    <form class="row-12 form-inline" method="get">
                        <div class="col-9">
                            <a style="margin:-15px;" href="\datapenyakit\tambah" class="btn btn-primary"><i class="fa fa-plus m-r-10"></i>
                                Tambah Data Penyakit
                            </a>                        
                        </div>                                                
                    </form>                
                </span>                
                <div class="table-responsive" style="margin-top:20px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Nama Penyakit</th>
                                <th width="60%">Deskripsi</th>
                                <th width="15%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_penyakit as $penyakit)
                            <tr>
                                <td>{{$penyakit->id}}</td>
                                <td>{{$penyakit->nama}}</td>
                                <td align="justify">{{$penyakit->deskripsi}}</td>
                                <td>                                    
                                    <a href="/datapenyakit/{{$penyakit->id}}/tampil" style="width:36px"class="btn btn-info fa fa-eye m-r-10"></a>           
                                    <a href="/datapenyakit/{{$penyakit->id}}/hapus" class="btn btn-danger fa fa-times m-r-10"  onclick="return confirm('Apakah anda yakin ?')"></a>
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