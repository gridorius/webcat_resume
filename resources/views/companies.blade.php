@extends('layouts.app')

@section('content')
<div class="content">
  <ul class="company-list">
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
  </ul>
</div>
@endsection
