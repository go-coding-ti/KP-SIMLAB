<?php

namespace App\Http\Controllers\Users;

use App\file_peminjaman;
use App\Http\Controllers\Controller;
use App\tb_berita;
use App\tb_peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function penyewaan()
    {
        $Berita = tb_berita::paginate(3);
        $penyewaan = tb_peminjaman::where('id_peminjam', Auth::user()->id)->with('relasiPeminjamanToLayanan','progress')->orderBy('tgl_order','DESC')->get();
        return view('UserPage.profileUser', compact('Berita', 'penyewaan'));
    }

    public function uploadBuktiPembayaran(Request $request)
    {
        $filename = "";
        $buktiPembayaran = tb_peminjaman::find($request->id);
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path().'/bukti_pembayaran/',$filename);
            $buktiPembayaran->bukti_pembayaran = $filename;
            $buktiPembayaran->tgl_bayar = Carbon::now();
            $buktiPembayaran->is_paid = true;
            $buktiPembayaran->save();
            return redirect()->back()->with('success','Bukti pembayaran telah diupload');
        }
        return redirect()->back()->with('errors','Bukti pembayaran gagal diupload');
    }

    public function perbaikanFile(Request $request)
    {
        $filename = "";
        $buktiPembayaran = tb_peminjaman::find($request->id);
        if(!is_null($buktiPembayaran)){
            if ($request->hasFile('file')){
                foreach ($request->file('file') as $file){
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path().'/file_peminjaman/',$filename);
                    file_peminjaman::create([
                        'id_peminjaman'=>$buktiPembayaran->id_peminjaman,
                        'nama_file'=>$filename,
                    ]);
                }
                $buktiPembayaran->keterangan = 1;
                $buktiPembayaran->save();
                return redirect()->back()->with('success','File peminjaman telah berhasil diperbaiki');
            }
        }
        return redirect()->back()->with('errors','File peminjaman gagal diperbaiki');
    }

}
