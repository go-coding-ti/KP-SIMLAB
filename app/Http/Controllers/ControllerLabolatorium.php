<?php

namespace App\Http\Controllers;

use App\tb_layanan;
use Illuminate\Http\Request;
use App\tb_laboratorium;
use Illuminate\Support\Str;

class ControllerLabolatorium extends Controller
{
    public function readLab(){
        $lab = tb_laboratorium::all();
        return view('admin\laboratoriumadmin',compact('lab'));
    }

    public function createLab(Request $request){
        if($request->hasFile('gambar')){
            $pop_path = '/images/';
            $file = $request->file('gambar');
            $file_name = Str::random(20).".".$file->getClientOriginalExtension();
            $file->move(public_path().$pop_path, $file_name);
            tb_laboratorium::create([
                'nama_lab'=>$request->nama_lab,
                'alamat'=>$request->alamat,
                'no_telp'=>$request->no_telp,
                'foto_lab'=>$file_name,
            ]);
            return redirect('/laboratoriumadmin')->with('success','Data berhasil dibuat!');
        } else {
            return redirect('/laboratoriumadmin')->with('error','Data tidak berhasil dibuat!');;
        };
    }

    public function updateLab(Request $request){
        if($request->hasFile('gambar')){
            $pop_path = '/images/';
            $file = $request->file('gambar');
            $file_name = Str::random(20).".".$file->getClientOriginalExtension();
            $file->move(public_path().$pop_path, $file_name);
            $dataLab = tb_laboratorium::find($request->id_lab);
            $dataLab->nama_lab = $request->nama_lab;
            $dataLab->alamat = $request->alamat;
            $dataLab->no_telp = $request->no_telp;
            $dataLab->foto_lab = $file_name;
            $dataLab->save();
            return redirect('/laboratoriumadmin');
        } else {
            $dataLab = tb_laboratorium::find($request->id_lab);
            $dataLab->nama_lab = $request->nama_lab;
            $dataLab->alamat = $request->alamat;
            $dataLab->no_telp = $request->no_telp;
            $dataLab->save();
            return redirect('/laboratoriumadmin')->with('success','Data berhasil diUpdate!');
        };
    }

    public function deleteLab($id){
        $deleteLab = tb_laboratorium::find($id);
        $deleteLab->delete();
        return redirect('/laboratoriumadmin')->with('success','Data berhasil didelete!');
    }
}
