@extends('layout.main')

@section('content')
    <div class="container">
        <h1 class="text-center m-5">DRINKS</h1>
        <div class="row">
            @foreach($products as $product)
                @include('drink._item')
            @endforeach
        </div>
    </div>
@endsection
