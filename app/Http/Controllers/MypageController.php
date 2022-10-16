<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Place;
use App\groups;
use App\Member;
use App\Reserve;

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
        $reserves = new Reserve;
        
        $mygrs = groups::where('leader_id', '=', $user['id'])->get();
        $mypls = Place::where('leader_id', '=', $user['id'])->get();
        $ingrs = Member::with('group')->where('user_id', '=', $user['id'])->get();
        
        //この書き方だと正しく表示される
        return view('mypage')->with([
            'user' => $user,
            'mygroups' => $mygrs,
            'myplaces' => $mypls,
            'ingroups' => $ingrs,
            ]);
        
        //これだとダメらしい
        //return view('mypage', ['user' => $user], ['groups' => $mygr], ['places' => $mypl]);
    }
}
