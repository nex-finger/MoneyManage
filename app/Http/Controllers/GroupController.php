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
}
