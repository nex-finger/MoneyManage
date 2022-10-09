<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\groups;

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
        
        $groups = new groups;
        $places = new Place;
        
        $mygr = groups::where('leader_id', '=', $user['id'])->get();
        $mypl = Place::where('leader_id', '=', $user['id'])->get();
        
        //この書き方だと正しく表示される
        return view('mypage')->with([
            'user' => $user,
            'groups' => $mygr,
            'places' => $mypl
            ]);
        
        //これだとダメらしい
        //return view('mypage', ['user' => $user], ['groups' => $mygr], ['places' => $mypl]);
    }
}
