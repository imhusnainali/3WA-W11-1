<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ADDING AUTH CLASS //

class Dish extends Model
{
    use SoftDeletes;

    // TO ENABLE MASS ASSIGNMENT WITH Input::all()
    protected $fillable = [
        'title',
        'description',
        'price',
        'calories',
        'image',
    ];
}
