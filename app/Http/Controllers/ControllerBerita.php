<?php

namespace App\Http\Controllers;

use App\tb_berita;
use Illuminate\Http\Request;

class ControllerBerita extends Controller
{
    public function readberita(){
        $pengumuman = tb_berita::all();
        return view('admin\pengumumanadmin',compact('pengumuman'));
        }
}
