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
                url: "/journal/entries/"+entry_id,
                data: {
                    entry_body: entry_body,
                    word_count: c
                },
                beforeSend: function() {
                    $save_block.html('Saving...');
                },
                statusCode: {
                    503: function() {
                        $save_block.html('<span class="down">Journal is down. If this message doesn\'t go away, be sure to backup your entry.</span>');
                    }
                },
                success: function() {
                    $save_block.html('<span>Saved.</span>');
                }
            });
        }, 1000 );
    });

});
