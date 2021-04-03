<?php

namespace App\Http\Controllers\TeknisiLab;

use App\Http\Controllers\Controller;
use App\tb_berita;
use App\tb_bidang;
use App\tb_laboratorium;
use App\User;
use Illuminate\Http\Request;

class TeknisiLabBeritaController extends Controller
{
    public function index($id){
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $getBerita = tb_berita::where('id_laboratorium',$id)->with('relasiBeritaToLaboratorium')->get();
        return view('TeknisiLab.berita',compact('menuSidebar','getBerita'));
    }

    public function addIndeks(){
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $myIDLab = TeknisiLabUtilities::getMyLabID();
        $getMyLab = tb_laboratorium::whereIn('id_laboratorium',$myIDLab)->get();
        return view('TeknisiLab.formberita',compact('menuSidebar','getMyLab'));
    }

    public function create(Request $request){
        tb_berita::create([
            'id_laboratorium'=>$request->id_laboratorium,
            'judul'=>$request->judul,
            'isi'=>$request->isi,
        ]);
        return redirect('/teknisi/'.$request->id_laboratorium.'/berita');
    }

    public function updateIndex($id){
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $getBerita = tb_berita::where('id_berita',$id)->with('relasiBeritaToLaboratorium')->first();
        return view('TeknisiLab.editberita',compact('menuSidebar','getBerita'));
    }

    public function update(Request $request){
        $data = tb_berita::where('id_laboratorium',$request->old_id_laboratorium)->where('id_berita',$request->id_berita)->where('judul',$request->old_judul)->first();
        if($data){
            $data->id_laboratorium = $request->id_laboratorium;
            $data->judul = $request->judul;
            $data->isi = $request->isi;
            $data->save();
            return redirect('/teknisi/'.$request->id_laboratorium.'/berita');
        }

    }

    public function delete($id){
        $data = tb_berita::where('id_berita',$id)->first();
        $data->delete();
        return redirect()->back();
    }

    public function readNotif($id){
        $user = User::find($id);

        $user->unreadNotifications->markAsRead();
    }
}
