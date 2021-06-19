<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tb_laboratorium;
use App\tb_berita;

class StoreController extends Controller
{
    public function index(){
        $Laboratorium = tb_laboratorium::paginate(9);
        $Berita = tb_berita::all();
        return view('UserPage.store',compact('Laboratorium','Berita'));
    }

    public function show($id){
        $getLaboratorium = tb_laboratorium::where('id_laboratorium',$id)->get();
        $Berita = tb_berita::all();
        return view('UserPage.product',compact('getLaboratorium','Berita'));
    }

    public function search(Request $request){
        $Laboratorium = tb_laboratorium::where('nama_lab','like','%'.$request->search.'%')->get();
        $Berita = tb_berita::all();
        return view('UserPage.store',compact('Laboratorium','Berita'));
    }
}
