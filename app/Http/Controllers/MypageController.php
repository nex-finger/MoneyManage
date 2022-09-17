<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return view('mypage', compact('user'));
    }
}
