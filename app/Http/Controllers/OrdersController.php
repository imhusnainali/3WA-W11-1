<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Helpers;
use Illuminate\Support\Facades\Auth; // ADDING AUTH CLASS //

class OrdersController extends Controller
{

    public function __construct(){
        $this->middleware('user')->except('index');
        $this->middleware('admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CHECK IF CART IS NOT EMPTY


        // CREATE NEW INSTANCE
        $order = new Order;

        // ADD DATA
        $order->clientId = Auth::user()->id;
        $order->amount = Helpers::cartSum();
        $order->tax_amount = Helpers::cartVAT();

        // SAVE
        $order->save();

        // GET INSERTED ORDER ID
        Cart::whereNull('orderId')->where('token', $request->_token)->update(['orderId' => $order->id]);

        return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order = Order::find($order -> id);
        $order -> delete();
        return redirect()->route('orders.index');
    }
}
