<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_bidang;

class ControllerBidang extends Controller
{
    public function readbidang(){
        $bidang = tb_bidang::with('relasiBidangToLaboratorium')->get();
        return view('admin\bidangadmin',compact('bidang'));
        }
}
