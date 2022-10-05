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
        
        $data->save();
        
        return redirect('/place');
    }
    
    public function show($id)
    {
        $md = new Place;
        $user = Auth()->user();
        $data = $md->find($id);
        
        return view('showplace', ['place' => $data], ['user' => $user]);   
    }
}
