<?php

use App\Http\Controllers\KetuaLab\Utilities;
use App\Http\Controllers\TeknisiLab\TeknisiLabUtilities;
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
    return view('UserPage.store');
});



Route::get('/', 'Users\StoreController@index')->name('store');

Route::get('/user-test-page',function (){
    return view('UserPage.userProfile');
});

route::get('/logins','LoginController@index')->middleware('guest')->name('logins');
route::post('/search', 'Users\StoreController@search')->name('search');
route::post('/Cartpenyewaan','Users\StoreController@AddCart')->name('addcart');
route::post('/layanan','Users\CartsController@layanan')->name('layanan');
route::post('/total','Users\CartsController@total')->name('total');
route::get('/checkout','Users\CartsController@index');
// Route::get('/store-test-page',function (){
//     return view('UserPage.store');
// });

// Route::get('/product-detail-test-page',function (){
//     return view('UserPage.product');
// });

Route::get('/Laboratorium/{id}','Users\StoreController@show');

Route::get('/checkout-test-page',function (){
    return view('UserPage.checkout');
});

Route::get('/log-berita',function (){
    return view('PimpinanLab.activityLogBerita');
});

Route::get('/log-bidang',function (){
    return view('PimpinanLab.activityLogBidang');
});

Route::get('/log-laboratorium',function (){
    return view('PimpinanLab.activityLogLaboratorium');
});

Route::get('/log-layanan',function (){
    return view('PimpinanLab.activityLogLayanan');
});

Route::get('/laporan-test',function (){
    return view('laporan');
});

route::post('/log/layanan','Pimpinan\activityLog@logLayanan');
route::post('/log/view/layanan','Pimpinan\activityLog@viewLogLayanan');

route::post('/log/laboratorium','Pimpinan\activityLog@logLaboratorium');
route::post('/log/view/laboratorium','Pimpinan\activityLog@viewLogLaboratorium');

route::post('/log/bidang','Pimpinan\activityLog@logBidang');
route::post('/log/view/bidang','Pimpinan\activityLog@viewLogBidang');

route::post('/log/berita','Pimpinan\activityLog@logBerita');
route::post('/log/view/berita','Pimpinan\activityLog@viewLogBerita');

route::post('/logins','LoginController@login')->name('logins')->middleware('guest');
route::get('/logouts','LoginController@logout')->name('logouts');



Route::group(['middleware'=>'AdminMiddleware'],function(){
    Route::get('/admin/profile', 'HomeController@profile');
    Route::post('/admin/profile/update','HomeController@editProfile')->name('editProfileAdmin');
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

Route::group(['middleware'=>'KepalaLaboranMiddleware'],function (){
    //Index
    route::get('/kepala','KetuaLab\KetuaLabController@index')->name('ketua-lab-index');
    route::get('/notif/read/{id}', 'KetuaLab\KetuaLabController@readNotif');

    //Peminjaman
    route::get('/kepala/peminjaman/{id}','KetuaLab\KetuaLabPeminjamanController@index')->name('kepala-lab-peminjaman');
    route::get('/kepala/peminjaman/approve/{id}','KetuaLab\KetuaLabPeminjamanController@approval')->name('kepala-lab-approval');
    route::post('/kepala/peminjaman/refuse/','KetuaLab\KetuaLabPeminjamanController@refuse')->name('kepala-lab-refusal');

    //Teknisi
    route::get('/kepala/teknisi/{id}','KetuaLab\KetuaLabTeknisiController@index')->name('kepala-lab-teknisi');
    route::post('/kepala/teknisi/tambah','KetuaLab\KetuaLabTeknisiController@insert')->name('kepala-lab-insert-teknisi');
    route::post('/kepala/teknisi/update','KetuaLab\KetuaLabTeknisiController@update')->name('kepala-lab-update-teknisi');
    route::delete('/kepala/teknisi/delete/{id_user}/{id_lab}','KetuaLab\KetuaLabTeknisiController@delete')->name('kepala-lab-delete-teknisi');

    //Berita
    route::get('/kepala/berita/{id}','KetuaLab\KetuaLabBeritaController@index')->name('kepala-lab-berita');

    //Report
    route::get('/kepala/report/{id}','KetuaLab\KetuaLabReportController@index')->name('kepala-lab-report');

    //Bidang
    route::get('/kepala/bidang/{id}','KetuaLab\KetuaLabBidangController@index');
    route::post('/kepala/bidang/terima','KetuaLab\KetuaLabBidangController@terima');
    route::post('/kepala/bidang/tolak','KetuaLab\KetuaLabBidangController@tolak');

    //Layanan
    route::get('/kepala/layanan/{id}/{bidang}','KetuaLab\KetuaLabLayananController@index');
    route::post('/kepala/layanan/terima','KetuaLab\KetuaLabLayananController@terima');
    route::post('/kepala/layanan/tolak','KetuaLab\KetuaLabLayananController@tolak');
    route::post('/kepala/layanan/terima/hapus','KetuaLab\KetuaLabLayananController@penghapusan');
    route::post('/kepala/layanan/tolak/hapus','KetuaLab\KetuaLabLayananController@tolakPenghapusan');
    route::post('/kepala/layanan/aktifkan','KetuaLab\KetuaLabLayananController@aktifkan');
    route::post('/kepala/layanan/nonaktifkan','KetuaLab\KetuaLabLayananController@nonaktifkan');

    Route::get('/kepala/calendar','KetuaLab\KetuaLabPinjamController@calendar');
    Route::post('/kepala/calendar/view','KetuaLab\KetuaLabPinjamController@ajaxGetPeminjaman');

});

Route::group(['middleware'=>'TeknisiMiddleware'],function (){
    route::get('/teknisi',function (){
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        return view('TeknisiLab.dashboard',compact('menuSidebar'));
    });

    route::get('/teknisi/bidang/{id}/{lab_name}','TeknisiLab\TeknisiLabBidangController@index');
    route::post('/teknisi/bidang/tambah','TeknisiLab\TeknisiLabBidangController@create')->name('tambah-bidang-teknisi');
    route::post('/teknisi/bidang/update','TeknisiLab\TeknisiLabBidangController@update')->name('update-bidang-teknisi');
    route::delete('/teknisi/bidang/delete/{id_bidang}/{nama_bidang}/{id_laboratorium}','TeknisiLab\TeknisiLabBidangController@delete');
    route::get('/teknisi/bidang/delete/batal/{id_bidang}/{nama_bidang}/{id_laboratorium}','TeknisiLab\TeknisiLabBidangController@batal');


    route::get('/teknisi/layanan/{id}/{nama_bidang}','TeknisiLab\TeknisiLabLayananController@index');
    route::post('/teknisi/layanan/tambah','TeknisiLab\TeknisiLabLayananController@create')->name('tambah-layanan-teknisi');
    route::post('/teknisi/layanan/update','TeknisiLab\TeknisiLabLayananController@update')->name('update-layanan-teknisi');
    route::delete('/teknisi/layanan/delete/{id_layanan}/{nama_layanan}/{id_bidang}','TeknisiLab\TeknisiLabLayananController@delete');
    route::get('/teknisi/layanan/delete/batal/{id_layanan}/{nama_layanan}/{id_bidang}','TeknisiLab\TeknisiLabLayananController@batal');

    route::get('/teknisi/{id}/berita','TeknisiLab\TeknisiLabBeritaController@index');
    route::get('/teknisi/berita/tambah','TeknisiLab\TeknisiLabBeritaController@addIndeks')->name('tambah-berita-teknisi');
    route::post('/teknisi/berita/tambah/post','TeknisiLab\TeknisiLabBeritaController@create')->name('tambah-post-berita-teknisi');
    route::get('/teknisi/{id}/berita/update','TeknisiLab\TeknisiLabBeritaController@updateIndex');
    route::post('/teknisi/berita/update/post','TeknisiLab\TeknisiLabBeritaController@update')->name('update-berita-teknisi');
    route::delete('/teknisi/berita/delete/{id}','TeknisiLab\TeknisiLabBeritaController@delete');
});

Route::group(['middleware'=>'PimpinanMiddleware'],function (){
    Route::get('/pimpinan','Pimpinan\PimpinanLabController@index');

    Route::get('/pimpinan/ketua/{id}','Pimpinan\PimpinanAkunKetuaLabController@index');
    Route::post('/pimpinan/ketuas/tambah','Pimpinan\PimpinanAkunKetuaLabController@insert');
    Route::post('/pimpinan/ketua/update','Pimpinan\PimpinanAkunKetuaLabController@update');
    Route::delete('/pimpinan/ketua/delete/{id_user}/{id_lab}','Pimpinan\PimpinanAkunKetuaLabController@delete');

    Route::get('/pimpinan/bidang/{id}','Pimpinan\PimpinanBidangController@index');
    Route::post('/pimpinan/bidang/terima/aktif','Pimpinan\PimpinanBidangController@terimaAktif');
    Route::post('/pimpinan/bidang/tolak/aktif','Pimpinan\PimpinanBidangController@tolakAktif');
    Route::post('/pimpinan/bidang/terima/nonaktif','Pimpinan\PimpinanBidangController@terimaNonaktif');
    Route::post('/pimpinan/bidang/tolak/nonaktif','Pimpinan\PimpinanBidangController@tolakNonaktif');
    Route::post('/pimpinan/bidang/self/aktif','Pimpinan\PimpinanBidangController@selfAktif');
    Route::post('/pimpinan/bidang/self/nonaktif','Pimpinan\PimpinanBidangController@selfNonaktif');

    Route::get('/pimpinan/layanan/{id}','Pimpinan\PimpinanLayananController@index');
    Route::post('/pimpinan/layanan/terima/aktif','Pimpinan\PimpinanLayananController@terimaAktif');
    Route::post('/pimpinan/layanan/tolak/aktif','Pimpinan\PimpinanLayananController@tolakAktif');
    Route::post('/pimpinan/layanan/terima/nonaktif','Pimpinan\PimpinanLayananController@terimaNonaktif');
    Route::post('/pimpinan/layanan/tolak/nonaktif','Pimpinan\PimpinanLayananController@tolakNonaktif');
    Route::post('/pimpinan/layanan/self/aktif','Pimpinan\PimpinanLayananController@selfAktif');
    Route::post('/pimpinan/layanan/self/nonaktif','Pimpinan\PimpinanLayananController@selfNonaktif');

    Route::get('/pimpinan/profile','Pimpinan\PimpinanLabController@profile')->name('profilePimpinan');
    Route::post('/pimpinan/profile/update','Pimpinan\PimpinanLabController@editProfile')->name('editProfilePimpinan');

    Route::post('/pimpinan/getCalendar','Pimpinan\PimpinanLabController@ajaxGetPeminjaman');

    route::get('/pimpinan/calendar','Pimpinan\PimpinanLabController@calendar');
});

Auth::routes();
