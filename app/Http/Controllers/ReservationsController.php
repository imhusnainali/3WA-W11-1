<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    public function __construct(){
        $this->middleware('user')->except('index');
        $this->middleware('admin')->only('userReservations'); /* CUSTOM ROUTE TO CHECK EXACT USER RESERVATIONS */
    }

    public function index()
    {
        $reservations = [];

        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                $reservations = Reservation::all();
            }else{
                $reservations = Reservation::where('clientId',Auth::user()->id)->get();
            }
        }
        return view ('reservations.index', compact('reservations'));
    }

    public function userReservations($id){
        $reservations = Reservation::where('clientId',$id)->get();
        return view ('reservations.index', compact('reservations'));
    }

    public function checkReservations(){
        $reservations = Reservation::where('confirmed','0')->count();
        return $reservations;
    }

    public function create()
    {
        $tables = Table::all();
        return view ('reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        // CREATE NEW INSTANCE
        $reservation = new Reservation;

        // CHECK DB IF TABLE IS TAKEN
        $table = Reservation::where('reservedTableId',$request->reservedTableId)->where('reservation_date',$request->reservation_date)->where('reservation_time',$request->reservation_time)->first();

        if(isset($table->id)){
            // ADD ERROR MESSAGE
            $request->session()->flash('status', 'Sorry. This table is already reserved');
            // REDIRECT TO INDEX ROUTE
            return redirect()->route('reservations.index');
        }else{
            // ADD DATA
            $reservation->clientId = $request->clientId;
            $reservation->visitors = $request->visitors;
            $reservation->reservedTableId = $request->reservedTableId;
            $reservation->reservation_date = $request->reservation_date;
            $reservation->reservation_time = $request->reservation_time;

            // SAVE
            $reservation->save();

            // ADD CONFIRMATION MESSAGE
            $request->session()->flash('status', 'Reservation was successful!');

            // REDIRECT TO INDEX ROUTE
            return redirect()->route('reservations.index');
        }
    }


    public function show(Reservation $reservation)
    {
        //
    }


    public function edit(Reservation $reservation)
    {
        //
    }


    public function update(Request $request, Reservation $reservation)
    {
        Reservation::where('id', $reservation->id)->update(['confirmed' => $request->confirmed]);
        return redirect()->route('reservations.index');
    }


    public function destroy(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation -> id);
        $reservation -> delete();
        return redirect()->route('reservations.index');
    }

}
