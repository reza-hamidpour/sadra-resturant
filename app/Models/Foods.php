<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $guarded = [];
    /**
     * @var mixed
     */

    public function FoodType(){
        return $this->hasMany(Foods_type::class);
    }

    public function getRateRatio(): int
    {
        return 0;
    }

    public function getAgeStatue(): string
    {

        if( $this->need_age_check == true ) {
            return "True";
        }

        return "False";
    }

    public function getTotalOrder(): int
    {
        return 0;
    }

    public function getStatus(): string
    {
        if($this->draft === true){
            return "Published";
        }

        return "Drafted";
    }



}
