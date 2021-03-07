@extends('layout.app-user')
@section('body')
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">                
                <div class="row" >
                    <h2 class="col-9"><b>{{$artikel->judul}}</b></h2>      
                    <div class="col-3">
                        <a style="float:right" href="javascript:window.history.back()" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <p style="margin-top:-8px" class="text-weight-light"><i class="fa fa-clock-o"></i> Diupdate: {{$artikel->updated_at}} &middot; <i class="fa fa-pencil"></i> {{$artikel->penulis}} &middot; <i class="fa fa-folder"></i> Artikel</p> 
                <img style="align:center;padding:10px;margin-left:0px;"  src="{{$artikel->getDokumentasi()}}" class="card-img-top" alt="{{$artikel->judul}}">                            
                <h4 style="margin-top:30px">Sinopsis </h4>     
                <p class="text-weight-light text-content">{{$artikel->sinopsis}}</p>                         
                <hr>    
                <p class="text-weight-light text-content">{{$artikel->konten}}</p>            
                <h4 style="margin-top:30px">Sumber </h4>     
                <p class="text-weight-light">{{$artikel->sumber}}</p>                                                               
            </div>
        </div>
    </div>
</div>
@endsection