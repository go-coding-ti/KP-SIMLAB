<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_laboran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KetuaLabController extends Controller
{

    public function index(){
        $menuSidebar = Utilities::sideBarMenu();
        return view('KetuaLab.testing',compact('menuSidebar'));
    }
}
