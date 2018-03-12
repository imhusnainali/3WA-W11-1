<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;



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
        return view('dishes.create');
    }

    public function store(Request $request)
    {
        $dish = new Dish;

        // UPLOAD IMAGE TO STORAGE
        $image = $request->file('image')->store('public/images');

        // CREATE DATA
        $dish->title = $request->title;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->calories = $request->calories;
        $dish->image = substr_replace($image,'storage',0,6);
        $dish->save();

        return redirect()->route('dishes.index');
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
