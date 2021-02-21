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
route::get('/layananadmin','ControllerLayanan@readLayanan');
route::get('/beritaadmin','ControllerBerita@readberita');
route::get('/bidangadmin','ControllerBidang@readbidang');
route::get('/laboratoriumadmin','ControllerLabolatorium@readLab');


