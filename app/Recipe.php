<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // Relationship
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'recipe_id', 'id');
    }
}