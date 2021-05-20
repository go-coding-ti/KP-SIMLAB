<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\tb_laboran;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PimpinanAkunKetuaLabController extends Controller
{
    public function index($id){
        $check = tb_laboran::where('id_laboratorium',$id)->where('id_user',Auth::user()->id)->where('hak_akses','pimpinan')->with('userRelation')->first();
        if($check){
            $dataPengguna = tb_laboran::where('id_laboratorium',$id)->where('hak_akses','kepala lab')->with('userRelation','labRelation')->get();
            return view('PimpinanLab.akunKetuaLab',compact('dataPengguna'));
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
                    'hak_akses'=>'kepala lab',
                    'id_user'=>$dataUser->id,
                    'id_laboratorium'=>$al,
                ]);
            }

            return redirect()->back()->with('success','Data berhasil ditambahkan !!');
        }
        return redirect()->back()->with('error','Data tidak berhasil ditambahkan');
    }

    public function update(Request $request){
        $dataUser = users::where('name',$request->oldName)->where('email',$request->oldEmail)->first();
        if($dataUser){
            $check2 = tb_laboran::where('id_user',$dataUser->id)->where('hak_akses','kepala lab')->first();
            if($check2){
                $dataUser->name=$request->name;
                $dataUser->email=$request->email;
                $dataUser->save();
                return redirect()->back()->with('success','Data berhasil diupdate!');
            }
            return redirect()->back()->with('error','Data tidak ditemukan!');
        }
        return redirect()->back()->with('error','Data tidak ditemukan!');
    }

    public function delete($id_user, $id_lab){
        $deleteUser = tb_laboran::where('id_user',$id_user)->where('id_laboratorium',$id_lab)->where('hak_akses','kepala lab')->first();
        if($deleteUser){
            $deleteUser->delete();
            return redirect()->back()->with('success','Data berhasil didelete!');
        }
        return redirect()->back()->with('success','Data tidak berhasil didelete!');
    }
}
