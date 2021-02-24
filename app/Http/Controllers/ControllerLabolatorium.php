<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_laboratorium;

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
            $file_name = time()."_".$file->getClientOriginalName();
            $file->move(public_path().$pop_path, $file_name);
            tb_laboratorium::create([
                'nama_lab'=>$request->nama_lab,
                'alamat'=>$request->alamat,
                'no_telp'=>$request->no_telp,
                'foto_lab'=>$file_name,
            ]);
            return /* tydac tahu */ ;
        };
    }
}
