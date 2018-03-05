@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                <h3>Choose your dishes:</h3>

                @foreach($dishes as $dish)
                        @component('components.card',['dish' => $dish])
                        @endcomponent
                @endforeach

            </div>
        </div>
    </div>

@endsection
