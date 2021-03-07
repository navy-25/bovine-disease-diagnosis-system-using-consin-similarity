@extends('layout.app-user')
@section('body')
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">   
                <div class="row" >
                    <h2 class="col-9"><b>{{$penyakit->nama}}</b></h2>      
                    <div class="col-3">
                        <a style="float:right" href="javascript:window.history.back()" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <p style="margin-top:-8px" class="text-weight-light">
                    <i class="fa fa-clock-o"></i> Diupdate: {{$penyakit->updated_at}} &middot; <i class="fa fa-folder"></i> Penyakit</p>         
                <img src="{{$penyakit->getDokumentasi()}}" class="card-img-top" alt="{{$penyakit->judul}}">      

                <h4 class="d-block">Penjelasan Dasar </h4>     
                <p class="text-weight-light text-content">{{$penyakit->deskripsi}}</p>                         
                <h4 class="d-block">Penularan </h4>     
                <p class="text-weight-light text-content">{{$penyakit->penularan}}</p>                         
                <h4 class="d-block">Gejala </h4>     
                <p class="text-weight-light text-content">{{$penyakit->gejala}}</p>                                     
                <h4 class="d-block">Penanganan</h4>     
                <p class="text-weight-light text-content">{{$penyakit->penanganan}}</p>                                                       
            </div>
        </div>
    </div>
</div>
@endsection