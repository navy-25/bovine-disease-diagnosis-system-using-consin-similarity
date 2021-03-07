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
                <h3 class="card-title float-left">Buat Pertanyaan</h3>
                <div class="card-action float-right">
                    <a href="{{ url('chat') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-circle-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('chat/save-new-chat') }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea class="form-control" name="pertanyaan"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection