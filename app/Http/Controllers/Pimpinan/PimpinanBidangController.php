<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\KetuaLab\Utilities;
use App\tb_bidang;
use Illuminate\Http\Request;

class PimpinanBidangController extends Controller
{
    public function index($id)
    {
        $getBidang = tb_bidang::where('id_laboratorium', $id)->with('relasiBidangToLaboratorium')->get();
        return view('PimpinanLab.bidang', compact('getBidang'));
    }

    public function terimaNonaktif(Request $request)
    {
        $getBidang = tb_bidang::where('id_bidang', $request->id_bidang)->where('status', 1)->where('status_aktif', 3)->first();
        if ($getBidang) {
            $getBidang->status_aktif = 0;
            $getBidang->keterangan_aktif = null;
            $getBidang->save();
            return redirect()->back()->with('success', 'Bidang telah Nonaktifkan!!');
        }
        return redirect()->back()->with('errors', 'Bidang tidak ditemukan!!');
    }

    public function tolakNonaktif(Request $request)
    {
        $getBidang = tb_bidang::where('id_bidang', $request->id_bidang)->where('status', 1)->where('status_aktif', 3)->first();
        if ($getBidang) {
            $getBidang->status_aktif = 1;
            $getBidang->keterangan_aktif = $request->keterangan_aktif;
            $getBidang->save();
            return redirect()->back()->with('success', 'Bidang telah ditolak!!');
        }
        return redirect()->back()->with('errors', 'Bidang tidak ditemukan!!');
    }

    public function terimaAktif(Request $request)
    {
        $getBidang = tb_bidang::where('id_bidang', $request->id_bidang)->where('status', 1)->where('status_aktif', 2)->first();
        if ($getBidang) {
            $getBidang->status_aktif = 1;
            $getBidang->keterangan_aktif = null;
            $getBidang->save();
            return redirect()->back()->with('success', 'Bidang telah diaktifkan!!');
        }
        return redirect()->back()->with('errors', 'Bidang tidak ditemukan!!');
    }

    public function tolakAktif(Request $request)
    {
        $getBidang = tb_bidang::where('id_bidang', $request->id_bidang)->where('status', 1)->where('status_aktif', 2)->first();
        if ($getBidang) {
            $getBidang->status_aktif = 0;
            $getBidang->keterangan_aktif = $request->keterangan_aktif;
            $getBidang->save();
            return redirect()->back()->with('success', 'Bidang telah ditolak!!');
        }
        return redirect()->back()->with('errors', 'Bidang tidak ditemukan!!');
    }

    public function selfAktif(Request $request)
    {
        $getBidang = tb_bidang::where('id_bidang', $request->id_bidang)->where('status', 1)->where('status_aktif', 0)->first();
        if ($getBidang) {
            $getBidang->status_aktif = 1;
            $getBidang->keterangan_aktif = null;
            $getBidang->save();
            return redirect()->back()->with('success', 'Bidang telah diaktifkan!!');
        }
        return redirect()->back()->with('errors', 'Bidang tidak ditemukan!!');
    }

    public function selfNonaktif(Request $request)
    {
        $getBidang = tb_bidang::where('id_bidang', $request->id_bidang)->where('status', 1)->where('status_aktif', 1)->first();
        if ($getBidang) {
            $getBidang->status_aktif = 0;
            $getBidang->keterangan_aktif = $request->keterangan_aktif;
            $getBidang->save();
            return redirect()->back()->with('success', 'Bidang telah dinonaktifkan!!');
        }
        return redirect()->back()->with('errors', 'Bidang tidak ditemukan!!');
    }

}
