<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\tb_berita;
use App\tb_peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function penyewaan(){
        $Berita = tb_berita::paginate(3);
        $penyewaan = tb_peminjaman::where('id_peminjam',Auth::user()->id)->with('relasiPeminjamanToLayanan')->get();
        return view('UserPage.profileUser', compact('Berita','penyewaan'));
    }
}
