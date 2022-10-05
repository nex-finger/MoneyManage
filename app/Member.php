<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'user_id',
        'group_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function group()
    {
        return $this->belongsTo('App\groups', 'group_id', 'id');
    }
}
