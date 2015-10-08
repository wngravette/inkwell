@extends('journal.master')
@section('content')
<div class="columns intro">
    <div class="single-column column">
        <h2>Your writing for {{$date}}</h2>
    </div>
</div>
<div class="columns pad">
    <div class="single-column column">
        <p class="pad">
            {!! $entry->entry_body !!}
        </p>
    </div>
</div>
<div class="columns info">
    <div class="single-column column entry_info">
        <p class="stats"><span class="info_block">{{$entry->word_count}} words</span></p>
    </div>
</div>
@endsection
