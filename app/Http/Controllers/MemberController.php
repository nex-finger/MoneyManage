<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;
use App\User;
use App\Member;

class MemberController extends Controller
{
    public function index($group_id)
    {
        $user = Auth()->user();
        $id = Auth()->id();
        
        $memdata = Member::where('group_id', '=', $group_id)->get();
        $leader = groups::find($group_id);
        $leader = $leader['name'];
        
        $members = Member::with('user')->where('group_id', '=', $group_id)->get();
        
        $memberarr = [];
        
        foreach($members as $member){
        array_push($memberarr, $member['user_id']);
        }
        //dd($memberarr);
        
        return view('member')->with([
            'user' => $user,
            'leader' => $leader,
            'members' => $members,
            'memberarr' => $memberarr,
            'group_id' => $group_id
            ]);
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
    
    public function storejoin($group_id)
    {
        $user = Auth()->user();
        $id = Auth()->id();
        
        $data = new Member();
        $data->user_id = $id;
        $data->group_id = $group_id;
        
        $data->save();
        
        return redirect()->action('MemberController@index', ['group' => $group_id]);
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
    
    public function storeleave($group_id)
    {
        $user = Auth()->user();
        $id = Auth()->id();
        
        $data = new Member();
        $data->where('user_id', '=', $id)->where('group_id', '=', $group_id)->delete();
        
        return redirect()->action('MemberController@index', ['group' => $group_id]);
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
}
