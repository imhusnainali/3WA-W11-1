@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

        @if(count($orders) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Content</th>
                        <th>Price</th>
                        <th>VAT</th>
                        <th>Total</th>

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
                                <td>content</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->tax_amount }}</td>
                                <td>{{ $order->amount + $order->tax_amount }}</td>

                                <td>
                                    <!-- DELETE RESERVATION -->
                                    @if(Auth::user()->role=='admin')
                                        <form class="d-inline-block" action="{{ route('orders.destroy', $order->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                        </form>
                                    @endif
                                    <!-- END DELETE RESERVATION -->
                                </td>
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
