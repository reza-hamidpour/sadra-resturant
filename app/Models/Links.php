<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function childs(){
        return $this->hasMany(self::class, 'parent');
    }

    public function parent(){

        return Links::where('id', $this->parent)->first();
    }

}
