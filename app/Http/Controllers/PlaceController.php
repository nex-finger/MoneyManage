<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $md = new Place;
        $user = Auth()->user();
        $data = $md->get();
        
        return view('place', ['places' => $data], ['user' => $user]);   
    }
    
    public function create()
    {
        $data = Auth()->user();
        
        return view('createplace', ['user' => $data]);
    }
    
    public function store(Request $request)
    {
        $user = Auth()->user();
        $data = new Place();
        
        $data->name = $request['name'];
        $data->leader_id = $user['id'];
        $data->leader_name = $user['name'];
        $data->address = $request['address'];
        $data->value = $request['value'];
        $data->lat = $request['lat'];
        $data->lng = $request['lng'];
        
        $data->save();
        
        return redirect('/place');
    }
    
    public function show($id)
    {
        $md = new Place;
        $user = Auth()->user();
        $data = $md->find($id);
        
        $lat = $data['lat'];
        $lng = $data['lng'];
        $placename = $data['name'];
        
        return view('showplace', ['place' => $data], ['user' => $user])->with([
            'lat' => $lat,
            'lng' => $lng,
            'placename' => $placename]);
    }
    
    public function leave($place_id)
    {
        $user = Auth()->user();
        $id = Auth()->id();
        
        $data = new Place();
        $data->where('id', '=', $place_id)->delete();
        
        return redirect()->action('MypageController@index');
        //return view('member', ['leader' => $memdata], ['user' => $user])->with('members', $members);
    }
}
