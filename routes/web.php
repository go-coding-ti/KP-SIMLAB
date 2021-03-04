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


route::get('/','LoginController@index')->middleware('guest');

route::post('/logins','LoginController@login')->name('logins');
route::get('/logouts','LoginController@logout')->name('logouts');

Route::group(['middleware'=>'AdminMiddleware'],function(){
    route::get('/peminjamanadmin','ControllerPeminjaman@readPeminjaman')->name('ReadAllPeminjaman');
    // layanan
    route::get('/layananadmin','ControllerLayanan@readLayanan');
    Route::post('/layananadmin/create','ControllerLayanan@createLayanan');
    Route::get('/layananadmin/{id}/edit','ControllerLayanan@edit');
    Route::post('/layananadmin/update','ControllerLayanan@updateLayanan');
    Route::get('/layananadmin/{id}/delete','ControllerLayanan@deleteLayanan');
    // berita
    route::get('/beritaadmin','ControllerBerita@readberita');
    route::get('/beritaadmin/addberita','ControllerBerita@addberita');
    Route::post('/beritaadmin/create','ControllerBerita@createberita');
    Route::get('/beritaadmin/{id}/edit','ControllerBerita@editberita');
    route::post('/beritaadmin/update','ControllerBerita@updateberita')->name('updateBerita');
    Route::delete('/beritaadmin/delete/{id}','ControllerBerita@deleteBerita');

    // bidang
    route::get('/bidangadmin','ControllerBidang@readbidang');
    route::post('/bidangadmin/create','ControllerBidang@createBidang')->name('createBidang');
    route::post('/bidangadmin/update','ControllerBidang@updateBidang')->name('updateBidang');
    route::delete('/bidangadmin/delete/{id}','ControllerBidang@deleteBidang')->name('deleteBidang');

    // lab
    route::get('/laboratoriumadmin','ControllerLabolatorium@readLab');
    route::post('/laboratoriumadmin/create','ControllerLabolatorium@createLab')->name('createLab');
    route::post('/laboratorioumadmin/update','ControllerLabolatorium@updateLab')->name('updateLab');
    route::delete('/laboratorium/delete/{id}','ControllerLabolatorium@deleteLab')->name('deleteLab');
});


route::get('/laboran',function (){
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
