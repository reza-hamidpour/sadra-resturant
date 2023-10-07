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

    public function food_types()
    {
        return $this->belongsToMany(Foods_type::class, 'foods_food_type', 'foods_id', 'food_types_id');
    }

    public function getRateRatio(): int
    {
        return 0;
    }

    public function getAgeStatus(): string
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

        if($this->draft){
            return "Published";
        }

        return "Drafted";
    }

    public function getFoodTypesIds(){
        $ids = [];
        foreach( $this->food_types as $food_type){
            $ids[] = $food_type->id;
        }
        return $ids;
    }

}
