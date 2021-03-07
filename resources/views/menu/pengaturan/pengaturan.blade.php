@extends(Auth::user()->role=="pakar" ? 'layout.app-expert' : 'layout.master2')
@section('body')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Pengaturan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="beranda">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
    </div>                    
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10"></h4>                    
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material">
                    <div class="form-group">
                        <label class="col-md-12">Nama</label>
                        <label for="example-email" class="col-md-12">{{Auth::user()->name}}</label>      
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <label for="example-email" class="col-md-12">{{Auth::user()->email}}</label>                      
                    </div>                                               
                </form>
            </div>
        </div>
    </div>
</div>
@endsection