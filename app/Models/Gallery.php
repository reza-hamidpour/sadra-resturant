<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'order', 'index_show', 'draft'];

    public function gallery_types(){
        return $this->hasMany(GalleryTypes::class);
    }


    public function getFirstPic(){
        $firstPic = GalleryTypes::where('gallery_id', $this->id)->first();
        if($firstPic)
            $firstPic = $firstPic->pic_url;
        else
            $firstPic = '';
        return $firstPic;
    }

    public function getStatus(){
        if( $this->draft == 0 )
            return "Published";
        else
            return "Draft";
    }

}
