<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // public function dishes()
    //     {
    //         return Dish::where('id',$this->dishId)->first();
    //     }

    public function dishes()
        {
            return $this->hasOne('App\Dish','id','dishId');
        }
}
