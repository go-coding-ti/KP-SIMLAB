<?php

namespace App\Http\Controllers\TeknisiLab;

use App\tb_laboran;
use App\tb_laboratorium;
use Illuminate\Support\Facades\Auth;

class TeknisiLabUtilities
{
    public static function sideBarMenu(){
        $hakAkses = tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','teknisi')->with('labRelation')->get();
        return $hakAkses;
    }

    public static function getLab($id){
        $labData = tb_laboratorium::where('id_laboratorium',$id)->first();
        if($labData){
            return $labData;
        }
    }

    public static function getMyLabID(){
        $labData = tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','teknisi')->with('labRelation')->get();
        $myIdLab = array();
        foreach ($labData as $lb){
            $myIdLab[] = $lb->id_laboratorium;
        }
        return $myIdLab;
    }
}
