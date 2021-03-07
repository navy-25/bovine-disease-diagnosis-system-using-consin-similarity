<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
Route::get('/', function () {
    return view('menu.beranda');
});
*/
Route::get('/logon', function () {
    return view('layout.master2');
});
Route::get('/', 'MainController@index');
Route::get('/warning', function () {
    return view('warning');
});
Route::get('/semuapenyakit','PenyakitController@penyakithp');
Route::get('/welcome','AuthController@welcome')->name('welcome');
Route::get('/masuk','AuthController@login');
Route::get('/keluar','HomeController@logout');  
Route::get('/sukses', 'AuthController@sukses')->name('sukses');
Route::get('/daftar', 'AuthController@register');
Route::post('/daftar', 'AuthController@postregister');
Route::get('/penyakit','SipicoController@index');
Auth::routes();

Route::group(['middleware'=>['auth','checkRole:admin,pakar']],function(){
    Route::get('/home', 'SipicoController@home')->name('home');
    
    Route::get('/tambahgejala','DiagnosaController@tambahgejala');
    Route::get('/tambahlibary','DiagnosaController@tambahlibary');
    Route::get('/datalibary/{id}/hapus','DiagnosaController@libaryhapus');
    Route::get('/datalibary/{id}/tampil','DiagnosaController@tampil');
    Route::post('/tambahgejalastore','DiagnosaController@store');
    Route::post('/tambahlibarystore','DiagnosaController@libarystore');
    Route::get('/tambahgejala/{id}/hapus','DiagnosaController@hapus');

    Route::get('/datapenyakit','PenyakitController@index');
    Route::get('/datapenyakit/tambah','PenyakitController@tambah');
    Route::post('/datapenyakitstore','PenyakitController@store');
    Route::get('/datapenyakit/{id}/hapus','PenyakitController@hapus');
    Route::get('/datapenyakit/{id}/tampil','PenyakitController@tampil');
    Route::get('/datapenyakit/{id}/edit','PenyakitController@edit');
    Route::post('/datapenyakit/{id}/update','PenyakitController@update');
    
    Route::get('/datapakar','UserPakarController@index');
    Route::post('/datapakarstore','UserPakarController@store');
    Route::post('/datapakar/{id}/update','UserPakarController@update');
    Route::get('/datapakar/{id}/tampil','UserPakarController@tampil');
    Route::get('/datapakar/{id}/hapus','UserPakarController@hapus');
    Route::get('/datapakar/{id}/edit','UserPakarController@edit');
    
    Route::get('/datauser','DataUserController@index');
    Route::post('/datauserstore','DataUserController@store');
    Route::post('/datauser/{id}/update','DataUserController@update');
    Route::get('/datauser/{id}/hapus','DataUserController@hapus');
    Route::get('/datauser/{id}/tampil','DataUserController@tampil');
    
    Route::get('/artikel','ArtikelController@index');
    Route::get('/artikel/tambah','ArtikelController@tambah');
    Route::get('/list_artikel','ArtikelController@index2');
    Route::post('/artikelstore','ArtikelController@store');
    Route::get('/artikel/{id}/hapus','ArtikelController@hapus');
    Route::get('/artikel/{id}/tampil','ArtikelController@tampil');
    Route::post('/artikel/{id}/update','ArtikelController@update');
    Route::get('/artikel/{id}/edit','ArtikelController@edit');
    
      
});


Route::group(['middleware'=>['auth','checkRole:admin']],function(){
    //User Controller
    Route::get('/user/list', 'Admin\UserController@userlist');
    Route::get('/user/expert', 'Admin\UserController@userexpert');
    Route::post('/user/make-expert', 'Admin\UserController@make_expert');
    Route::get('/user/{id}/unset-expert', 'Admin\UserController@unset_expert');
    Route::get('/user/{id}/detail', 'Admin\UserController@detail');
});
Route::group(['middleware'=>['auth','checkRole:user']],function(){
    Route::get('/dashboard', 'Peternak\DashboardController@index')->name('dashboard');
    Route::get('/info/cari', 'Peternak\InfoController@cari');
    Route::post('/info/cek-gejala', 'Peternak\InfoController@cekGejala');
    Route::get('/info/artikel/{id?}', 'Peternak\InfoController@artikel');
    Route::get('/info/penyakit/{id}', 'Peternak\InfoController@penyakit');

    Route::get('/chat', 'Peternak\ChatController@index');
    Route::get('/chat/new', 'Peternak\ChatController@newchat');
    Route::post('/chat/save-new-chat', 'Peternak\ChatController@savenewchat');
    Route::get('chat/{kode}/room', 'Peternak\ChatController@room');
    Route::post('chat/{kode}/save', 'Peternak\ChatController@savechat');

    Route::get('/info/penyakit-sapi', 'Peternak\PenyakitController@index');

    Route::get('/info/pengelolaan-ternak', 'Peternak\TernakController@index');
    Route::get('/info/pengelolaan-ternak/{id}', 'Peternak\TernakController@kategori');

    // info/artikel
    // Route::get('/info/pengelolaan-ternak', 'Peternak\TernakController@index');
});
Route::group(['middleware'=>['auth','checkRole:pakar'], 'prefix'=>'/expert'],function(){
    Route::get('/', 'Pakar\DashboardController@index');
    Route::get('chat/{kode}/room', 'Pakar\ChatController@room');
    Route::post('chat/{kode}/save', 'Pakar\ChatController@savechat');
});
Route::group(['middleware'=>['auth']],function(){
    Route::get('/unread-notif', 'NotifikasiController@getUnreadNotif');
    Route::get('/open-notif/{id}', 'NotifikasiController@openNotif');
    Route::get('/pengaturan','PengaturanController@index'); 
}); 