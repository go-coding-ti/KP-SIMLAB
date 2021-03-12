<?php

namespace App\Http\Controllers\KetuaLab;

use App\tb_laboran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Utilities
{
    public static function sideBarMenu(){
        $hakAkses = tb_laboran::where('id_user',Auth::user()->id)->first();
        if($hakAkses){
            if($hakAkses->hak_akses=='kepala lab'){
                $hakAkses = tb_laboran::where('id_user',Auth::user()->id)->with('labRelation')->get();
                return $hakAkses;
            }
        }
    }

}
