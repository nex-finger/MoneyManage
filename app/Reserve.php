<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'place_id',
        'group_id',
        'date',
    ];
    
    public function groups()
    {
        return $this->belongsTo('App\groups', 'group_id', 'id');
    }
    
    public function places()
    {
        return $this->belongsTo('App\Place', 'place_id', 'id');
    }
}
