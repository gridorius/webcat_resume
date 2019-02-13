@extends('layouts.app')

@section('content')
<form class="auth-form register-form" method="POST" action="{{ route('register') }}">
    @csrf
    <h1>Регистрация</h1>
    <input id="name" placeholder="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    @if($errors->has('name'))
      <div class="input-error">
        {{$errors->first('name')}}
      </div>
    @endif
    <input id="email" placeholder="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    @if($errors->has('email'))
      <div class="input-error">
        {{$errors->first('email')}}
      </div>
    @endif
    <input id="password" placeholder="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    @if($errors->has('password'))
      <div class="input-error">
        {{$errors->first('password')}}
      </div>
    @endif
    <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required>
    @if($errors->has('password_confirmation'))
      <div class="input-error">
        {{$errors->first('password_confirmation')}}
      </div>
    @endif
    <button type="submit" class="btn btn-primary">
        Зарегистрироваться
    </button>
</form>
@endsection
