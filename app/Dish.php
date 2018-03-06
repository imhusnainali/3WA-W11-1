<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // TO ENABLE MASS ASSIGNMENT WITH Input::all()
    protected $fillable = [
        'title',
        'description',
        'price',
        'calories',
        'image',
    ];
}
