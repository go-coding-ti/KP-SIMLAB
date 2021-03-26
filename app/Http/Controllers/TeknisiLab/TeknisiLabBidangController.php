<?php

namespace App\Http\Controllers\TeknisiLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeknisiLabBidangController extends Controller
{
    public function index($id, $lab_name){
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $getLabData = tb_laboratorium::where('id_laboratorium',$id)->where('nama_lab',$lab_name)->first();
        $getBidang = tb_bidang::where('id_laboratorium',$getLabData->id_laboratorium)->with('relasiBidangToLaboratorium')->get();
        $getMyLab = tb_laboran::where('id_user', Auth::user()->id)->where('hak_akses','teknisi')->get();
        $myLabID = TeknisiLabUtilities::getMyLabID();
        $getLab = tb_laboratorium::whereIn('id_laboratorium',$myLabID)->get();
        return view('TeknisiLab.bidang',compact('getBidang','menuSidebar','getMyLab','getLab'));
    }

    public function update(Request $request){
        $getBidangData = tb_bidang::where('id_bidang',$request->id_bidang)->where('nama_bidang',$request->old_nama_bidang)->where('id_laboratorium',$request->id_laboratorium)->first();
        if($getBidangData){
            $getBidangData->nama_bidang = $request->nama_bidang;
            $getBidangData->status = 0;
            $getBidangData->id_laboratorium = $request->id_lab;
            $getBidangData->save();
            return redirect()->back();
        }
    }

    public function delete($id_bidang, $nama_bidang,$id_laboratorium){
        $getBidangData = tb_bidang::where('id_bidang',$id_bidang)->where('nama_bidang',$nama_bidang)->where('id_laboratorium',$id_laboratorium)->first();
        if($getBidangData){
            $getBidangData->status = 3;
            $getBidangData->save();
            return redirect()->back();
        }
    }

    public function create(Request $request){
        $request->validate([
            'nama_bidang' => 'required',
            'id_lab'=>'required',
        ]);

        $arrayLaboratorium = $request->input('id_lab');
        foreach ( $arrayLaboratorium as $al){
            tb_bidang::create([
                'nama_bidang'=>$request->nama_bidang,
                'id_laboratorium'=>$al,
                'status'=>0,
            ]);
        }
        return redirect()->back();
    }

    public function batal($id_bidang, $nama_bidang,$id_laboratorium){
        $getBidangData = tb_bidang::where('id_bidang',$id_bidang)->where('nama_bidang',$nama_bidang)->where('id_laboratorium',$id_laboratorium)->first();
        if($getBidangData){
            $getBidangData->status = 0;
            $getBidangData->save();
            return redirect()->back();
        }
    }
}
