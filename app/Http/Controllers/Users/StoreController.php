<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\tb_laboratorium;
use App\tb_berita;
use App\tb_carts;

class StoreController extends Controller
{
    public function index(){
        $Laboratorium = tb_laboratorium::paginate(6);
        $Berita = tb_berita::all();
        $carts =[];
        if(!is_null(Auth::user())){
            $carts = tb_carts::with('laboratorium','user')->where('id_user',Auth::user()->id)->get();
        }
        
        return view('UserPage.store',compact('Laboratorium','Berita','carts'));
    }

    public function show($id){
        $getLaboratorium = tb_laboratorium::where('id_laboratorium',$id)->get();
        $Berita = tb_berita::all();
        $carts =[];
        if(!is_null(Auth::user())){
            $carts = tb_carts::with('laboratorium','user')->where('id_user',Auth::user()->id)->get();
        }
        return view('UserPage.product',compact('getLaboratorium','Berita','carts'));
    }

    public function search(Request $request){
        $Laboratorium = tb_laboratorium::where('nama_lab','like','%'.$request->search.'%')->paginate(6);
        $Berita = tb_berita::all();
        return view('UserPage.store',compact('Laboratorium','Berita'));
    }

    public function AddCart(Request $request){
        tb_carts::create([
            'id_user'=>$request->id_user,
            'id_laboratorium'=>$request->id_laboratorium,
            'status'=>"cart",
        ]);
        $carts = tb_carts::with('laboratorium','user')->where('id_user',$request->id_user)->get();
        $jumlahcarts = $carts->count();
        $string = '<div>';

                        foreach($carts as $cart){
                            $assetImg = asset('/images/'.$cart->laboratorium->foto_lab);
                            
                            $string = $string.'<div class="product-widget">
                            <div class="product-img">
                            <img src="'.$assetImg.'" style="height:70px;width:70px;"alt="">
                        </div>
                        <div class="product-body">
                                <small class="text-muted"> '.$cart->created_at.' </small>
                                <h6 class="product-name"><a href="#">'.$cart->laboratorium->nama_lab.'</a></h6>
                            </div>
                            <button class="delete"><i class="fa fa-close"></i></button>
                        </div>';
                            
                        }
                        $string =  $string.    '<hr>
                            <center><a href="" class="btn" style="background-color: white;">Show All</a></center>                                
                            </ul>
                            </div>
                        ';
    	return response()->json(['success' => 'berhasil','jumlahcarts'=>$jumlahcarts,'carts'=>$string]);
    }
}
