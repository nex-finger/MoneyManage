<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Place;

class OptionController extends Controller

{
    /*
    public function index()
    {
     $images = Picture::all();//レコード取得
     return view('image.index',compact('images')); //一覧ページ表示
     }
     */

    public function form($id)
    {
        $user = Auth()->user();
        $option = new Option;
        $place = new place;
        
        $data_op = $option->where('place_id', '=', $id)->get();
        $data_tm = $option->where('place_id', '=', $id)->first();
        $data_pl = $place->where('id', '=', $data_tm->place_id)->first();
        
        return view('optionform')->with([
            'place' => $data_pl,
            'options' => $data_op,
            'id' => $id,
            'user' => $user,
        ]);//投稿フォーム表示
    }

    public function store($id, Request $request)
    {
        //dd($request);
        $option = new Option;
        
        $option->place_id = $id;
        $option->name = $request->name;
        $option->value = $request->value;
        
        $option->save();
        
        //保存処理後一覧ページに飛ばす
        return redirect()->action('OptionController@form', ['id' => $id]);

    }
    
    public function delete($id)
    {
        $option = new option;
        $place_id = $option->where('id', '=', $id)->first();
        //dd($place_id->place_id);
        $option->where('id', '=', $id)->delete();
        
        
        //保存処理後一覧ページに飛ばす
        return redirect()->action('OptionController@form', ['id' => $place_id['place_id']]);
    }
    
    public function updateform($id)
    {
        $user = Auth()->user();
        $option = new Option;
        $place = new Place;
        
        $data_tm = $option->where('id', '=', $id)->first();
        $data_pl = $place->where('id', '=', $data_tm->place_id)->first();
        $data_op = $option->where('id', '=', $id)->first();
        
        return view('optionupdateform')->with([
            'option' => $data_op,
            'place' => $data_pl,
            'user' => $user,
        ]);//投稿フォーム表示
    }
    
    public function updatestore($id, Request $request)
    {
        $option = new Option;
        $data_op = $option->where('id', '=', $id)->first();
        
        $data_op->name = $request->name;
        $data_op->value = $request->value;
        
        $data_op->save();
        
        return redirect()->action('OptionController@form', ['id' => $data_op['place_id']]);
    }
}