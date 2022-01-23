@extends('layout.main')

@section('content')
    <p class="display-4 alert-success m-5"> Your Order has been successfully sent!</p>
    <a class="btn btn-primary btn-lg m-5" href="{{route('home.show')}}"> return home</a>
@endsection
