@extends('layouts.app')

@section('content')
  <div class="content">
    <h1>Ваши резюме</h1>
    <ul class="summary-list">
      @foreach($summaries as $summary)
        <li>{{$summary->position}} {{date('Y.m.d', strtotime($summary->created_at))}}<br>
          <button class="edit">Редактировать</button>
          <button class="delete">Удалить</button>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
