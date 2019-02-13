@extends('layouts.app')

@section('content')

<form class="auth-form" method="POST" action="{{ route('login') }}">
    @csrf
    <h1>Авторизация</h1>
    <input id="email" placeholder="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
    <button type="submit">
        Войти
    </button>
</form>
@endsection
