<?php

    namespace App\Http;
    use App\Dish;
    use App\Cart;
    use App\Reservation;

    class Helpers {

        // STATIC FUNCTION DOES NOT REQUIRE AN INSTANCE

        public static function cartItems(){
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

            return number_format($cartSum,2,".","");
        }

        public static function cartVAT(){
            $cartVAT = Helpers::cartSum() * 0.21;
            return round($cartVAT,2);
        }

        public static function cartTotal(){
            $cartTotal = Helpers::cartSum() + Helpers::cartVAT();
            return number_format($cartTotal,2,".","");
        }

        // ADD INDICATION TO ADMIN ABOUT UNCOFIRMED RESERVATIONS
        public static function confirmReservations(){
            $reservations = Reservation::where('confirmed','0')->count();
            return $reservations;
        }
    }

?>
