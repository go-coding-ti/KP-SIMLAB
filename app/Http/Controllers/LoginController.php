<?php

namespace App\Http\Controllers;

use App\tb_laboran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index(Request $request){
        if(session('admin')){
            return redirect('/peminjamanadmin');
        } elseif (session('kepala')){
            return redirect('/kepala');
        } elseif (session('pimpinan')){
            return redirect('/pimpinan');
        } elseif (session('teknisi')){
            return redirect('/teknisi');
        } else {
            return view('admin.login');
        }
    }

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    if($user->hak_akses == 2){
                        if(tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->first()){
                            session(['kepala'=>true]);
                            return redirect('/kepala');
                        }
                        if(tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','pimpinan')->first()){
                            session(['pimpinan'=>true]);
                            return redirect('/pimpinan');
                        }
                        if(tb_laboran::where('id_user',Auth::user()->id)->where('hak_akses','teknisi')->first()){
                            session(['teknisi'=>true]);
                            return redirect('/teknisi');
                        }
                    } elseif ($user->hak_akses == 3){
                        session(['admin'=>true]);
                        return redirect('/peminjamanadmin');
                    }
                }
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

}
