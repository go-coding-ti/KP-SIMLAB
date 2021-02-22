<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::get('/peminjamanadmin','ControllerPeminjaman@readPeminjaman')->name('ReadAllPeminjaman');
// layanan
route::get('/layananadmin','ControllerLayanan@readLayanan');
Route::post('/layananadmin/create','ControllerLayanan@createLayanan');
Route::get('/layananadmin/{id}/edit','ControllerLayanan@edit');
Route::post('/layananadmin/update','ControllerLayanan@updateLayanan');
Route::get('/layananadmin/{id}/delete','ControllerLayanan@deleteLayanan');
// berita
route::get('/beritaadmin','ControllerBerita@readberita');
// bidang
route::get('/bidangadmin','ControllerBidang@readbidang');
// lab
route::get('/laboratoriumadmin','ControllerLabolatorium@readLab');


