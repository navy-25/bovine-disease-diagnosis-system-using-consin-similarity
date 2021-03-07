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
        @foreach($data_penyakit as $penyakit)
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$penyakit->nama}}</h3>
                <p><b></b>Deskripsi : </b><br>{{$penyakit->deskripsi}}<br><br><b>Gejala : </b><br> {{$penyakit->gejala}}
                </p>
            </div>
        </div>
        @endforeach      
    </div>
</div>
@endsection