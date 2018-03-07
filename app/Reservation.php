<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // TO ENABLE MASS ASSIGNMENT WITH Input::all()
    protected $fillable = [
        'clientId',
        'reservationTableId',
        'reservation_time',
    ];

    public function users()
        {
            return User::where('id',$this->clientId)->first();
        }
}
