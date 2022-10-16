<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Place;
use App\groups;
use App\Member;
use App\Reserve;
use App\Option;
use App\Order;

class OrderController extends Controller
{
    public function index($group_id)
    {
        $user = Auth()->user();
        
        $groups = new groups;
        $places = new Place;
        
        $group = $groups->where('id', '=', $group_id)->first();
        $reserves = Reserve::with('places')->where('group_id', '=', $group_id)->get();
        
        //この書き方だと正しく表示される
        return view('order')->with([
            'user' => $user,
            'group' => $group,
            'reserves' => $reserves,
            ]);
    }
    
    public function form($reserve_id)
    {
        $user = Auth()->user();
        $reserves = new Reserve;
        $options = new Option;
        $dataplaces = new Place;
        $orders = new Order;
        
        $tmpplace = $reserves->where('id', '=', $reserve_id)->first();
        $place = $dataplaces->where('id', '=', $tmpplace->place_id)->first();
        
        $options = $options->where('place_id', '=', $tmpplace->place_id)->get();
        //dd($options);
        
        $orders = $orders->where('reserve_id', '=', '$reserve_id')->get();
        
        return view('orderform')->with([
            'user' => $user,
            'options' => $options,
            'place' => $place,
            'reserve_id' => $reserve_id,
            'orders' => $orders,
            ]);
    }
    
    public function store($reserve_id, Request $request)
    {
        $user = Auth()->user();
        
        $brk_chk = 0;
        for ($i = 0; $brk_chk == 0; $i += 1) {
            $data = new Order;
            
            $id1 = 'option_id';
            $id2 = (string) $i;
            $id3 = $id1.$id2;
            
            $value1 = 'value';
            $value2 = $value1.$id2;
            
            $data->user_id = $user->id;
            $data->reserve_id = $reserve_id;
            $data->option_id = $request->$id3;
            $data->pcs = $request->$value2;
            
            $data->save();
            
            $inext = $i + 1;
            $id2 = (string) $inext;
            $id3 = $id1.$id2;
            if($request->$id3 == 0) {
                $brk_chk = 1;
            }
        }
        
        return redirect()->action('MypageController@index');
    }
}
