@extends('layouts.app')

@section('content')
<div class="content">
   <h1>Статистика</h1>
    <table class='summary-responses-list'>
        <tr>
            <th>Резюме</th>
            <th>Положительных отзывов</th>
        </tr>
        @foreach($summaries as $summary)
        <tr>
            <td>
                <a href="/summaries/{{$summary->id}}">{{$summary->position}}</a>
            </td>
            <td>
                {{$summary->responses->where('response', 1)->count()}}
            </td>
            <td></td>
        </tr>
        @endforeach
    </table>
    
    <h2>График положительных ответо по дням недели</h2>

    <div id="myChart"/>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.arrayToDataTable([
                ['Nitrogen', 'count'],
                ['Понедельник', {{$byDate[1]}}],
                ['Вторник', {{$byDate[2]}}],
                ['Среда', {{$byDate[3]}}],
                ['Четверг', {{$byDate[4]}}],
                ['Пятница', {{$byDate[5]}}],
                ['Суббота', {{$byDate[6]}}],
                ['Воскресенье', {{$byDate[7]}}],
            ]);

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
            chart.draw(data, null);
        }

    </script>

</div>
@endsection
