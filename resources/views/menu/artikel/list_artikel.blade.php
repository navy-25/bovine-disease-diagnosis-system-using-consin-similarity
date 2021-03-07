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
                <div class="table-responsive" style="margin-top:50px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Judul</th>
                                <th width="25%">Penulis</th>
                                <th width="20%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artikel as $artikel)
                            <tr>
                                <td>{{$artikel->id}}</td>
                                <td>{{$artikel->judul}}</td>
                                <td>{{$artikel->penulis}}</td>
                                <td>
                                    <a href="/artikel/{{$artikel->id}}/tampil" style="width:36px" class="btn btn-info fa fa-eye m-r-10"></a>           
                                    <a href="/artikel/{{$artikel->id}}/hapus" class="btn btn-danger fa fa-times m-r-10"  onclick="return confirm('Apakah anda yakin ?')"></a>
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


<!--  Modal content for the above exMonster -->
<div class="modal fade" id="bs-exMonster-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color:#399993" class="modal-title" id="exampleModalLabel"><b>Tambah Artikel</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/datauserstore" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}} <!-- token random caracter -->
                    <div class="form-group">
                        <label for="judul">Judul</label> 
                        <input type="text" class="form-control" name="judul">                
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label> 
                        <input type="text" class="form-control" name="penulis">
                    </div>
                    <div class="form-group">
                        <label for="sumber">Sumber</label> 
                        <input type="text" class="form-control" name="sumber">                
                    </div>
                    <div class="form-group">
                        <label for="sinopsis">Sinopsis</label> 
                        <textarea class="form-control" rows="3" name="sinopsis"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label> 
                        <textarea class="form-control" rows="3" name="konten"></textarea>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection