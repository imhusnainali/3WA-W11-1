<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{

    public function index(Request $request)
    {
        $carts = Cart::whereNull('orderId')->where('token',csrf_token())->get();
        return view('carts.index', compact('carts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cart = new Cart;
        $cart->token = $request->_token;
        $cart->dishId = $request->dishId;
        $cart->clientId = $request->clientId;
        $cart->save();
    }

    public function show(Cart $cart)
    {
        //
    }

    public function edit(Cart $cart)
    {
        //
    }

    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function destroy(Cart $cart)
    {
        $cart = Cart::find($cart -> id);
        $cart -> delete();
        return redirect()->route('carts.index');
    }
}
