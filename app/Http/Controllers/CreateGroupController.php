<?php

namespace App\Http\Controllers;

use App\User;
use App\groups;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data_u = new User;
        $data_g = new groups;
        
        return view('test')->with(['users' => $data_u->get(), 'groups' => $data_g->get()]);
    }
}
