@extends('layouts.app')

@section('content')
<div class="content">
  <h1>Редактировать компанию</h1>
  <form action="/companies" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <input type="hidden" name="id" value="{{$company->id}}">
    <input class="form-input" type="text" name="name" placeholder="Наименование" value="{{$company->name}}"><br><br>
    @if($errors->has('name'))
      <div class="input-error">
        {{$errors->first('name')}}
      </div>
    @endif
    <input class="form-input" type="text" name="site" placeholder="Сайт" value="{{$company->site}}"><br><br>
    @if($errors->has('site'))
      <div class="input-error">
        {{$errors->first('site')}}
      </div>
    @endif
    <input class="form-input" type="text" name="addres" placeholder="Аддрес" value="{{$company->addres}}"><br><br>
    @if($errors->has('addres'))
      <div class="input-error">
        {{$errors->first('addres')}}
      </div>
    @endif
    <input class="form-input" type="text" name="phone" placeholder="Телефон" value="{{$company->phone}}"><br><br>
    @if($errors->has('phone'))
      <div class="input-error">
        {{$errors->first('phone')}}
      </div>
    @endif
    <label>
      Описание<br>
        <textarea name="description" cols="30" rows="10">{{$company->description}}</textarea>
    </label><br>
    @if($errors->has('description'))
      <div class="input-error">
        {{$errors->first('description')}}
      </div>
    @endif
    <input class="form-button" type="submit" value='Обновить'>
  </form>
</div>
@endsection
