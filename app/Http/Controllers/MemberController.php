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
        
        //$group = Member::find($group_id)->groups->name;
        $member = User::find($id)->members;
        
        return view('member', ['members' => $member], ['user' => $user]);   
    }
}
