<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\tb_carts;
use App\tb_layanan;
use App\tb_peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function pinjam(Request $request){
        $layanan = $request->layanan;
        $date = $request->event_date;
        $qty = $request->qty;
        foreach ($layanan as $index => $layanans){
            $dataLayanan = tb_layanan::find($layanans);
            tb_peminjaman::create([
                'id_peminjam'=>Auth::user()->id,
                'id_layanan'=>$layanans,
                'tgl_order'=>Carbon::now(),
                'tgl_pinjam'=>$date[$index],
                'jumlah'=>$qty[$index],
                'satuan'=>$dataLayanan->satuan,
                'harga'=>$dataLayanan->harga,
                'total_harga'=>$dataLayanan->harga * $qty[$index],
            ]);
        }

        $dataCarts = tb_carts::where('id_user',Auth::user()->id)->where('status','cart')->get();
        foreach ($dataCarts as $disewa){
            $disewa->status = 'disewa';
            $disewa->save();
        }
        return redirect('/');
    }

    public function pinjamsatu(Request $request){
        $layanan = $request->layanan;
        $date = $request->event_date;
        $qty = $request->qty;
        foreach ($layanan as $index => $layanans){
            $dataLayanan = tb_layanan::find($layanans);
            tb_peminjaman::create([
                'id_peminjam'=>Auth::user()->id,
                'id_layanan'=>$layanans,
                'tgl_order'=>Carbon::now(),
                'tgl_pinjam'=>$date[$index],
                'jumlah'=>$qty[$index],
                'satuan'=>$dataLayanan->satuan,
                'harga'=>$dataLayanan->harga,
                'total_harga'=>$dataLayanan->harga * $qty[$index],
            ]);
        }
        return redirect('/');
    }

}
