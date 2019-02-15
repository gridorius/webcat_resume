@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Результаты поиска</h1>
    <h2>Компании</h2>
    @if($companies->count())
    @foreach($companies as $company)
    <li>
        <a class="company-name" href="/companies/{{$company->id}}">
            {{$company->name}}
        </a>
        <div class="company-min-description">
            {{$company->description}}
        </div>
    </li>
    @endforeach
    @else
    <p>Компании по вашему запросу не найдены</p>
    @endif
    <h2>Присланые резюме</h2>
    @if($summaries->count())
    @foreach($summaries as $summary)
    <li>
        <a href="/summaries/{{$summary->id}}">{{$summary->position}}</a>
    </li>
    @endforeach
    @else
    <p>Резюме по вашему запросу не найдено</p>
    @endif
</div>

@endsection
