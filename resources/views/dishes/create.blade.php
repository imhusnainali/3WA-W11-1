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
                            <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" placeholder="Enter dish title">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @if($errors->has('description')) is-invalid @endif" id="description" name="description" placeholder="Enter dish description">
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input step="any" type="number" class="form-control @if($errors->has('price')) is-invalid @endif" id="price" name="price" placeholder="Enter dish price">
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="calories" class="col-sm-2 col-form-label">Calories</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @if($errors->has('calories')) is-invalid @endif" id="calories" name="calories" placeholder="Enter amount calories">
                            @if($errors->has('calories'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('calories') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="serves" class="col-sm-2 col-form-label">Serves</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @if($errors->has('serves')) is-invalid @endif" id="serves" name="serves" placeholder="Enter amount of people served with dish">
                            @if($errors->has('serves'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('serves') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control @if($errors->has('image')) is-invalid @endif" id="image" name="image" placeholder="Upload dish image">
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-warning" type="submit">Submit</button>

                </form>
            </div>

        </div>
    </div>

@endsection
