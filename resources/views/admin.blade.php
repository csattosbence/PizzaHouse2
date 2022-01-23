@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row text-center m-5">
            <h1>ADMIN PANEL</h1>
            <div class="col card m-5">
                <a class="btn btn-primary btn-block" href="{{route('orders.show')}}">Orders</a>
            </div>
        </div>
    </div>
@endsection
