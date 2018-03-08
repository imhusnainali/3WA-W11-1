@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                <h3>Edit dish</h3>


                <form method="post" action="{{ route('dishes.update',$dish->id) }}">
                    @csrf
                    @method('put')

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" value="{{ $dish->title }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="price" id="price" value="{{ $dish->price }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="calories" class="col-sm-2 col-form-label">Calories</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="calories" id="calories" value="{{ $dish->calories }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="calories" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" rows="8" cols="80">{{ $dish->description }}</textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit" name="button">Submit</button>

                </form>

            </div>
        </div>
    </div>

@endsection
