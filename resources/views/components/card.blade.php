
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
            <form action="{{ route('carts.store') }}" method="post">
                @csrf
                <input type="text" name="dishId" value="{{ $dish->id }}" hidden>
                <input type="text" name="clientId" value="1" hidden>
                <button type="submit">Add To Cart</button>
            </form>
        </div>

</div>
