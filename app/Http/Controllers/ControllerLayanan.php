<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_layanan;

class ControllerLayanan extends Controller
{
    public function readLayanan(){
    $layanan = tb_layanan::all();
    return view('admin\layananadmin',compact('layanan'));
    }

    public function create(Request $request)
    {
    	\App\tb_layanan::create($request -> all());
    	return redirect('/layananadmin') -> with('success','Data berhasil disimpan!');
    }
}
