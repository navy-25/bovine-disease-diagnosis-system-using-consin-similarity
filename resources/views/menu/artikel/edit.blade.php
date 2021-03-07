@extends(Auth::user()->role=="pakar" ? 'layout.app-expert' : 'layout.master2')
@section('body')
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
                <div class="row"">
                    <h3 class="col-6 card-title">Tambah Artikel</h3>        
                    <div class="col-6">
                        <a style="float:right" href="\list_artikel" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <form action="/artikel/{{$artikel->id}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}} <!-- token random caracter -->
                    <div class="form-group">
                        <label for="judul">Judul</label> 
                        <input type="text" value="{{$artikel->judul}}" class="form-control" name="judul">                
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="penulis">Penulis</label> 
                            <input type="text" value="{{$artikel->penulis}}" class="form-control" name="penulis">
                        </div>
                        <div class="col-6">
                            <label for="sumber">Sumber</label> 
                            <input type="text" value="{{$artikel->sumber}}" class="form-control" name="sumber">                
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="sinopsis">Sinopsis</label> 
                        <textarea class="form-control" rows="7" name="sinopsis">{{$artikel->sinopsis}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label> 
                        <textarea class="form-control" rows="20" name="konten">{{$artikel->konten}}</textarea>
                    </div>
                    <div class="form-group">                        
                        <button type="submit" class="btn btn-success" style="padding-left:20px;padding-right:20px">Simpan</button>
                    </div>
                </form>
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
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection