<?php

    namespace App\Http;
    use App\Dish;
    use App\Cart;

    class Helpers {

        // STATIC FUNCTION DOES NOT REQUIRE AN INSTANCE

        public static function cartTotal(){
            $token = csrf_token();
            return Cart::whereNull('orderId')->where('token',$token)->count();
        }

        public static function cartSum(){
            $cartSum = 0;
            $token = csrf_token();
            $items = Cart::whereNull('orderId')->where('token',$token)->get();

            foreach($items as $item){
                $cartSum = $cartSum + $item->dishes->price;
            }

            return $cartSum;
        }

        public static function cartVAT(){
            $cartVAT = Helpers::cartSum() * 0.21;
            return $cartVAT;
        }
    }

?>
