<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

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
        $option = new Option;
        $data_op = $option->where('place_id', '=', $id)->get();
        
        return view('optionform')->with([
            'options' => $data_op,
            'id' => $id,
        ]);//投稿フォーム表示
    }
    
    public function updateform($id)
    {
        $option = new Option;
        $data_op = $option->where('id', '=', $id)->get();
        
        return view('optionupdateform')->with([
            'option' => $data_op,
            'id' => $id,
        ]);//投稿フォーム表示
    }

//保存処理がちょい複雑かもぉ(o_o)「
    public function store($id, Request $request)
    {
        //dd($id);
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
        $option = new Option;
        
        //dd($tmp);
        $place_id = $option->where('id', '=', $id)->get();
        //$tmp = $option->where('id', '=', $id)->get(['place_id']);

        $option->where('id', '=', $id)->delete();
        
        
        //保存処理後一覧ページに飛ばす
        return redirect()->action('MypageController@index');

    }
}