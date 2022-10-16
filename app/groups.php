<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class groups extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'groups';

    protected $fillable = [
        'name', 'leader_id'    
    ];
    
    protected $guarded = [
        'created_at', 'updated_at'    
    ];
    
    public function members()
    {
        return $this->hasMany('App\Member', 'user_id', 'id');
    }
    
    public function reserves()
    {
        return $this->hasMany('App\Reserve', 'group_id', 'id');
    }
}
