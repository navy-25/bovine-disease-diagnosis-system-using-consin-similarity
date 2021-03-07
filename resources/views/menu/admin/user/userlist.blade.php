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
            <li class="breadcrumb-item active">Userlist</li>
        </ol>
    </div>                    
</div>
<div class="row" data-spy="scroll" data-offset="0"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Daftar User</h3>
                <div class="table-responsive" style="margin-top:20px">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Status</th>
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
                                    @if($d->role=='admin')
                                        <span class="label label-primary">{{$d->role}}</span>
                                    @elseif($d->role=='user')
                                        <span class="label label-warning">{{$d->role}}</span>
                                    @elseif($d->role=='pakar')
                                        <span class="label label-success">{{$d->role}}</span>
                                    @endif
                                </td>
                                <td>                                                                       
                                    <a href="{{url('user/'.$d->id.'/detail')}}" class="btn btn-info btn-sm">
                                        <i class=" fa fa-eye"></i>
                                    </a>
                                    @if($d->role=='user')
                                        <button class="btn btn-sm btn-success" title="Jadikan Pakar" onclick="modalSetPakar('{{$d->id}}', '{{$d->name}}')">
                                            <i class="fa fa-user-md"></i>
                                        </button>
                                    @elseif($d->role=='pakar')
                                        <a href="{{url('user/'.$d->id.'/unset-expert')}}" class="btn btn-sm btn-warning" title="Hapus Status Pakar" onclick="return confirm('Apakah Anda yakin ingin menghapus status pakar pengguna ini?')">
                                            <i class="fa fa-user-times"></i>
                                        </a>
                                    @endif 
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

<!-- Modal Tambah-->
<div class="modal fade" id="modal-setPakar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color:#399993" class="modal-title" id="exampleModalLabel"><b>Jadikan Pakar</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('user/make-expert')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label>Nama</label> 
                        <input type="text" class="form-control" name="nama" id="nama" disabled>                
                    </div>
                    <div class="form-group">
                        <label for="nama">Spesialis</label> 
                        <input type="text" class="form-control" name="spesialis" placeholder="ketikkan spesialis pakar disini..." required>                
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Proses <i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js-action')
<script type="text/javascript">
    function modalSetPakar(id, nama) {
        $("#modal-setPakar #user_id").val(id);
        $("#modal-setPakar #nama").val(nama);
        $("#modal-setPakar").modal('toggle');
    }
</script>
@endsection