@extends('layout.main')

@section('content')
    <div class="text-center m-5">
        <h1 class="display-4">{{__('Login')}}</h1>
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                    <form action="{{route('auth.login')}}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="email">{{__('Email Address')}}</label>
                            <input class="form-control {{$errors->has('email') ? 'is-invalid': '' }}" type="text" name="email" value="{{old('email')}}"/>
                            @if ($errors->has('email'))
                                <p class="invalid-feedback">{{$errors->first('email')}}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password">{{__('Password')}}</label>
                            <input class="form-control {{$errors->has('password') ? 'is-invalid': '' }}" type="password" name="password" value="{{old('password')}}"/>
                            @if ($errors->has('password'))
                                <p class="invalid-feedback">{{$errors->first('password')}}</p>
                            @endif
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg">{{__('Sign in')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
