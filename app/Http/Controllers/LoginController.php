<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index(Request $request){
        if(session('admin')){
            return redirect('/peminjamanadmin');
        } elseif (session('laboran')){
            return redirect('/laboran');
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
                        session(['laboran'=>true]);
                        dd(Auth::user());
                        return redirect('/laboran');
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
