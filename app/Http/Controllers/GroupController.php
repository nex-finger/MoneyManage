<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;
use App\Member;

class GroupController extends Controller
{
    public function index()
    {
        $md = new groups;
        $user = Auth()->user();
        $data = $md->get();
        
        return view('group', ['groups' => $data], ['user' => $user]);   
    }
    
    public function create()
    {
        $data = Auth()->user();
        
        return view('creategroup', ['user' => $data]);
    }
    
    public function store(Request $request)
    {
        $user = Auth()->user();
        $data = new groups();
        
        $data->name = $request['name'];
        $data->leader_id = $user['id'];
        $data->leader_name = $user['name'];
        
        $data->save();
        
        return redirect('/group');
    }
    
    public function leave($group_id)
    {
        $user = Auth()->user();
        $id = Auth()->id();
        
        $data_m = new Member();
        $data_m->where('group_id', '=', $group_id)->delete();
        
        $data_g = new groups();
        $data_g->where('id', '=', $group_id)->delete();
        
        return redirect()->action('MypageController@index');
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
}
