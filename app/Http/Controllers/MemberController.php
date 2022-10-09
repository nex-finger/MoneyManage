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
        
        $members = Member::with('user')->where('group_id', '=', $group_id)->get();
        
        return view('member')->with([
            'user' => $user,
            'leader' => $leader['name'],
            'members' => $members
            ]);
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
}
