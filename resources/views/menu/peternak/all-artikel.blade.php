@section('title') - Dashboard @endsection
@extends('layout.app-user')
@section('body')
@if(session('sukses'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('sukses')}}
  </div>
@endif
<div class="row page-titles">
    <div class="col-md-6 col-6 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Artikel</h3>        
    </div>                      
</div>
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($artikel as $artikel)
                        <div class="card" style="margin-left:20px;width: 25rem;">
                            <img style="padding:10px;margin-left:0px;" witdh="320px" height="240px" src="{{asset('../images/artikel/'.$artikel->gambar)}}" class="img-fluid" alt="{{$artikel->judul}}">
                            <div class="card-body" style="padding:10px;margin-left:0px;">
                                <a href="/artikel/{{$artikel->id}}/tampil" ><h4 href="/artikel/{{$artikel->id}}/tampil" class="card-title"><b>{{$artikel->judul}}</b></h4></a>                                
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>                            
                        </div>                
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection