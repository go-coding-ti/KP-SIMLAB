<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_laboratorium;
use Illuminate\Http\Request;

class KetuaLabBeritaController extends Controller
{
    public function index($id){
        $menuSidebar = Utilities::sideBarMenu();
        $beritaLab = tb_laboratorium::where('id_laboratorium',$id)->with('berita')->first();
        return view('KetuaLab.beritaLab',compact('menuSidebar','beritaLab'));
    }
}
