<?php

namespace App\Http\Controllers;

use App\User;
use App\groups;
use App\Member;
use App\Place;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        if($user->admin_chk == 0){
            return ('ログイン中のアカウントは管理者権限を持っていないため，このページは閲覧できません．');
        }
        else{
            $data_u = new User;
            $data_g = new groups;
            $data_m = new Member;
            $data_p = new Place;
        
        return view('admin')->with([
            'user' => $user,
            'users' => $data_u->get(),
            'groups' => $data_g->get(),
            'members' => $data_m->get(),
            'places' => $data_p->get()
            ]);
        }
    }
}
