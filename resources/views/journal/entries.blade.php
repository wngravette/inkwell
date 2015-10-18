@extends('journal.master')
@section('additional_head')
@endsection
@section('content')
<div class="columns intro">
    <div class="single-column column">
        <h2>Your Previous Entries</h2>
    </div>
</div>
<script>
$(document).ready(function() {
$('.entry_menu').hide();
    $('i.entry_menu_btn').on("click", function() {
        var entry_id = $(this).attr('data-entry-id');
        // $('.entry_menu').slideUp(250);
        $('div#'+entry_id).slideToggle(250);
    });
});
</script>
<div class="columns">
    <div class="column one-half entries">
        <form onsubmit="location.href='/journal/entries/handle/' + document.getElementById('userdate').value; return false;">
            <div class="input-group">
                <input id="userdate" type="text" name="userdate" placeholder="'Last Tuesday', '14th August', 'three days agos'">
                <span class="input-group-button">
                <button class="btn" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                </span>
            </div>
        </form>
        @foreach($entries as $entry)
            <div class="entry_block column single-column" data-entry-id="{{$entry->id}}">
                <p class="entry_date">
                    {{$entry->entry_date_format}} <i class="fa fa-chevron-down menu_caret entry_menu_btn" data-entry-id="{{$entry->id}}"></i>
                    @if ($entry->entry_status == "open")
                    <span class="state state-open">Still time to write!</span>
                    @endif
                </p>
                <div id="{{$entry->id}}" class="entry_menu menu one-third column">
                    <p>
                        <span>
                        @if ($entry->entry_status == "open")
                        <a class="btn" href="/journal" role="button">Write</a>
                        @else
                        <a class="btn" href="/journal/entries/{{$entry->id}}" role="button">View</a>
                        @endif
                        </span>
                    </p>
                </div>
                <p class="entry_details">{{number_format($entry->word_count)}} words &middot; Took {{$entry->time_taken}} to write.</p>
            </div>
        @endforeach
    </div>
    <div class="column one-third entries_nav right">
        <div id="cal-heatmap"></div>
        <button id="previousSelector-a-previous" class="btn btn-sm" type="button"><i class="fa fa-chevron-up"></i></button>
        <button id="nextSelector-a-next" class="btn btn-sm" type="button"><i class="fa fa-chevron-down"></i></button>
        <script type="text/javascript">
        	var cal = new CalHeatMap();
            var start_date = new Date();
            start_date.setDate(1);
            start_date.setMonth(start_date.getMonth()-1);
            cal.init({
                itemName: ["word", "words"],
            	itemSelector: "#cal-heatmap",
            	domain: "month",
            	subDomain: "x_day",
                verticalOrientation: true,
            	cellSize: 25,
                subDomainTextFormat: "%d",
                start: start_date,
            	range: 2,
            	displayLegend: false,
                label: {
            		position: "top",
                    prefix: "right"
            	},
                legendColors: {
            		empty: "#ededed",
                    base: "#ededed",
            	},
                data: "/api/user/contribs",
                onClick: function(date, nb) {
        	        window.location.replace('/journal/entries/handle/'+date);
            	},
                previousSelector: "#previousSelector-a-previous",
                nextSelector: "#nextSelector-a-next"
            });
        </script>
    </div>
</div>
@endsection
