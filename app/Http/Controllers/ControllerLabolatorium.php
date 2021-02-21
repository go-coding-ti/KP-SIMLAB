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
}
