@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>User Profile</h3>
                    @if($user->role == 'admin')
                        <p>This user has admin rights!</p>
                    @endif
                <form>
                    <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="name" value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="surname" value="{{ $user->surname }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="birthday" value="{{ $user->birthday }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="phone" value="{{ $user->phone }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="address" value="{{ $user->address }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="city" value="{{ $user->city }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="country" value="{{ $user->country }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zip" class="col-sm-2 col-form-label">Zip</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="zip" value="{{ $user->zip }}">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
