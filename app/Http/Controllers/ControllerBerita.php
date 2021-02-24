<?php

namespace App\Http\Controllers;

use App\tb_berita;
use Illuminate\Http\Request;

class ControllerBerita extends Controller
{
    public function readberita(){
        $pengumuman = tb_berita::orderBy('id_berita','DESC')->get();
        return view('admin\pengumumanadmin',compact('pengumuman'));
    }
    public function addberita(){
        return view('admin\formberita');
    }
    public function createberita(Request $request)
    {
    	tb_berita::create([ 
            'id_laboratorium'=>$request->id_laboratorium,
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            ]);
    	return redirect('/beritaadmin')->with('success','Data berhasil disimpan!');
    }

}
