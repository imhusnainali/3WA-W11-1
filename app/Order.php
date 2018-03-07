<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function carts()
        {
            return Cart::where('orderId',$this->dishId)->get();
        }
}
