<?php

namespace App\Http\Controllers;

use App\tb_peminjaman;
use Illuminate\Http\Request;

class ControllerPeminjaman extends Controller
{
    public function readPeminjaman(){
        $data = tb_peminjaman::all();
        return view('admin\homeadmin',compact('data'));
    }
}
