@extends('layouts.app')

@section('content')
<div class="content">
  <h1>{{$company->name}}</h1>
  <a class="link-button blue" href="/summaries/send/{{$company->id}}">Отправить резюме</a><br><br>
  <h2>Описание</h2>
  <p class="company-description">{{$company->description}}</p>
</div>
@endsection
