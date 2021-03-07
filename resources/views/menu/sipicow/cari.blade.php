@extends('layout.app')
@section('body')

<div class="page-header clear-filter" filter-color="orange" >
  <div class="page-header-image" style="margin-left:-10px;filter:blur(3px);background-image:url({{asset('../front/img/bglogin.jpg')}});witdh:105%;height:105%"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-7 ml-auto mr-auto" style="border-radius:37px;">
            <h2 style="color:white"><b>WELCOME TO SIPICOW</b></h2>            
            <form >
                <div class="form-group">                    
                <form class="app-search p-l-20">
                      <input type="text" name="cari"  class="form-control" placeholder="Cari disini"> <a class="srh-btn"><i class="ti-search"></i></a>
                  </form>
                </div>                
            </form>
        </div>        
      </div>  
      <div class="container " style=" ">    
         <div class="col-md ml-auto mr-auto" style="margin-top:20px;border-radius:37px;">
            <div class="">
                 <div class="">
                   Hasil Pencarian : 
                  </div>
                    <div class="card-body">   
                    @foreach($penyakit as $penyakit)
                        <tr>
                            <td align="justify">{{$penyakit->deskripsi}}</td>                                
                        </tr>
                    @endforeach                        
                  </div>
                </div>
             </div>          
        </div> 
                    
      <footer class="footer">      
        <small>
        © 2019 Sistem Informasi Pakar Sapi - Envy Team    
        </small>
      </footer>
    </div>
  </div>
</div>
@endsection