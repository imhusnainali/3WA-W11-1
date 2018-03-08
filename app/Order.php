<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

    public function carts()
        {
            return Cart::where('orderId',$this->dishId)->get();
        }

    public function users()
        {
            return User::where('id',$this->clientId)->first();
        }
}
