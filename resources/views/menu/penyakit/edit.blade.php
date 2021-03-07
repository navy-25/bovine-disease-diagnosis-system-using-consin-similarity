@extends(Auth::user()->role=="pakar" ? 'layout.app-expert' : 'layout.master2')
@section('body')
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
                <div class="row" style="margin-bottom:20px;">
                    <h3 class="col-6 card-title">Edit Data Penyakit</h3>        
                    <div class="col-6">
                        <a style="float:right" href="\datapenyakit" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <form action="/datapenyakit/{{$data_penyakit->id}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}} <!-- token random caracter -->
                    <div class="form-group">
                        <label for="nama">Nama Penyakit</label> 
                        <input type="text" value="{{$data_penyakit->nama}}" class="form-control" name="nama">                
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Penjelasan Dasar</label> 
                        <textarea class="form-control" rows="7" name="deskripsi">{{$data_penyakit->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="penularan">Status Penularan</label>                         
                        <select name="penularan" class="form-control">
                            <option>Menular (Hewan Ternak)</option>
                            <option>Menular (Manusia dan Hewan)</option>
                            <option>Tidak Menular</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gejala">Gejala</label> 
                        <textarea class="form-control" rows="7" name="gejala">{{$data_penyakit->gejala}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="penanganan">Penanganan</label> 
                        <textarea class="form-control" rows="7" name="penanganan">{{$data_penyakit->penanganan}}</textarea>
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
@endsection