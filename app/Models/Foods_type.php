<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods_type extends Model
{
    use HasFactory;

    public function Foods(){
        return $this->belongsToMany(Foods::class);
    }

}
