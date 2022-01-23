@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row ">

            @foreach($orders as $order)
                @include('order._item')
            @endforeach
        </div>
    </div>
@endsection
