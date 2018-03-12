@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3>{{ $dish->title }}</h3>
                <p>{{ $dish->description }}</p>
                <p>Price: {{ $dish->price }} Eur</p>
                <p>Calories: {{ $dish->calories }} kCal</p>

                @if(Auth::check() && Auth::user()->role == 'admin')
                    <a href="{{ route('dishes.edit', $dish->id)}}" >
                        <button class="btn btn-warning" type="button" name="button">Edit dish</button>
                    </a>
                    <form class="d-inline-block" action="{{ route('dishes.destroy', $dish->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                    </form>
                @else
                    <form class="dishAJAX d-inline-block">
                        @csrf
                        <input type="text" name="dishId" value="{{ $dish->id }}" hidden>
                        <input type="submit" class="btn btn-primary" value="Add To Cart">
                    </form>
                @endif

            </div>
            <div class="col-6">
                <img class="img-fluid" src="{{ $dish->image }}" alt="">
            </div>
        </div>
    </div>

@endsection
