<div class="col-12 card p-3 my-3">

    <div class="row">

        <div class="col-4">
            <img class="img-fluid" src="{{ $dish -> image }}" alt="">
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('dishes.show',$dish->id)}}">
                        <h4>{{ $dish -> title }}</h4>
                    </a>
                </div>
                <div class="col-6">
                    <p class="card-text">{{ str_limit($dish -> description, 300) }}</p>
                </div>

                <div class="col-6">
                    <ul>
                        <li><p class="card-text">Price: {{ $dish -> price }} Eur</p></li>
                        <li><p class="card-text">Calories: {{ $dish -> calories }} kCal</p></li>
                        <li><p class="card-text">Servers: {{ $dish -> serves }} @if($dish -> serves == 1) person @else people @endif</p></li>
                    </ul>
                </div>
            </div>



            <div class="row py-3">
                <div class="col-12">

                    @if(Auth::check() && Auth::user()->role == 'admin')
                        <a href="{{ route('dishes.edit', $dish->id)}}" >
                            <button class="btn btn-warning" type="button" name="button">Edit dish</button>
                        </a>
                        <form class="d-inline-block" action="{{ route('dishes.destroy', $dish->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" name="button">Delete</button>
                        </form>
                    @else
                        <form class="dishAJAX d-inline-block">
                            @csrf
                            <input type="text" name="dishId" value="{{ $dish->id }}" hidden>
                            <input type="submit" class="btn btn-primary" value="Add To Cart">
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
