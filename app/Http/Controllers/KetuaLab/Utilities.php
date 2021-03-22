<?php

namespace App\Http\Controllers\KetuaLab;

use App\tb_laboran;
use App\tb_laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Utilities
{
    public static function sideBarMenu(){
        $hakAkses = tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->with('labRelation')->get();
        return $hakAkses;
    }

    public static function getLab($id){
        $labData = tb_laboratorium::where('id_laboratorium',$id)->first();
        if($labData){
            return $labData;
        }
    }

    public static function getMyLab(){
        $labData = tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->with('labRelation')->get();
        $myIdLab = array();
        foreach ($labData as $lb){
            $myIdLab[] = $lb->id_laboratorium;
        }
        return $myIdLab;
    }

}
