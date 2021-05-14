<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\tb_laboratorium;
use Illuminate\Http\Request;

class PimpinanLaboratoriumController extends Controller
{
    public function index($id){
        $getLaboratorium = tb_laboratorium::where('id_laboratorium',$id)->get();
        return view('PimpinanLab.bidang',compact('getLaboratorium'));
    }
}
