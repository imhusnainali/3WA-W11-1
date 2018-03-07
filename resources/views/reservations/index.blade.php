@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Reservations</h3>
            </div>
        </div>

        @if(!Auth::user())
            <div class="row">
                <div class="col-12">
                    <h3>Please log in to make a reservation</h3>
                </div>
            </div>
        @else
            <!-- ADD SUCCESS MESSAGE IF RESERVATION WAS ADDDED -->
            @if(Request::session()->get('status'))
                <h4>{{ Request::session()->get('status') }}</h4>
            @endif

            <!-- DISPLAY ALL USERS RESERVATIONS -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>

                        @if(Auth::user()->role=='admin')
                        <th>Phone</th>
                        @endif

                        <th>Table</th>
                        <th>Visitors</th>
                        <th>Reserved date</th>
                        <th>Status</th>

                        @if(Auth::user()->role=='admin')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->users()->name }} {{ $reservation->users()->surname }}</td>

                            @if(Auth::user()->role=='admin')
                            <th>{{ $reservation->users()->phone }}</th>
                            @endif

                            <td>{{ $reservation->reservedTableId }}</td>
                            <td>{{ $reservation->visitors }}</td>
                            <td>{{ $reservation->reservation_time }}</td>
                            <td>
                                @if($reservation->confirmed == 0)
                                    <span class="badge badge-secondary">Unconfirmed</span>
                                @else
                                    <span class="badge badge-success">Confirmed</span>
                                @endif
                            </td>

                            <td>
                                <a class="btn btn-warning" href="#">Confirm</a>
                                <a class="btn btn-danger" href="#">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- DISPLAY ADD RESERVATION BUTTON -->
            <div class="row">
                <a class="btn btn-secondary col-12" href="{{ route('reservations.create') }}">Add reservation</a>
            </div>
        @endif

    </div>
@endsection
