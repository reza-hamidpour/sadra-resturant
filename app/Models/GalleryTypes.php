<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryTypes extends Model
{
    use HasFactory;

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

}
