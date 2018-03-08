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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user -> id }}</td>
                            <td>{{ $user -> name }}</td>
                            <td>{{ $user -> surname }}</td>
                            <td>{{ $user -> email }}</td>
                            <td>{{ $user -> role }}</td>

                            <td>
                                <a href="reservations/{{ $user -> id }}"><button type="button" class="btn btn-warning">Reservations</button></a>
                                <a href="#"><button type="button" class="btn btn-warning">Orders</button></a>
                                <a href="{{ route('users.edit',$user -> id )}}"><button type="button" class="btn btn-warning">Profile</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
