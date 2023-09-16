<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods_type extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function foods(){
        return $this->belongsToMany(Foods::class, 'foods_food_type',
                              'food_types_id', 'food_id');
    }

}
