$(document).ready(function(){
    var linkClickCount = 0;
    var linkTimeoutId  = null;

    $('ul.navbar-nav').on('click', 'a', function(event) {
        var $link = $(event.target);
        event.preventDefault();
        event.stopPropagation();

        console.log('Click event');

        linkClickCount++;

        if (linkTimeoutId !== null) {
            return;
        }

        linkTimeoutId = setTimeout(function() {
            if (linkClickCount >= 1 && linkClickCount < 3) {
                window.location.href = $(this).attr('href');
            } else if (linkClickCount == 3 && $link.attr('id') == 'music-link') {
                var $input = $('<input>').attr('name', '_token').attr('value', M.TOKEN);
                $('<form>').attr('method', 'POST').attr('action', M.EASTEREGG_URL).append($input).appendTo('body').submit();
            } else if (linkClickCount == 4 && $link.attr('id') == 'music-link') {
                var $input = $('<input>').attr('name', '_token').attr('value', M.TOKEN);
                $('<form>').attr('method', 'POST').attr('action', M.EASTEREGG2_URL).append($input).appendTo('body').submit();
            } else {
                $.ajax({
                    url: M.RANDOM_QUOTE_URL,
                    cache: false,
                    dataType: 'json'
                }).done(function(data) {
                    if (data.text) {
                        alert(data.text + ' - ' + data.author);
                    }
                });
            }
            linkTimeoutId  = null;
            linkClickCount = 0;
        }.bind(this), 500);
    });
});