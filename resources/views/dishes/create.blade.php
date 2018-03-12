@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12">
                <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter dish title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Enter dish description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter dish price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="calories" class="col-sm-2 col-form-label">Calories</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="calories" name="calories" placeholder="Enter amount calories">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" name="image" placeholder="Upload dish image">
                        </div>
                    </div>

                    <button class="btn btn-warning" type="submit">Submit</button>

                </form>
            </div>

        </div>
    </div>

@endsection
