@extends('journal.master')
@section('additional_head')
@endsection
@section('content')
<div class="columns intro">
    <div class="single-column column">
        <h2>Your Writing Stats</h2>
    </div>
</div>
@if ($stats_disabled)
<div class="flash">
  Stats will become available once you write a couple of entries.
</div>
@else
<div class="columns stats">
    <div class="column one-fifth stats_block">
        <p>
            Words this Month
        </p>
        <h1>{{number_format($word_count)}}</h1>
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Words last Month
        </p>
        <h1>{{number_format($prev_word_count)}}</h1>
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Average Words per Entry
        </p>
        <h1>{{number_format($avg_words)}}</h1>
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Average Time Taken
        </p>
        <h1>{{$avg_time}}</h1>
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Average Finish Time
        </p>
        <h1>{{$avg_fin}}</h1>
    </div>
</div>
<div class="columns stats">
    <div class="column one-fifth stats_block common_words">
        <p>
            Most Common Words
        </p>
        @foreach ($common_words as $word => $count)
        <p>
            {{$word}}
        </p>
        @endforeach
    </div>
    <div class="column one-third stats_block common_words">
        <p>
            Words by Day
        </p>
        <script>
        $(function () {
            $('#words-per-day').highcharts({
                chart: {
                    type: 'spline',
                },
                xAxis: {
                    categories: [
                        @foreach ($word_counts as $date => $word_count)
                        '{{$date}}',
                        @endforeach
                    ],
                    labels: {
                        enabled: true,
                        y: 25
                    }
                },
                yAxis: {
                    title: {
                        text: 'Words'
                    },
                    labels: {
                        enabled: true,
                        format: '{value} words',
                    },
                    min: 0
                },
                tooltip: {
                    valueSuffix: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                },
                plotOptions: {
                    series: {
                        connectNulls: false
                    },
                    column: {
                        pointWidth: 10,
                        borderWidth: 1
                    },
                    spline: {
                        lineWidth: 2,
                    },
                },
                series: [{
                    name: 'Words',
                    data: [
                        @foreach ($word_counts as $date => $word_count)
                        {{$word_count}},
                        @endforeach
                    ]
                }]
            });
        });
        </script>
        <div id="words-per-day" style="height:200px"></div>
    </div>
    <div class="column one-third stats_block common_words">
        <p>
            Emotion in Writing
        </p>
        <script>
        $(function () {
            $('#emotion').highcharts({

                chart: {
                    polar: true,
                    type: 'line',

                },

                title: {
                    text: 'Budget vs spending',
                    x: -80
                },

                pane: {
                    size: '80%'
                },

                xAxis: {
                    categories: ['Affection', 'Expressiveness', 'Frustration'],
                    tickmarkPlacement: 'on',
                    lineWidth: 0,
                    labels: {
            			enabled: true,
            			style: {
            				color: '#999',
            				fontWeight: 'normal'
            			}
            		},
                },

                yAxis: {
                    gridLineInterpolation: 'polygon',
                    lineWidth: 0,
                    min: 0
                },

                tooltip: {
                    enabled: false
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'top',
                    y: 70,
                    layout: 'vertical'
                },

                series: [{
                    name: 'Allocated Budget',
                    data: [4, 2, 3],
                    pointPlacement: 'on'
                }]

            });
        });
        </script>
        <div id="emotion" style="height:200px"></div>
    </div>
</div>
@endif
@endsection
