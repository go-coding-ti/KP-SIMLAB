<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function profile()
    {
        $data = Auth::user();
        return view('admin.adminprofile',compact('data'));
    }

    public function editProfile(Request $request)
    {
        $user = users::find(Auth::id());
        if(Hash::check($request->password, $user->password)){
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->save();
            return redirect(route('profilePimpinan'))->with('success','Profile anda berhasil diupdate!!');
        }
        return redirect()->back()->withInput()->with('error','Password yang anda masukan salah!!');
    }
}
