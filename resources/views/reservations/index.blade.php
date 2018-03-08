@extends('layouts.app')

@section('content')

    <div class="container">

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
            @if(count($reservations) > 0)
                <div class="row">
                    <div class="col-12">
                        <h3>Reservations</h3>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>

                            @if(Auth::check() && Auth::user()->role == 'admin')
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
                                        <!-- DELETE RESERVATION -->
                                            <form class="d-inline-block" action="{{ route('reservations.destroy', $reservation->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                            </form>
                                        <!-- END DELETE RESERVATION -->

                                        <!-- CONFIRM RESERVATION -->
                                        @if(Auth::check() && Auth::user()->role == 'admin' && $reservation->confirmed == 0)
                                            <form class="d-inline-block" action="{{ route('reservations.update',$reservation->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="text" name="confirmed" value="1" hidden>
                                                <button class="btn btn-success" type="submit" name="button">Confirm</button>
                                            </form>
                                        @endif
                                        <!-- END CONFIRM RESERVATION -->

                                        <!-- REMOVE CONFIRMATION -->
                                        @if(Auth::check() && Auth::user()->role == 'admin' && $reservation->confirmed == 1)
                                            <form class="d-inline-block" action="{{ route('reservations.update',$reservation->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="text" name="confirmed" value="0" hidden>
                                                <button class="btn btn-warning" type="submit" name="button">Unconfirm</button>
                                            </form>
                                        @endif
                                        <!-- END REMOVE CONFIRMATION -->

                                    </td>
                                </tr>
                            @endforeach

                    </tbody>
                </table>
            @else
                <div class="row">
                    <div class="col-12">
                        <h3>You do not have any reservations</h3>
                    </div>
                </div>
            @endif

            <!-- ADD RESERVATION BUTTON -->
            @if(Auth::check() && Auth::user()->role != 'admin')
                <div class="row">
                    <a class="btn btn-secondary col-12" href="{{ route('reservations.create') }}">Add reservation</a>
                </div>
            @endif
            <!-- END ADD RESERVATION BUTTON -->

        @endif
    </div>
@endsection
