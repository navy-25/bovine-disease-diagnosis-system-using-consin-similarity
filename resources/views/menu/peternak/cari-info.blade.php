@section('title') - Dashboard @endsection
@extends('layout.app-user')
@section('body')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Cari apa saja terkait masalah sapi</h3>
    </div>                    
</div>
<div class="row">
    <div class="col">
        <form action="{{url('info/cari')}}" method="get">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="q" placeholder="ketikkan disini..." aria-label="ketikkan disini..." aria-describedby="form-cari" value="{{ $q }}" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h5 class="text-themecolor m-b-0 m-t-0">Hasil pencarian:</h5>
    </div>                    
</div>
@foreach($dt_penyakit->data as $d)
    <div class="row">
        <div class="col">
            <a href="{{ $d->url }}">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="img-square-wrapper">
                                <img style="max-width: 300px"  src="{{$d->gambar}}" class="card-img-top" alt="{{$d->nama}}"> 
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h4>{{ $d->nama }}</h4>
                                <h5>{{$d->gejala}}</h5>
                                <span class="pull-right">
                                    Tingkat kecocokan: {{ $d->mirip }} &middot; <i class="fa fa-folder"></i> Penyakit
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endforeach
@foreach($dt_artikel->data as $d)
    <div class="row">
        <div class="col">
            <a href="{{ $d->url }}">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="img-square-wrapper">
                                <img style="max-width: 300px"  src="{{$d->gambar}}" class="card-img-top" alt="{{$d->judul}}"> 
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h4>{{ $d->judul }}</h4>
                                <h5>{{$d->sinopsis}}</h5>
                                <span class="pull-right">
                                    Tingkat kecocokan: {{ $d->mirip }} &middot; <i class="fa fa-folder"></i> Artikel
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endforeach
@endsection