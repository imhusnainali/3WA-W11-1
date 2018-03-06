@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{{ $dish->title }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <p>{{ $dish->description }}</p>
            </div>

            <div class="col-4">
                <table>
                    <tr>
                        <td>Price:</td>
                        <td>{{ $dish->price }} Eur</td>
                    </tr>
                    <tr>
                        <td>Calories:</td>
                        <td>{{ $dish->calories }} kCal</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                IMAGES
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form id="form{{ $dish->id }}" onsubmit="addToCart({{ $dish->id }})">
                    @csrf
                    <input type="text" name="dishId" value="{{ $dish->id }}" hidden>
                    <input type="text" name="clientId" value="1" hidden>
                    <input type="submit" class="btn btn-primary" value="Add To Cart">
                </form>

                @if(Auth::user()->role == 'admin')
                    <a href="#">
                        <button class="btn btn-danger" type="button" name="button">Edit dish</button>
                    </a>
                @endif

            </div>
        </div>

    </div>

@endsection
