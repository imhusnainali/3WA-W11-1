@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

        @if(count($orders) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>ID</th>
                        <th>Client</th>
                        <th>Order content</th>
                        <th>Price<br>(Eur)</th>
                        <th>VAT<br>(Eur)</th>
                        <th>Total<br>(Eur)</th>
                        <th>Created</th>

                        @if(Auth::user()->role=='admin')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->users()->name }} {{ $order->users()->surname }}</td>
                                <td>

                                    <ul>
                                        @foreach($order->carts as $cart)
                                            <li>
                                                <a href="{{ route('dishes.show',$cart->dishes->id)}}">{{ $cart->dishes->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->tax_amount }}</td>
                                <td>{{ $order->amount + $order->tax_amount }}</td>
                                <td>{{ $order->created_at }}</td>

                                <!-- DELETE RESERVATION -->
                                @if(Auth::user()->role=='admin')
                                <td class="align-middle text-center">
                                    <form class="d-inline-block" action="{{ route('orders.destroy', $order->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                    </form>
                                </td>
                                @endif
                                <!-- END DELETE RESERVATION -->
                            </tr>
                        @endforeach

                </tbody>
            </table>
        @else
            <h3>You do not have any placed orders</h3>
        @endif

        </div>
    </div>
</div>



@endsection
