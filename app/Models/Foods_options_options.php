<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods_options_options extends Model
{
    use HasFactory;
    protected $fillable = ['option_value', 'price'];
    public $timestamps = false;

    public function food_options(){
        return $this->belongsTo(Foods_options::class, 'option_id', '');
    }

}
