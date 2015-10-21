@extends('journal.master')
@section('content')
<script>
$(document).ready(function() {
    $('textarea.pad').elastic();

    function moveCaretToEnd(el) {
        if (typeof el.selectionStart == "number") {
            el.selectionStart = el.selectionEnd = el.value.length;
        } else if (typeof el.createTextRange != "undefined") {
            el.focus();
            var range = el.createTextRange();
            range.collapse(false);
            range.select();
        }
    }

    var textarea = document.getElementById("pad");
    textarea.onfocus = function() {
        moveCaretToEnd(textarea);
        // Work around Chrome's little problem
        window.setTimeout(function() {
            moveCaretToEnd(textarea);
        }, 1);
    };

    function wordCount( val ){
        return {
            charactersNoSpaces : val.replace(/\s+/g, '').length,
            characters         : val.length,
            words              : val.match(/\S+/g).length,
            lines              : val.split(/\r*\n/).length
        }
    }

    var $words = $('span.words');
    var $words_init_span = $('span.init_words');

    $('textarea#pad').on('input', function(){
        var c = wordCount( this.value );
        $words.html(c.words);
        $words_init_span.html(c.words);
    });

    // WORKS SOMETIMES, BUT WILL SOMETIMES CAUSE TROUBLE. BUG?

    // var open_words = wordCount( $('textarea#pad').val() );
    // $words.html(open_words.words);
    // $words_init_span.html(open_words.words);

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
        };
    })();

    $('textarea#pad').keyup(function() {

        $("html, body").animate({ scrollTop: $(document).height() }, 100);
        delay(function(){
            var entry_body = $('textarea#pad').val();
            var $save_block = $('span.save');
            var c = $("span.words").html();
            $.ajax({
                method: "POST",
                url: "/journal/entries/{{$todays_entry->id}}",
                data: {
                    entry_body: entry_body,
                    word_count: c
                },
                beforeSend: function() {
                    $save_block.html('Saving...');
                },
                statusCode: {
                    503: function() {
                        $save_block.html('<span class="down">Journal is down, but keep typing. If this message doesn\'t go away, be sure to backup your entry.</span>');
                    }
                },
                success: function() {
                    $save_block.html('<span class="up">Saved.</span>');
                }
            });
        }, 1000 );
    });

});
</script>
@if ($msg)
<div class="flash">
    {{$msg}}
</div>
@endif
<div class="columns intro">
    <div class="single-column column">
        <h2>It's {{$date}}, and
            @if(!$todays_entry)
            you do not have an entry for today.
            @else
            you've written <span class="init_words">no</span> words for today.
            @endif
        </h2>
        @if ($todays_entry->is_signed == 0)
        <h2>You've got <span class="timeago" title="{{$midnight}}"></span> until writing closes for today.</h2>
        @else
        <h2>You have signed today's entry, and writing is closed.</h2>
        @endif
    </div>
</div>
<div class="columns pad">
    <div class="single-column column">
        @if ($todays_entry->is_signed == 0)
        <textarea id="pad" name="entry_body" class="pad input-block" cols="90" autofocus placeholder="Begin your journal for today...">@if($todays_entry){{$todays_entry->entry_body}}@endif</textarea>
        @else
        <p class="pad">
            {{$todays_entry->entry_body}}
        </p>
        @endif
    </div>
</div>
<div class="columns info">
    <div class="single-column column entry_info">
        <p class="stats">
            <span class="info_block">
                @if ($todays_entry->is_signed == 1)
                <span class="words">{{$todays_entry->word_count}}</span>
                @else
                <span class="words">0</span>
                @endif
                <span class="slash">/</span>
                <span class="tooltipped tooltipped-n" aria-label="Your recommended word count goal.">500</span> words</span>
                <span class="info_block">
                    <span class="save"></span>
                </span>
            </span>
        </p>
    </div>
</div>
@endsection
