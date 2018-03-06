<?php

    namespace App\Http;
    use App\Dish;
    use App\Cart;

    class Helpers {

        public static function cartTotal(){
            $token = csrf_token();
            return Cart::where('token',$token)->count();
        }

        public static function cartSum(){
            $cartSum = 0;
            $token = csrf_token();
            $dishes = Cart::where('token',$token)->get();

            foreach($dishes as $dish){
                $cartSum = $cartSum + Dish::where('id',$dish->dishId)->first()->price;
            }

            return $cartSum;
        }
    }

?>
