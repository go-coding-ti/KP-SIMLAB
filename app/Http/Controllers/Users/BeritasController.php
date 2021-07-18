<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\tb_laboratorium;
use App\tb_berita;
use App\tb_carts;

class BeritasController extends Controller
{
    public function index(){
        $Laboratorium = tb_laboratorium::all();
        $Berita = tb_berita::with('relasiBeritaToLaboratorium')->orderBy('id_berita', 'desc')->get();
        $carts =[];
        if(!is_null(Auth::user())){
            $carts = tb_carts::with('laboratorium','user')->where('id_user',Auth::user()->id)->get();
        }

        return view('UserPage.Berita',compact('Laboratorium','Berita'));
    }
}
