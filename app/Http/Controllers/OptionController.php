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
    
    public function updateform($id, $op)
    {
        $option = new Option;
        $data_op = $option->where('id', '=', $op)->get();
        
        return view('optionupdateform')->with([
            'option' => $data_op,
            'id' => $id,
        ]);//投稿フォーム表示
    }

//保存処理がちょい複雑かもぉ(o_o)「
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
        $picture = new Picture;
        $picture->where('id', '=', $id)->delete();
        
        //保存処理後一覧ページに飛ばす
        return redirect()->action('MypageController@index');

    }
}