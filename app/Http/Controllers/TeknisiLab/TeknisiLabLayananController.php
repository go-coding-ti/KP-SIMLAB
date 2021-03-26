<?php

namespace App\Http\Controllers\TeknisiLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_laboratorium;
use App\tb_layanan;
use Illuminate\Http\Request;

class TeknisiLabLayananController extends Controller
{
    public function index($id, $nama_bidang)
    {
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $getLayanan = tb_bidang::where('id_bidang', $id)->where('nama_bidang', $nama_bidang)->with('relasiBidangtoLayanan')->first();
        $getMyLabID = TeknisiLabUtilities::getMyLabID();
        $bidang = tb_bidang::whereIn('id_laboratorium', $getMyLabID)->get();
        return view('TeknisiLab.layanan', compact('getLayanan', 'menuSidebar', 'bidang'));
    }

    public function update(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan', $request->id_layanan)->where('nama_layanan', $request->old_nama_layanan)->where('id_bidang', $request->id_bidang)->first();
        if ($getLayanan) {
            $getLayanan->nama_layanan = $request->nama_layanan;
            $getLayanan->satuan = $request->satuan;
            $getLayanan->harga = $request->harga;
            $getLayanan->keterangan = $request->keterangan;
            $getLayanan->status = 0;
            $getLayanan->id_bidang = $request->id_bidang;
            $getLayanan->save();
            return redirect()->back();
        }
    }

    public function delete($id_layanan, $nama_layanan, $id_bidang)
    {
        $getLayanan = tb_layanan::where('id_layanan', $id_layanan)->where('nama_layanan', $nama_layanan)->where('id_bidang', $id_bidang)->first();
        if ($getLayanan) {
            $getLayanan->status = 3;
            $getLayanan->save();
            return redirect()->back();
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'id_bidang' => 'required',
            'keterangan' => 'required',
        ]);

        tb_layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'id_bidang' => $request->id_bidang,
            'keterangan' => $request->keterangan,
            'status' => 0,
        ]);
        return redirect()->back();
    }

    public function batal($id_layanan, $nama_layanan, $id_bidang){
        $getLayanan = tb_layanan::where('id_layanan', $id_layanan)->where('nama_layanan', $nama_layanan)->where('id_bidang', $id_bidang)->first();
        if($getLayanan){
            $getLayanan->status = 0;
            $getLayanan->save();
            return redirect()->back();
        }
    }
}
