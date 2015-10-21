@extends('journal.master')
@section('content')
<div class="columns intro">
    <div class="single-column column">
        <h2>Stats for {{$date}}</h2>
    </div>
</div>
<div class="columns stats">
    <div class="column one-fifth stats_block">
        <p>
            Primary Cognition
        </p>
        @if ($primary)
            @foreach ($primary as $item)
                @foreach ($item as $stat)
                    {{$stat[0]}}<span class="right">{{$stat[1]}}</span>
                @endforeach
            @endforeach
        @else
            <p class="no-data">
                No primary data.
            </p>
        @endif
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Secondary Cognition
        </p>
        @if ($secondary)
            @foreach ($secondary as $item)
                @foreach ($item as $stat)
                    {{$stat[0]}}{{$stat[1]}}<br>
                @endforeach
            @endforeach
        @else
        <p class="no-data">
            No secondary data.
        </p>
        @endif
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Emotion
        </p>
        @if ($emotion)
            @foreach ($emotion as $item)
                @foreach ($item as $stat)
                    {{$stat[0]}}{{$stat[1]}}<br>
                @endforeach
            @endforeach
        @else
            <p class="no-data">
                No emotional data.
            </p>
        @endif
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Average Time Taken
        </p>
    </div>
    <div class="column one-fifth stats_block">
        <p>
            Average Finish Time
        </p>
    </div>
</div>
@endsection
