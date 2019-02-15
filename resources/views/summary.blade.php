@extends('layouts.app')

@section('content')
<div class="content">
    <h1>{{$summary->position}}</h1>
    @if($summary->user_id == Auth::id())
    <form action="/summaries/{{$summary->id}}" method="post">
        @csrf
        <a class="link-button transparent mini" href="/summaries/edit/{{$summary->id}}">Редактировать</a>
        {{ method_field('DELETE') }}
        <input type="submit" class="link-button red " value="Удалить">
    </form>
    @endif
    <br>
    <a href="/summaries/file/{{$summary->id}}">Файл с резюме</a>
    @if($summary->user_id == Auth::id())
    <h2>Оценки резюме</h2>
    <table class='summary-responses-list'>
        <tr>
            <th>Компания</th>
            <th>Оценка</th>
            <th>Дата отправки</th>
        </tr>
        @foreach($summary->responses as $response)
        <tr>
            <td>{{$response->company->name}}</td>
            <td>{{$response->response == null? '---' : ( $response->response ? 'Положительная' : 'Отрицательная' )}}</td>
            <td>{{$response->created_at}}</td>
        </tr>
        @endforeach
    </table>
    @endif
</div>
@endsection
