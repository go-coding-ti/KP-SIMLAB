<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_laboratorium;
use Illuminate\Http\Request;

class KetuaLabBeritaController extends Controller
{
    public function index($id){
        $check = tb_laboran::where('id_laboratorium',$id)->where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->first();
        if($check){
            $menuSidebar = Utilities::sideBarMenu();
            $beritaLab = tb_laboratorium::where('id_laboratorium',$id)->with('berita')->first();
            return view('KetuaLab.beritaLab',compact('menuSidebar','beritaLab'));
        } return redirect()->back();
    }
}
