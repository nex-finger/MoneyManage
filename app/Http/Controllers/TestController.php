<?php

namespace App\Http\Controllers;

use App\User;
use App\groups;
use App\Member;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $data_u = new User;
        $data_g = new groups;
        $data_m = new Member;
        
        return view('test')->with(['user' => $user, 'users' => $data_u->get(), 'groups' => $data_g->get(), 'members' => $data_m->get()]);
    }
}
