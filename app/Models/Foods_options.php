<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods_options extends Model
{
    use HasFactory;


    public function foods(){
        return $this->belongsTo(Foods::class, 'food_id', 'id');
    }


    public function options(){
        return $this->hasMany(Foods_options_options::class, 'option_id', 'id');
    }

}
