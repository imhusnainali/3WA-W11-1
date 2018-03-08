@extends('layouts.app')

@section('content')

    <div class="container">


            <div class="row">
                <div class="col-12">
                    <h3>Add reservation</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <form action="{{ route('reservations.store') }}" method="POST">

                        @csrf

                        <input type="text" name="clientId" value="{{ Auth::user()->id }}" hidden>

                        <div class="form-group row">
                            <label for="reservation_date" class="col-sm-2 col-form-label">Date of visit</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="reservation_date" name="reservation_date" placeholder="Resevation time">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reservation_time" class="col-sm-2 col-form-label">Time of visit</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="reservation_time" name="reservation_time" placeholder="Resevation time">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visitors" class="col-sm-2 col-form-label">Visitors</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="visitors" name="visitors" placeholder="Number of visitors">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reservedTableId" class="col-sm-2 col-form-label">Table</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="reservedTableId" name="reservedTableId">
                                    <option disabled selected>Choose table to reserve</option>
                                    @foreach($tables as $table)
                                        <option value="{{ $table->id }}">Table {{ $table->id }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <button class="btn btn-warning" type="submit" name="button">Reserve</button>

                    </form>

                </div>
            </div>

    </div>

@endsection
