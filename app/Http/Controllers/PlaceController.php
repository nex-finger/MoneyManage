<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Picture;

class PlaceController extends Controller
{
    public function index()
    {
        $md = new Place;
        $user = Auth()->user();
        $data = $md->latest()->paginate(10);
        
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
        $place = new Place;
        $picture = new Picture;
        $user = Auth()->user();
        $data_pl = $place->find($id);
        $data_pi = $picture->where('place_id', '=', $id)->get();
        
        $lat = $data_pl['lat'];
        $lng = $data_pl['lng'];
        $placename = $data_pl['name'];
        
        $api = 'https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=';
        $api .= config('services.map.key');
        $api .= '&callback=initMap';
        
        //dd($api);
        
        return view('showplace')->with([
            'place' => $data_pl,
            'images' => $data_pi,
            'user' => $user,
            'lat' => $lat,
            'lng' => $lng,
            'placename' => $placename,
            'api' => $api,
            ]);
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
