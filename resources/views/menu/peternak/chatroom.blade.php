@section('title') - Tanya Pakar @endsection
@extends('layout.app-user')
@section('body')
@if(session('flashMsg'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('flashMsg')}}
  </div>
@endif
@php
    $auth = Auth::user();
@endphp
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-themecolor">Tanya Pakar</h3>
                <div class="clearfix"></div>
                <table class="table table-striped">
                    <tr>
                        <th style="width: 100px">Tiket</th>
                        <td>
                            <span class="font-weight-bold text-themecolor">#{{ $data->kode }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat</th>
                        <td>{{ $data->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            {!! MyHpr::getStatusChat($data->status) !!}
                        </td>
                    </tr>
                    @if(!empty($data->pakar->user->name))
                        <tr>
                            <th>Pakar</th>
                            <td>{{ $data->pakar->user->name }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mb-3">
        <div class="card card-primary card-outline direct-chat direct-chat-primary">
            <div class="card-header">
                <h3 class="card-title">Ruang Konsultasi</h3>
            </div>
            <div class="card-body">
                <div class="direct-chat-messages">
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                            <a href="" class="direct-chat-name float-right">
                                {{ $data->user->name }} 
                            </a>
                            <span class="direct-chat-timestamp float-left text-small font-italic"><i class="fa fa-clock-o mr-1"></i> {{ MyHpr::getTimeAgo($data->created_at) }}</span>
                        </div>
                        <a href="javascript:void(0)">
                            <img class="direct-chat-img" src="{{ $data->user->getDokumentasi() }}" alt="{{ $data->user->name }}">
                        </a>
                        <div class="direct-chat-text">
                            <span class="font-weight-bold d-block">Pertanyaan:</span>
                            {{ $data->pertanyaan }}
                        </div>
                    </div>
                    <!-- Message. Default to the left -->
                    @foreach ($data->chat as $d)
                        <div class="direct-chat-msg {{ $d->user_id ==  $auth->id ? 'right' : ''}}">
                            <div class="direct-chat-info clearfix">
                                <a href="javascript:void(0)" class="direct-chat-name {{ $d->user_id ==  $auth->id ? 'float-right' : 'float-left'}}">
                                    {{ $d->user->name }} 
                                    {{ $d->pakar_id == $d->user_id ? '<span class="font-italic">(pakar)</span>' : '' }}
                                </a>
                                <span class="direct-chat-timestamp text-small font-italic {{ $d->user_id ==  $auth->id ? 'float-left' : 'float-right'}}"><i class="fa fa-clock-o mr-1"></i> {{ MyHpr::getTimeAgo($d->created_at) }}</span>
                            </div>
                            <a href="javascript:void(0)">
                                <img class="direct-chat-img" src="{{ $d->user->getDokumentasi() }}" alt="{{ $d->user->name }}">
                            </a>
                            <div class="direct-chat-text">
                                {{ $d->pesan }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <form action="{{ url('chat/'.$data->kode.'/save') }}" id="form-msg" method="post">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="pesan" id="msg" placeholder="Ketikkan pesan Anda disini ..." class="form-control" required>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-primary" id="send"><i class="fa fa-send mr-2"></i> Kirim</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection