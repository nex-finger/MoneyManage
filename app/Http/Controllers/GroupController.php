<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;

class GroupController extends Controller
{
    public function index()
    {
        $md = new groups;
        $data = $md->get();
        
        return view('group', ['groups' => $data]);   
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
}
