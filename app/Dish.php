<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
