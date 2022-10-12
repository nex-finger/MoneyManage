<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;

class ImageController extends Controller

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
        $picture = new Picture;
        $data_pi = $picture->where('place_id', '=', $id)->get();
        
        return view('imageform')->with([
            'images' => $data_pi,
            'id' => $id
        ]);//投稿フォーム表示
    }

//保存処理がちょい複雑かもぉ(o_o)「
    public function store($id, Request $request)
    {
        //画像の処理
        $image = $request->file('image');//file()で受け取る
        if($request->hasFile('image') && $image->isValid()){//画像があるないで条件分岐
            $image = $image->getClientOriginalName();//storeAsで指定する画像名を作成
        }else{
            return;
        }

        Picture::create([
            'image' => $request->file('image')->storeAs('public/images',$image),
            'place_id' => $id
        ]); //storage/app/public/images(imagesは作られる)に保存
        
        //保存処理後一覧ページに飛ばす
        return redirect()->action('PlaceController@show', ['id' => $id]);

    }
    
    public function delete($id)
    {
        $picture = new Picture;
        $picture->where('id', '=', $id)->delete();
        
        //保存処理後一覧ページに飛ばす
        return redirect()->action('MypageController@index');

    }
}