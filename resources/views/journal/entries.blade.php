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
@foreach($entries as $entry)
<div class="columns entry_block" data-entry-id="{{$entry->id}}">
    <div class="one-half column">
        <p class="entry_date">
            {{$entry->entry_date_format}} <i class="fa fa-chevron-down menu_caret entry_menu_btn" data-entry-id="{{$entry->id}}"></i>
            @if ($entry->entry_status == "open")
            <span class="state state-open">Still time to write!</span>
            @endif
        </p>
        <div id="{{$entry->id}}" class="entry_menu menu one-third column">
            <p>
                <span><a href="/journal/entries/{{$entry->id}}">/ View</a></span>
            </p>
        </div>
        <p class="entry_details">{{$entry->word_count}} words &middot; Took {{$entry->time_taken}} to write.</p>
    </div>
</div>
@endforeach
@endsection
