@extends('layout.app-expert')
@section('body')
@if(session('sukses'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('sukses')}}
  </div>
@endif
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{$data->getDokumentasi()}}" class="img-circle" width="200" />
                    <h4 style="padding-top:20px; text-transform: uppercase;" class="card-title m-t-10">{{$data->name}}</h4>                        
                </center>
                <table class="table table-striped">
                    <tr>
                        <th style="max-width: 150px;">Spesialis</th>
                        <td class="text-right">{{ $data->pakar->spesialis }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td class="text-right">{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td class="text-right">{{ $data->email }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td class="text-right">{{ $data->telepon }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-themecolor">Pertanyaan</h3>
                <table class="table table-striped">
                    <tr>
                        <th>Tiket</th>
                        <th>Dikirim</th>
                        <th>Oleh</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($chat as $k => $d)
                        <tr>
                            <td>
                                <a href="{{ url('expert/chat/'.$d->kode.'/room') }}">
                                    #{{ $d->kode }}
                                </a>
                            </td>
                            <td>{{ MyHpr::getTimeAgo($d->created_at) }}</td>
                            <td style="text-transform: uppercase;">{{ $d->user->name }}</td>
                            <td>{!! MyHpr::getStatusChat($d->status) !!}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection