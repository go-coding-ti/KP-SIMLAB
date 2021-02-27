<?php

namespace App\Http\Controllers;

use App\tb_berita;
use App\tb_laboratorium;

use Illuminate\Http\Request;

class ControllerBerita extends Controller
{
    public function readberita(){
        $pengumuman = tb_berita::orderBy('id_berita','DESC')->get();
        return view('admin\beritaadmin',compact('pengumuman'));
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

    public function editberita($id){
    	$beritas = tb_berita::with('relasiBeritaToLaboratorium')->find($id);
        $labs = tb_laboratorium::all();
    	return view('admin\formupdateberita',compact('beritas','labs'));
    }

    public function updateberita(Request $request){
        $updateBerita = tb_berita::find($request->id_berita);
        $updateBerita->judul = $request->judul;
        $updateBerita->isi = $request->isi;
        $updateBerita->save();
        return redirect('/beritaadmin')->with('success','Data berhasil diupdate!');
    }

    public function deleteBerita($id){
        $deleteBerita = tb_berita::find($id);
        $deleteBerita->delete();
        return redirect('/beritaadmin')->with('success','Data berhasil didelete!');
    }

}
