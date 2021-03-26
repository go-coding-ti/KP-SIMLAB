<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_laboran;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KetuaLabTeknisiController extends Controller
{

    public function index($id){
        $check = tb_laboran::where('id_laboratorium',$id)->where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->with('userRelation')->first();
        if($check){
            $menuSidebar = Utilities::sideBarMenu();
            $dataPengguna = tb_laboran::where('id_laboratorium',$id)->where('hak_akses','teknisi')->with('userRelation')->get();
            return view('KetuaLab.penggunaKepalaLab',compact('menuSidebar','dataPengguna'));
        } return redirect()->back();
    }

    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:App\users,email',
            'password'=>'required|min:6',
            'id_lab'=>'required',
        ]);
        $dataUser = users::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'hak_akses'=>2,
        ]);
        if($dataUser){
            $arrayLaboratorium = $request->input('id_lab');
            foreach ( $arrayLaboratorium as $al){
                tb_laboran::create([
                    'hak_akses'=>'teknisi',
                    'id_user'=>$dataUser->id,
                    'id_laboratorium'=>$al,
                ]);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function update(Request $request){
        $dataUser = users::find($request->id_user);
        $dataUser->name=$request->name;
        $dataUser->email=$request->email;
        $dataUser->save();
        return redirect()->back();
    }

    public function delete($id_user, $id_lab){
        $deleteUser = tb_laboran::where('id_user',$id_user)->where('id_laboratorium',$id_lab)->first();
        $deleteUser->delete();
        return redirect()->back()->with('success','Data berhasil didelete!');
    }
}
