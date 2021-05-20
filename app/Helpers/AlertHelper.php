<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AlertHelper {

    public static function dataAlert($type,$title,$msg){
        if($type=='error'){
            Alert::error($title, $msg);
        } elseif ($type=='success'){
            Alert::success($title, $msg);
        } elseif ($type=='info'){
            Alert::info($title, $msg);
        }
    }
}
