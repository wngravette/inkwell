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
                $(button).removeClass('disabled').html("Signed").fadeOut(400, function() {
                    $(this).next().html('Read');
                });
            }
        });
    });

});
</script>
<div class="columns">
    <div class="column one-half entries">
        <form onsubmit="location.href='/journal/entries/handle/' + document.getElementById('userdate').value; return false;">
            <div class="input-group">
                <input id="userdate" type="text" name="userdate" placeholder="'Last Tuesday', '14th August', 'three days ago'">
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
                    <span class="state state-open">Writing is open!</span>
                    @elseif ($entry->entry_status == "signed")
                    <span class="state state-renamed tooltipped tooltipped-e" aria-label="You have signed your entry, meaning you cannot add to today's writing.">Entry is signed</span>
                    @endif
                </p>
                <div id="{{$entry->id}}" class="entry_menu menu one-half column">
                    <p>
                        <span>
                        @if ($entry->entry_status == "open")
                        <a class="btn btn-primary tooltipped tooltipped-s sign-entry-btn" role="button" aria-label="Signing your entry will prevent you from writing anymore, and generate your stats." data-entry-id="{{$entry->id}}">Sign</a>
                        <a class="btn" href="/journal" role="button">Write</a>
                        @else
                        <a class="btn" href="/journal/entries/{{$entry->id}}" role="button">Read</a>
                        @endif
                        </span>
                        <span><a class="btn" href="/journal/entries/{{$entry->id}}/stats" role="button">Stats</a></span>
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
                maxDate: start_date,
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
                nextSelector: "#nextSelector-a-next",
                onMaxDomainReached: function(hit) {
                    if (hit) {
                        $("#nextSelector-a-next").addClass('disabled');
                    } else {
                        $("#nextSelector-a-next").removeClass('disabled');
                    }
                },
            });
        </script>
    </div>
</div>
@endsection
