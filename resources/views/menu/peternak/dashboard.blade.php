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
                    <input type="text" class="form-control" name="q" placeholder="ketikkan disini..." aria-label="ketikkan disini..." aria-describedby="form-cari" required>
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
        <h3 class="text-themecolor m-b-0 m-t-0">Main Menu</h3>
    </div>                    
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                    <i class="fa fa-user fa-4x"></i>
                    <h4 class="card-title m-t-10">Penyakit Sapi</h4>                    
                </center>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                    <i class="fa fa-user fa-4x"></i>
                    <h4 class="card-title m-t-10">Pengelolaan Sapi</h4>                    
                </center>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <a href="{{ url('chat') }}">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <i class="fa fa-user-md fa-4x"></i>
                        <h4 class="card-title m-t-10">Tanya Pakar</h4>                    
                    </center>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection