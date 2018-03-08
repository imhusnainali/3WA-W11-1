<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class DishesController extends Controller
{

    public function __construct(){
        $this->middleware('admin')->except('index','show');
    }

    public function index(Request $request)
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    public function create()
    {
        echo 'create dish';
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Dish $dish)
    {
        return view('dishes/show',['dish' => $dish]);
    }

    public function edit(Dish $dish)
    {
        return view('dishes.edit',compact('dish'));
    }

    public function update(Request $request, Dish $dish)
    {
        Dish::where('id', $dish->id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'calories' => $request->calories,
            'description' => $request->description,
        ]);

        return redirect()->route('dishes.index');
    }

    public function destroy(Dish $dish)
    {
        $dish = Dish::find($dish -> id);
        $dish -> delete();
        return redirect()->route('dishes.index');
    }
}
