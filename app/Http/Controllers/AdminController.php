<?php

namespace App\Http\Controllers;

use App\User;
use App\groups;
use App\Member;
use App\Place;
use App\Option;
use App\Picture;
use App\Reserve;
use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        if($user->id == 3){
            $data_us = new User;
            $data_gr = new groups;
            $data_me = new Member;
            $data_pl = new Place;
            $data_op = new option;
            $data_pi = new Picture;
            $data_re = new Reserve;
            $data_or = new Order;
        
            return view('admin')->with([
                'user' => $user,
                'users' => $data_us->get(),
                'groups' => $data_gr->get(),
                'members' => $data_me->get(),
                'places' => $data_pl->get(),
                'options' => $data_op->get(),
                'pictures' => $data_pi->get(),
                'reserves' => $data_re->get(),
                'orders' => $data_or->get()
                ]);
        }
        
        if($user->admin_chk == 0){
            return ('ログイン中のアカウントは管理者権限を持っていないため，このページは閲覧できません．');
        }
        else{
            $data_us = new User;
            $data_gr = new groups;
            $data_me = new Member;
            $data_pl = new Place;
            $data_op = new option;
            $data_pi = new Picture;
            $data_re = new Reserve;
            $data_or = new Order;
        
            return view('admin')->with([
                'user' => $user,
                'users' => $data_us->get(),
                'groups' => $data_gr->get(),
                'members' => $data_me->get(),
                'places' => $data_pl->get(),
                'options' => $data_op->get(),
                'pictures' => $data_pi->get(),
                'reserves' => $data_re->get(),
                'orders' => $data_or->get()
                ]);
            }
        
        /*
        $user = Auth()->user();
        $data_us = new User;
        $data_gr = new groups;
        $data_me = new Member;
        $data_pl = new Place;
        $data_op = new option;
        $data_pi = new Picture;
        $data_re = new Reserve;
        $data_or = new Order;
        
        return view('admin')->with([
            'user' => $user,
            'users' => $data_us->get(),
            'groups' => $data_gr->get(),
            'members' => $data_me->get(),
            'places' => $data_pl->get(),
            'options' => $data_op->get(),
            'pictures' => $data_pi->get(),
            'reserves' => $data_re->get(),
            'orders' => $data_or->get()
            ]);
        */
    }
    
    public function update(Request $request)
    {
        //dd($request);
        $data_us = new User;
        $data_up = $data_us->find($request->id);
        if($request->admin_chk == '1'){
            $admin = 1;
        } else {
            $admin = 0;
        }
        $data_up->admin_chk = $admin;
        $data_up->save();
        
        return redirect()->action('AdminController@index');
    }
}