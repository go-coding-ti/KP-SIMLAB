<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\KetuaLabNotification;
use Illuminate\Support\Facades\Auth;

class KetuaLabBidangController extends Controller
{
    private $id_lab;
    private $id_bidang;
    public function index($id){
        $menuSidebar = Utilities::sideBarMenu();
        $getBidang = tb_bidang::where('id_laboratorium',$id)->get();
        return view('KetuaLab.bidang',compact('menuSidebar','getBidang'));
    }

    public function terima(Request $request){
        $usr = Auth::user();
        $getBidang = tb_bidang::where('id_bidang',$request->id_bidang)->where('nama_bidang',$request->nama_bidang)->firstOrFail();
        $getBidang->status=1;
        $getBidang->save();
        $this->id_lab = $getBidang->id_laboratorium;

            $users = User::with('laboran')->whereHas('laboran', function($q){
                return $q->where('hak_akses', 'teknisi')->where('id_laboratorium',$this->id_lab);
            })->get();

            foreach($users as $user){
                $user->notify(new KetuaLabNotification(1,$this->id_lab,$request->id_bidang,$usr));
            }
        return redirect()->back();
    }

    public function tolak(Request $request){
        $getBidang = tb_bidang::where('id_bidang',$request->id_bidang)->where('nama_bidang',$request->nama_bidang)->firstOrFail();
        $getBidang->status=2;
        $getBidang->save();
        return redirect()->back();
    }
}
