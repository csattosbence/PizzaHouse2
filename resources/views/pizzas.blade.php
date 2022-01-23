@extends('layout.main')

@section('content')
    <div class="container">
        <h1 class="text-center m-5">PIZZAS</h1>
        <div class="row">
                @foreach($pizzas as $pizza)
                    @include('pizza._item')
                @endforeach
        </div>
    </div>
@endsection
