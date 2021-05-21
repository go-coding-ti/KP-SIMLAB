<?php

namespace App\Http\Controllers\TeknisiLab;

use App\Helpers\AlertHelper;
use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_laboratorium;
use App\users;
use App\User;
use App\Notifications\TeknisiNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeknisiLabBidangController extends Controller
{
    private $id_lab;

    public function index($id, $lab_name){
        $user = User::find(Auth::user()->id);
        $menuSidebar = TeknisiLabUtilities::sideBarMenu();
        $getLabData = tb_laboratorium::where('id_laboratorium',$id)->where('nama_lab',$lab_name)->first();
        $getBidang = tb_bidang::where('id_laboratorium',$getLabData->id_laboratorium)->with('relasiBidangToLaboratorium')->get();
        $getMyLab = tb_laboran::where('id_user', Auth::user()->id)->where('hak_akses','teknisi')->get();
        $myLabID = TeknisiLabUtilities::getMyLabID();
        $getLab = tb_laboratorium::whereIn('id_laboratorium',$myLabID)->get();
        return view('TeknisiLab.bidang',compact('getBidang','menuSidebar','getMyLab','getLab','user'));
    }

    public function update(Request $request){
        $usr = Auth::user();
        $getBidangData = tb_bidang::where('id_bidang',$request->id_bidang)->where('nama_bidang',$request->old_nama_bidang)->where('id_laboratorium',$request->id_laboratorium)->first();
        if($getBidangData){
            $getBidangData->nama_bidang = $request->nama_bidang;
            $getBidangData->status = 0;
            $getBidangData->id_laboratorium = $request->id_lab;
            $getBidangData->save();

            $this->id_lab = $request->id_lab;

            $tb_laboran = tb_laboran::where('id_laboratorium',$this->id_lab)->where('hak_akses','kepala lab')->pluck('id_user');
            $users = User::whereIn('id',$tb_laboran)->get();

            foreach($users as $user){
                $user->notify(new TeknisiNotification(3,$request->id_laboratorium,$request->id_bidang,$usr,'bidang'));
            }
            AlertHelper::dataAlert('success','Success','Data berhasil diupdate!!');
            return redirect()->back();
        }
        AlertHelper::dataAlert('errors','Error','Data tidak ditemukan!!');
        return redirect()->back();
    }

    public function delete($id_bidang, $nama_bidang,$id_laboratorium){
        $usr = Auth::user();
        $getBidangData = tb_bidang::where('id_bidang',$id_bidang)->where('nama_bidang',$nama_bidang)->where('id_laboratorium',$id_laboratorium)->first();
        if($getBidangData){
            $getBidangData->status = 3;
            $getBidangData->save();

            $this->id_lab = $id_laboratorium;

            $users = User::with('laboran')->whereHas('laboran', function($q){
                return $q->where('hak_akses', 'kepala lab')->where('id_laboratorium',$this->id_lab);
            })->get();

            foreach($users as $user){
                $user->notify(new TeknisiNotification(2,$id_laboratorium,$id_bidang,$usr,'bidang'));
            }
            AlertHelper::dataAlert('info','Success','Data berhasil dihapus!!');
            return redirect()->back();
        }
        AlertHelper::dataAlert('errors','Error','Data tidak ditemukan!!');
        return redirect()->back();
    }

    public function create(Request $request){
        $request->validate([
            'nama_bidang' => 'required',
            'id_lab'=>'required',
        ]);

        $usr = Auth::user();
        $arrayLaboratorium = $request->input('id_lab');
        foreach ( $arrayLaboratorium as $al){
            tb_bidang::create([
                'nama_bidang'=>$request->nama_bidang,
                'id_laboratorium'=>$al,
                'status'=>0,
            ]);

            $this->id_lab = $al;

            $users = User::with('laboran')->whereHas('laboran', function($q){
                return $q->where('hak_akses', 'kepala lab')->where('id_laboratorium',$this->id_lab);
            })->get();

            $user_id = User::max('id');

            foreach($users as $user){
                $user->notify(new TeknisiNotification(1,$al,$user_id,$usr,'bidang'));
            }

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
