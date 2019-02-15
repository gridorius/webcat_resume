<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav>
    <ul class="nav-menu">
      <li class="logo">
          <a href="/">Logo</a>
      </li>
      <li class="search">
        <form action="/search" method="post">
          @csrf
          <input type="text" name="text" placeholder="найти...">
          <input class="search-button" type='submit' value="">
        </form>
      </li>
    </ul>
    <ul class="nav-menu right">
      @guest
        <li>
            <a href="{{ route('login') }}">Войти</a>
        </li>
        <li>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Зарегистрироваться</a>
            @endif
        </li>
      @else
        <li>
          <a href="/companies">Компании</a>
        </li>
        <li class="user-menu">
            {{ Auth::user()->name }}
            <ul class="drop-down">
              <li>
                <a href="{{route('summaries')}}">Мои резюме</a>
              </li>
              <li>
                <a href="/companies/my">Мои компании</a>
              </li>
              <li>
                <a href="/statistics">Статистика</a>
              </li>
              <li>
                <a href="{{route('logout')}}">Выйти</a>
              </li>
            </ul>
        </li>
      @endguest
    </ul>
  </nav>




  <main>
    @yield('content')
  </main>
    </div>
</body>
</html>
