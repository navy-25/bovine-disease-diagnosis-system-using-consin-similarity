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
                <div class="row" >
                    <h1 class="col-9"><b>{{$data_penyakit->nama}}</b></h1>      
                    <div class="col-3">
                        <a style="float:right" href="\datapenyakit" class="btn btn-secondary"><i class="fa fa-chevron-left m-r-10"></i>Kembali</a>        
                    </div>
                </div>
                <div class="row">
                    <p style="margin-top:-5px" class="col card-title">Dibuat pada   : {{$data_penyakit->created_at}}, Diupdate pada : {{$data_penyakit->updated_at}}</p> 
                    </div>          
                    <img style="align:center;padding:10px;margin-left:0px;"  src="{{$data_penyakit->getDokumentasi()}}" class="card-img-top" alt="{{$data_penyakit->judul}}">                            
                    <h4 class="col card-title" style="margin-top:30px">Penjelasan Dasar </h4>     
                    <h5 class="col card-title" style="text-align:justify">{{$data_penyakit->deskripsi}}</h5>                         
                    <h4 class="col card-title" style="margin-top:30px">Penularan </h4>     
                    <h5 class="col card-title">{{$data_penyakit->penularan}}</h5>                         
                    <h4 class="col card-title" style="margin-top:30px">Gejala </h4>     
                    <h5 class="col card-title">{{$data_penyakit->gejala}}</h5>                                     
                    <h4 class="col card-title" style="margin-top:30px">Penanganan</h4>     
                    <h5 class="col card-title">{{$data_penyakit->penanganan}}</h5>                         
                    <a href="/datapenyakit/{{$data_penyakit->id}}/edit" style="margin-left:10px;width:100px" class="btn btn-warning">
                    <i class="fa fa-edit m-r-10"></i>Edit
                    </a>                   
                </div>                                                             
            </div>
        </div>
    </div>
</div>
@endsection