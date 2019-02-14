@extends('layouts.app')

@section('content')
  <div class="content">
    <h1>Выберите резюме</h1>
    <ul class="summary-list">
      @foreach($summaries as $summary)
        <li>
          <a href="/summaries/send/{{$summary->id}}/{{$company->id}}">{{$summary->position}}</a>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
