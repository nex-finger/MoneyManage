<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowtoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function group()
    {
        $user = Auth()->user();
        return view('howtogroup')->with(['user' => $user]);
    }
    
    public function place()
    {
        $user = Auth()->user();
        return view('howtoplace')->with(['user' => $user]);
    }
}
