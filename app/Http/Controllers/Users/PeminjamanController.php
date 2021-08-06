<?php

namespace App\Http\Controllers\Users;

use App\file_peminjaman;
use App\Http\Controllers\Controller;
use App\progress_penyewaan;
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
        $filename = "";
        foreach ($layanan as $index => $layanans){
            $dataLayanan = tb_layanan::find($layanans);
            $peminjaman = tb_peminjaman::create([
                'id_peminjam'=>Auth::user()->id,
                'id_layanan'=>$layanans,
                'tgl_order'=>Carbon::now(),
                'tgl_pinjam'=>$date[$index],
                'jumlah'=>$qty[$index],
                'satuan'=>$dataLayanan->satuan,
                'harga'=>$dataLayanan->harga,
                'keterangan'=>1,
                'total_harga'=>$dataLayanan->harga * $qty[$index],
            ]);
            foreach ($request->file('file'.$index) as $file){
                $filename = time().$file->getClientOriginalName();
                $file->move(public_path().'/file_peminjaman/',$filename);
                file_peminjaman::create([
                    'id_peminjaman'=>$peminjaman->id_peminjaman,
                    'nama_file'=>$filename,
                ]);
            }
        }

        progress_penyewaan::create([
            'id_peminjaman'=> $peminjaman->id_peminjaman,
            'progress_name'=>'Pengajuan peminjaman kepada laboran',
            'progress_detail'=>'User melakukan pengajuan peminjaman kepada laboran, selanjutnya peminjaman akan dikonfirmasi oleh laboran dalam 24/7 hari',
        ]);

        $dataCarts = tb_carts::where('id_user',Auth::user()->id)->where('status','cart')->get();
        foreach ($dataCarts as $disewa){
            $disewa->status = 'disewa';
            $disewa->save();
        }
        return redirect('/user-transaction-page')->with('success','Peminjaman telah diajukan');
    }

    public function pinjamsatu(Request $request){
        $layanan = $request->layanan;
        $date = $request->event_date;
        $qty = $request->qty;
        foreach ($layanan as $index => $layanans){
            $dataLayanan = tb_layanan::find($layanans);
            $peminjaman = tb_peminjaman::create([
                'id_peminjam'=>Auth::user()->id,
                'id_layanan'=>$layanans,
                'tgl_order'=>Carbon::now(),
                'tgl_pinjam'=>$date[$index],
                'jumlah'=>$qty[$index],
                'satuan'=>$dataLayanan->satuan,
                'keterangan'=>1,
                'harga'=>$dataLayanan->harga,
                'total_harga'=>$dataLayanan->harga * $qty[$index],
            ]);
            foreach ($request->file('file') as $file){
                $filename = time().$file->getClientOriginalName();
                $file->move(public_path().'/file_peminjaman/',$filename);
                file_peminjaman::create([
                    'id_peminjaman'=>$peminjaman->id_peminjaman,
                    'nama_file'=>$filename,
                ]);
            }
            progress_penyewaan::create([
                'id_peminjaman'=> $peminjaman->id_peminjaman,
                'progress_name'=>'Pengajuan peminjaman kepada laboran',
                'progress_detail'=>'User melakukan pengajuan peminjaman kepada laboran, selanjutnya peminjaman akan dikonfirmasi oleh laboran dalam 24/7 hari',
            ]);
        }
        return redirect('/user-transaction-page')->with('success','Peminjaman telah diajukan');
    }

}
