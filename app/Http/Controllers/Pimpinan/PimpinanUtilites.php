<?php

namespace App\Http\Controllers\Pimpinan;

use App\tb_laboran;
use App\tb_laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PimpinanUtilites
{
    public static function sideBarMenu(){
        $hakAkses = tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','pimpinan')->with('labRelation')->get();
        return $hakAkses;
    }

    public static function getLab($id){
        $labData = tb_laboratorium::where('id_laboratorium',$id)->first();
        if($labData){
            return $labData;
        }
    }

    public static function getMyLabID(){
        $labData = tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','pimpinan')->with('labRelation')->pluck('id_laboratorium');
        return $labData;
    }

    public static function MyLabID($id){
        $labData = tb_laboran::where('id_user',$id)->where('hak_akses','pimpinan')->pluck('id_laboratorium');
        return $labData;
    }

}
