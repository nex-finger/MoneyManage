<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $data = Auth()->user();
        if($data->admin_chk == 1){
            $admin = 'YES';
        }
        else{
            $admin = 'NO';
        }
        
        $user = array(
            'id' => $data->id,
            'name' => $data->name,
            'email' => $data->email,
            'created_at' => $data->created_at,
            'admin' => $admin,
        );
        
        return view('mypage', ['user' => $user]);
    }
}
