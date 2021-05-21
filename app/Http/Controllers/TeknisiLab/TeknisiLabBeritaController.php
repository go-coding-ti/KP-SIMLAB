<?php

namespace App\Http\Controllers\TeknisiLab;

use App\Helpers\AlertHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\logs_class;
use App\tb_berita;
use App\tb_bidang;
use App\tb_laboratorium;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeknisiLabBeritaController extends Controller
{
    public function index($id)
    {
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $getBerita = tb_berita::where('id_laboratorium', $id)->with('relasiBeritaToLaboratorium')->get();
        return view('TeknisiLab.berita', compact('menuSidebar', 'getBerita'));
    }

    public function addIndeks()
    {
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $myIDLab = TeknisiLabUtilities::getMyLabID();
        $getMyLab = tb_laboratorium::whereIn('id_laboratorium', $myIDLab)->get();
        return view('TeknisiLab.formberita', compact('menuSidebar', 'getMyLab'));
    }

    public function create(Request $request)
    {
        $data = tb_berita::create([
            'id_laboratorium' => $request->id_laboratorium,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        logs_class::berita_logs($data->id_berita, Auth::user()->id, 'add', $data->judul, $data->isi, $data->created_at);
        AlertHelper::dataAlert('success','Berhasil','Berita berhasil dibuat!');
        return redirect('/teknisi/' . $request->id_laboratorium . '/berita');
    }

    public function updateIndex($id)
    {
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $getBerita = tb_berita::where('id_berita', $id)->with('relasiBeritaToLaboratorium')->first();
        return view('TeknisiLab.editberita', compact('menuSidebar', 'getBerita'));
    }

    public function update(Request $request)
    {
        $data = tb_berita::where('id_laboratorium', $request->old_id_laboratorium)->where('id_berita', $request->id_berita)->where('judul', $request->old_judul)->first();
        if ($data) {
            $data->id_laboratorium = $request->id_laboratorium;
            $data->judul = $request->judul;
            $data->isi = $request->isi;
            $data->save();
            logs_class::berita_logs($data->id_berita, Auth::user()->id, 'update', $data->judul, $data->isi, $data->timestamp);
            AlertHelper::dataAlert('success','Berhasil','Data berhasil diupdate!');
            return redirect('/teknisi/' . $request->id_laboratorium . '/berita');
        }
        AlertHelper::dataAlert('erros','Error','Data tidak ditemukan!!');
        return back();

    }

    public function delete($id)
    {
        $data = tb_berita::where('id_berita', $id)->first();
        logs_class::berita_logs($data->id_berita, Auth::user()->id, 'delete', $data->judul, $data->isi, $data->timestamp);
        $data->delete();
        AlertHelper::dataAlert('info','Success','Data berhasil dihapus!!');
        return redirect()->back();
    }

    public function readNotif($id)
    {
        $user = User::find($id);

        $user->unreadNotifications->markAsRead();
    }
}
