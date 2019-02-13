@extends('layouts.app')

@section('content')
  <div class="content">
    <h1>Ваши резюме</h1>
    <a class="link-button blue" href="/summaries/new">Создать резюме</a>
    <ul class="summary-list">
      @foreach($summaries as $summary)
        <li>{{$summary->position}} {{date('Y.m.d', strtotime($summary->created_at))}}<br>
          <button class="edit">Редактировать</button>
          <form action="/summaries/{{$summary->id}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <button class="delete">Удалить</button>
          </form>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
