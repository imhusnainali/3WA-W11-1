<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Helpers;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function __construct(){
        $this->middleware('user')->except('index');
        $this->middleware('admin')->only('destroy');
    }

    public function index()
    {
        $orders = [];

        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                $orders = Order::all();
            }else{
                $orders = Order::where('clientId',Auth::user()->id)->get();
            }
        }
        return view ('orders.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // CHECK IF CART IS NOT EMPTY
        $currentCart = Cart::where('token', $request->_token)->whereNull('orderId')->get();

        if(count($currentCart) < 1){
            // ADD ERROR MESSAGE AND REDIRECT
            $request->session()->flash('status', 'Your cart is empty.');
            return redirect()->route('dishes.index');
        }else{
            // CREATE NEW INSTANCE
            $order = new Order;

            // ADD DATA
            $order->clientId = Auth::user()->id;
            $order->amount = Helpers::cartSum();
            $order->tax_amount = Helpers::cartVAT();

            // SAVE
            $order->save();

            // GET INSERTED ORDER ID AND UPDATE CART ITEMS
            Cart::whereNull('orderId')->where('token', $request->_token)->update(['orderId' => $order->id]);

            // ADD CONFIRMATION MESSAGE AND REDIRECT
            $request->session()->flash('status', 'Order was successful!');
            return redirect()->route('dishes.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Order $order)
    {
        $order = Order::find($order -> id);
        $order -> delete();
        return redirect()->route('orders.index');
    }
}
