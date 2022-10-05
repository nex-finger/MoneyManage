<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Place extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'places';

    protected $fillable = [
        'name', 'leader_id', 'address', 'value'    
    ];
    
    protected $guarded = [
        'created_at', 'updated_at'    
    ];

    // Relationship
    public function option()
    {
        return $this->hasMany(option::class, 'place_id', 'id');
    }
}
