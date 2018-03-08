@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Adress</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user -> id }}</td>
                            <td>{{ $user -> name }}</td>
                            <td>{{ $user -> surname }}</td>
                            <td>{{ $user -> phone }}</td>
                            <td>{{ $user -> email }}</td>
                            <td>{{ $user -> address }}, {{ $user -> city }}, {{ $user -> country }}</td>

                            <td>
                                <a href="reservations/{{ $user -> id }}/user"><button type="button" class="btn btn-warning">Reservations</button></a>
                                <a href="#"><button type="button" class="btn btn-warning">Orders</button></a>

                                @if(Auth::user()->id != $user->id)
                                    <form class="d-inline-block" action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
