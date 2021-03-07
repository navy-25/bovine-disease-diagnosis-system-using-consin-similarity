@section('title') - Tanya Pakar @endsection
@extends('layout.app-user')
@section('body')

<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Tanya Pakar</h3>
    </div>                    
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title float-left">Riwayat Pertanyaan</h3>
                <div class="card-action float-right">
                    <a href="{{ url('chat/new') }}" class="btn btn-primary">
                        <i class="fa fa-plus mr-1"></i> Tanya
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($data as $k => $d)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('chat/'.$d->kode.'/room') }}" class="d-block">#{{ $d->kode }}</a>
                    <span class="text-muted">
                        @php
                            echo substr($d->pertanyaan, 0, 160).'...'
                        @endphp
                    </span>
                    <hr>
                    <small class="text-muted">
                        <i class="fa fa-clock-o mr-1"></i> {{ MyHpr::getTimeAgo($d->created_at) }} &middot; 
                        {!! MyHpr::getStatusChat($d->status) !!}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection