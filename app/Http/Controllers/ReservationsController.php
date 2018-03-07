<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ADDING AUTH CLASS //

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->id) && !Auth::user()->role == 'admin'){
            $reservations = Reservation::where('clientId',Auth::user()->id)->get();
            return view ('reservations.index',compact('reservations'));
        }elseif(Auth::user()->role == 'admin'){
            $reservations = Reservation::all();
            return view ('reservations.index',compact('reservations'));
        }else{
            return view ('reservations.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::all();
        return view ('reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CREATE NEW INSTANCE
        $reservation = new Reservation;

        // VALIDATE

        // ADD DATA
        $reservation->clientId = $request->clientId;
        $reservation->visitors = $request->visitors;
        $reservation->reservedTableId = $request->reservedTableId;
        $reservation->reservation_time = $request->date.' '.$request->time;;

        // SAVE
        $reservation->save();

        // ADD CONFIRMATION MESSAGE
        $request->session()->flash('status', 'Task was successful!');

        $reservations = Reservation::where('clientId',Auth::user()->id);
        return view ('reservations.index', compact('reservations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
