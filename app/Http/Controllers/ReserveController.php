<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;
use App\User;
use App\Member;
use App\Reserve;
use App\Place;

class ReserveController extends Controller
{
    public function form($place_id) 
    {
        //dd($place_id);
        $user = Auth()->user();
        $id = Auth()->id();
        
        $data_gr = new groups;
        $data_pl = new Place;
        
        $groups = $data_gr->where('leader_id' ,'=', $id)->get();
        $place = $data_pl->where('id', '=', $place_id)->first();
        
        return view('reservegroup')->with([
            'user' => $user,
            'groups' => $groups,
            'place_id' => $place_id,
            'place' => $place,
            ]);
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
    
    public function store($place_id, Request $request)
    {
        $user = Auth()->user();
        $id = Auth()->id();
        
        $data = new reserve();
        $data->place_id = $place_id;
        $data->group_id = $request['group'];
        $data->arrival = $request['arrival'];
        
        $data->save();
        
        return redirect()->action('MypageController@index');
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
    
    /*
    public function storeleave($group_id)
    {
        $user = Auth()->user();
        $id = Auth()->id();
        
        $data = new Member();
        $data->where('user_id', '=', $id)->where('group_id', '=', $group_id)->delete();
        
        return redirect()->action('MemberController@index', ['group' => $group_id]);
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
    */
}
