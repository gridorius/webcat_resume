@extends('layouts.app')

@section('content')
<div class="content">
    <h1>{{$company->name}}</h1>
    @if($company->user_id != Auth::id())
    <a class="link-button blue" href="/summaries/send/{{$company->id}}">Отправить резюме</a><br><br>
    @else
    <form action="/companies/{{$company->id}}" method="post">
        @csrf
        <a class="link-button blue" href="/companies/edit/{{$company->id}}">Редактировать</a>
        {{ method_field('DELETE') }}
        <input type="submit" class="link-button red" value="Удалить">
    </form>
    @endif
    <ul class='description'>
        <li>Сайт: {{$company->site}}</li>
        <li>Адресс: {{$company->addres}}</li>
        <li>Телефон: {{$company->phone}}</li>
    </ul>
    <h2>Описание</h2>
    <p class="description">{{$company->description}}</p>
    <br>
    @if($company->user_id == Auth::id())
    <h2>Присланые резюме</h2>
    <div class="table-container">
        <table class='summary-responses-list'>
            <tr>
                <th>Резюме</th>
                <th>Отзыв</th>
            </tr>
            @foreach($company->summaryResponses as $response)
            <tr>
                <td>
                    <a href="/summaries/{{$response->summary->id}}">{{$response->summary->position}}</a>
                </td>
                <td>
                    {{$response->response === null ? '---' : ($response->response ? 'Положительный' : 'Отрицательный')}}
                </td>
                <td>
                    <a class="link-button blue mini" href="/summaryresponse/set/{{$response->id}}/1">Ответить положительно</a>
                </td>
                <td>
                    <a class="link-button red mini" href="/summaryresponse/set/{{$response->id}}/0">Ответить отрицательно</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</div>
@endsection
