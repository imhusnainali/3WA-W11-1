@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-12">

                <h3>Cart (<span id="cartContent">0</span>) </h3>

                @foreach($carts as $cart)

                    <div class="row py-3">
                        <div class="col-4">
                            <h4>Title: {{ $cart->dishes()->title }}</h4>
                            <p>Price: {{ $cart->dishes()->price }} Eur</p>
                            <button type="submit" class="btn btn-danger" name="button">Remove from cart</button>
                        </div>
                        <div class="col-8">
                            <p>Description: {{ $cart->dishes()->description }}</p>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Sub-total:</td>
                            <td><span>0</span></td>
                        </tr>
                        <tr>
                            <td>VAT:</td>
                            <td><span>0</span></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><span>0</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button class="btn btn-warning col-12" type="button" name="button">Checkout</button>
        </div>

    </div>


@endsection
