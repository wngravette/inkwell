@extends('journal.master')
@section('content')
@if ($entry->word_count < 100)
<div class="flash">
    You need to write at least 100 words to use Stats.
</div>
@elseif ($no_stats == true && $entry->is_signed == 1 && $entry->word_count > 100)
<div class="flash">
    Your stats are being generated. Check back soon.
</div>
@elseif ($no_stats == true)
    <div class="flash">
        <script>
        $(document).ready(function() {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $('a.sign-entry-btn').on("click", function() {
                var entry_id = $(this).attr('data-entry-id');
                var button = $(this);
                $.ajax({
                    method: "POST",
                    url: "/journal/entries/"+entry_id+"/sign",
                    statusCode: {
                        503: function() {
                            alert('nah');
                        }
                    },
                    beforeSend: function() {
                        $(button).addClass('disabled');
                    },
                    success: function() {
                        $(button).html("Signed");
                        $('span#sign-msg').html('Your entry has been signed. Check back here soon for your stats.');
                    },
                });
            });

        });
        </script>
        <a class="btn btn-outline sign-entry-btn" data-entry-id="{{$entry->id}}" role="button">Sign my Entry</a>
        <span id="sign-msg" style="margin-left: 0.8em">Your stats will be here when writing closes. Sign your entry to close writing and generate your stats.</span>
    </div>
@else
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
            @foreach ($primary as $stat_name => $stat_number)
                <p class="stat">
                    {{$stat_name}}<span class="right">{{$stat_number}}</span>
                </p>
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
            @foreach ($secondary as $stat_name => $stat_number)
                <p class="stat">
                    {{$stat_name}}<span class="right">{{$stat_number}}</span>
                </p>
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
            @foreach ($emotion as $stat_name => $stat_number)
                <p class="stat">
                    {{$stat_name}}<span class="right">{{$stat_number}}</span>
                </p>
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
@endif
@endsection
