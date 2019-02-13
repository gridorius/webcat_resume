@extends('layouts.app')

@section('content')
<div class="content">
  <h1>Создать резюме</h1>
  <form action="/summaries" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-input" type="text" name="position" placeholder="Должность"><br><br>
    @if($errors->has('position'))
      <div class="input-error">
        {{$errors->first('position')}}
      </div>
    @endif
    <label>
      Файл резюме<br>
      <input type="file" name="resume">
    </label><br>
    @if($errors->has('resume'))
      <div class="input-error">
        {{$errors->first('resume')}}
      </div>
    @endif
    <input class="form-button" type="submit" value='Создать'>
  </form>
</div>
@endsection
