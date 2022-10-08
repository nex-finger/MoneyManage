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
        
        
        
        $memdata = Member::find($group_id);
        $leader = Member::where($memdata['user_id'])->User;
        
        $members = Member::where('group_id', '=', $group_id)->get();
        
        return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
}
