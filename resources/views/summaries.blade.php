@extends('layouts.app')

@section('content')
  <div class="content">
    <h1>Ваши резюме</h1>
    <a class="link-button blue" href="/summaries/new">Создать резюме</a>
    <ul class="summary-list">
      @foreach($summaries as $summary)
        <li>
          <a href="/summaries/{{$summary->id}}">
            {{$summary->position}}
          </a>
           {{date('Y.m.d', strtotime($summary->created_at))}}<br>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
