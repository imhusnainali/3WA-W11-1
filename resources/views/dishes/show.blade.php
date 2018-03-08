@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3>{{ $dish->title }}</h3>
                <p>{{ $dish->description }}</p>
                <p>Price: {{ $dish->price }} Eur</p>
                <p>Calories: {{ $dish->calories }} kCal</p>
                <form class="dishAJAX">
                    @csrf
                    <input type="text" name="dishId" value="{{ $dish->id }}" hidden>
                    <input type="text" name="dishPrice" value="{{ $dish -> price }}" hidden>
                    <input type="text" name="clientId" value="1" hidden>
                    <input type="submit" class="btn btn-primary" value="Add To Cart">
                </form>
            </div>
            <div class="col-6">
                <img class="img-fluid" src="{{ $dish->image }}" alt="">
            </div>
        </div>
    </div>

@endsection
