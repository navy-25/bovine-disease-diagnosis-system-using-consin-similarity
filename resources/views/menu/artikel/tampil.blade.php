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
                <div class="row" >
                    <h1 class="col-9"><b>{{$artikel->judul}}</b></h1>      
                    <div class="col-3">
                        <a style="float:right" href="\list_artikel" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <div class="row">
                    <p style="margin-top:-5px" class="col card-title">Dibuat pada   : {{$artikel->created_at}}, Diupdate pada : {{$artikel->updated_at}}</p> 
                </div>          
                <img style="align:center;padding:10px;margin-left:0px;"  src="{{$artikel->getDokumentasi()}}" class="card-img-top" alt="{{$artikel->judul}}">                            
                <h4 class="col card-title" style="margin-top:30px">Sinopsis </h4>     
                <h5 class="col card-title">{{$artikel->sinopsis}}</h5>                         
                <h4 class="col card-title" style="margin-top:30px">Konten </h4>     
                <h5 class="col card-title">{{$artikel->konten}}</h5>                         
                <h4 class="col card-title" style="margin-top:30px">Ditulis oleh </h4>     
                <h5 class="col card-title">{{$artikel->penulis}}</h5>                         
                <h4 class="col card-title" style="margin-top:30px">Sumber </h4>     
                <h5 class="col card-title">{{$artikel->sumber}}</h5>                         
                <a href="/artikel/{{$artikel->id}}/edit" style="margin-left:10px;width:100px" class="btn btn-warning">
                <i class="fa fa-edit m-r-10"></i>Edit
                </a>                                                                
            </div>
        </div>
    </div>
</div>
@endsection