@extends('layout.main')

@section('content')
    <div class="text-center m-5">
        <h1 class="display-4">{{__('Register')}}</h1>
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('auth.register')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">{{__('Full name')}}</label>
                            <input class="form-control {{$errors->has('Name') ? 'is-invalid': '' }}" type="text" name="name" value="{{old('name')}}"/>
                            @if ($errors->has('name'))
                                <p class="invalid-feedback">{{$errors->first('name')}}</p>
                            @endif
                        </div>
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
                        <div class="mb-3">
                            <label for="password_confirmation">{{__('Password confirmation')}}</label>
                            <input class="form-control {{$errors->has('password_confirmation') ? 'is-invalid': '' }}" type="password" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                            @if ($errors->has('password_confirmation'))
                                <p class="invalid-feedback">{{$errors->first('password_confirmation')}}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email">{{__('Address')}}</label>
                            <input class="form-control {{$errors->has('address') ? 'is-invalid': '' }}" type="text" name="address" value="{{old('address')}}"/>
                            @if ($errors->has('address'))
                                <p class="invalid-feedback">{{$errors->first('address')}}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email">{{__('Phone Number')}}</label>
                            <input class="form-control {{$errors->has('phone_number') ? 'is-invalid': '' }}" type="text" name="phone_number" value="{{old('phone_number')}}"/>
                            @if ($errors->has('phone_number'))
                                <p class="invalid-feedback">{{$errors->first('phone_number')}}</p>
                            @endif
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" value="1" name="terms">
                            <label class="form-check-label" for="terms">
                                {{__('Agree Terms')}}
                            </label>
                            @if($errors->has('terms'))
                                <p class="invalid-feedback">{{$errors->first('terms')}}</p>
                            @endif
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg">{{__('Sign Up')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
