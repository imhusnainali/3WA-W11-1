@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12">
                <!-- ADD SUCCESS MESSAGE IF RESERVATION WAS ADDDED -->
                @if(Request::session()->get('status'))
                    <h3>{{ Request::session()->get('status') }}</h3>
                @else
                    <h3>Choose your dishes:</h3>
                @endif
            </div>

                @foreach($dishes as $dish)
                        @component('components.card',['dish' => $dish])
                        @endcomponent
                @endforeach

        </div>
    </div>

@endsection
