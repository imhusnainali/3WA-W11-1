<div class="col-12 card p-3 my-3">

    <div class="row">

        <div class="col-4">
            <img class="img-fluid" src="{{ $dish -> image }}" alt="">
        </div>

        <div class="col-8">
            <a href="{{route('dishes.show',$dish->id)}}">
                <h4>{{ $dish -> title }}</h4>
            </a>
            <p class="card-text">Price: {{ $dish -> price }}</p>
            <p class="card-text">Price: {{ $dish -> calories }}</p>
            <p class="card-text">{{ str_limit($dish -> description, 200) }}</p>

            <div class="row">
                <div class="col-12">
                    <form class="dishAJAX d-inline-block">
                        @csrf
                        <input type="text" name="dishId" value="{{ $dish->id }}" hidden>
                        <input type="text" name="dishPrice" value="{{ $dish -> price }}" hidden>
                        <input type="text" name="clientId" value="1" hidden>
                        <input type="submit" class="btn btn-primary" value="Add To Cart">
                    </form>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <a href="{{ route('dishes.edit', $dish->id)}}" >
                        <button class="btn btn-warning" type="button" name="button">Edit dish</button>
                    </a>

                    <form class="d-inline-block" action="{{ route('dishes.destroy', $dish->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
