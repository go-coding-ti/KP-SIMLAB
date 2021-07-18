<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\tb_laboratorium;
use App\tb_berita;
use App\tb_carts;
use App\tb_bidang;
use App\tb_layanan;

class CartsController extends Controller
{
    public function index(){
        $Laboratorium = tb_laboratorium::all();
        $Berita = tb_berita::all();
        $carts =[];
        if(!is_null(Auth::user())){
            // $carts = tb_carts::with('laboratorium','user')->where('id_user',Auth::user()->id)->get();
            $carts = tb_carts::with('laboratorium.relasiLaboratoriumToBidang','user')->where('id_user',Auth::user()->id)->where('status','cart')->get();
        }

        return view('UserPage.checkout',compact('Laboratorium','Berita','carts'));
    }
    public function layanan(Request $request){
        $bidangs = tb_bidang::with('relasiBidangtoLayanan')->where('id_bidang',$request->id_bidang)->get();
        $string = '<option value="0">Pilih Layanan</option>';
        foreach ($bidangs[0]->relasiBidangtoLayanan as $layanan){
            $string = $string.'<option value="'.$layanan->id_layanan.'">'.$layanan->nama_layanan.'</option>';
        }
        return response()->json(['success' => 'berhasil','layanan'=>$string]);

    }
    public function total(Request $request){
        $getLayanan = tb_layanan::find($request->id);
        return response()->json(['success' => 'berhasil','layanan'=>$getLayanan]);
    }

    public function hapus(Request $request){
        $getcart = tb_carts::find($request->id_cart);
        $getcart->status = "batal";
        $getcart->save();
        
        $carts = tb_carts::with('laboratorium','user')->where('id_user',Auth::user()->id)->where('status','cart')->get();
        $jumlahcarts = $carts->count();
        return response()->json(['success' => 'berhasil','jumlahcarts'=>$jumlahcarts]);
    }
}
