
<div class="card p-2 my-2">

    <div class="card-block">
        <h3>
            <a href="{{route('dishes.show',$dish->id)}}">
                {{ $dish -> title }}
            </a>
        </h3>
        <p class="card-text">{{ str_limit($dish -> description, 100) }}</p>
        <p class="card-text">Price: {{ $dish -> price }}</p>
    </div>

    <div class="card-block" >
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
