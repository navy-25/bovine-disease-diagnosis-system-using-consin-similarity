@extends('layout.master2')
@section('body')
@if(session('sukses'))
  <div class="alert alert-success alert-sm" role="alert">
    {{session('sukses')}}
  </div>
@endif
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">User</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Pakar</li>
        </ol>
    </div>                    
</div>
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Daftar Pakar</h3>
                <div class="table-responsive" style="margin-top:20px">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Spesialis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $k => $d)
                            <tr>
                                <td>{{$user->firstItem() + $k}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->telepon}}</td>
                                <td>
                                    {{$d->pakar->spesialis}}
                                </td>
                                <td>                                                                       
                                    <a href="{{url('user/'.$d->id.'/detail')}}" class="btn btn-info btn-sm">
                                        <i class=" fa fa-eye"></i>
                                    </a>
                                    <a href="{{url('user/'.$d->id.'/unset-expert')}}" class="btn btn-sm btn-warning" title="Hapus Status Pakar" onclick="return confirm('Apakah Anda yakin ingin menghapus status pakar pengguna ini?')">
                                        <i class="fa fa-user-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$user->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection