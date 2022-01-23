@extends('layout.main')

@section('content')
    <div class="container">
        <h1 class="text-center m-5">CART</h1>
        <div class="row">
            @if(Session::has('cart'))

                <h3 class="text-center mb-5">{{_('Order total price: '.$totalPrice.'Ft')}}</h3>
                @foreach($products as $product)
                    @include('cart._item')
                @endforeach

                <form method="post" action="{{route('order.store')}}">
                    @csrf
                    <button class="btn btn-primary btn-lg m-sm-2"> Place order</button>
                </form>

            @else
                <h3 class="text-center m-5">Your cart is empty</h3>
            @endif
        </div>
    </div>
@endsection
