<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryTypes extends Model
{
    use HasFactory;

    protected $fillable = ['pic_url'];

    public function gallery(){
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }

}
