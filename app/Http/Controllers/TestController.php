<?php

namespace App\Http\Controllers;

use App\User;
use App\Test; //モデル(Test.php)の読み込み
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $test = new User;
        
        return view('test')->with(['tests' => $test->get()]);
    }
}
