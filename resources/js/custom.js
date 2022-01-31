$(document).ready(function() {
    var linkClickCount     = 0;
    var trueLinkTimeoutId  = null;
    var linkTimeoutId      = null;

    var alertRandomQuote = function() {
        $.ajax({
            url:      M.RANDOM_QUOTE_URL,
            dataType: 'json',
            cache:    false
        }).done(function(data) {
            if (data.text) {
                alert(data.text + ' - ' + data.author);
            }
        });
    };

    var getForm = function(url) {
        return $('<form>')
            .attr('method', 'POST')
            .attr('action', url)
            .append($('<input>')
                .attr('name', '_token')
                .attr('value', M.TOKEN))
            .appendTo('body')
        ;
    };

    $('ul.navbar-nav').on('click', 'a', function(event) {
        var $link = $(event.target);
        event.preventDefault();
        event.stopPropagation();

        linkClickCount++;

        if (linkTimeoutId !== null || trueLinkTimeoutId !== null) {
            return;
        }

        trueLinkTimeoutId = setTimeout(function() {
            if (linkClickCount >= 1 && linkClickCount < 3) {
                window.location.href = $(this).attr('href');
            }

            trueLinkTimeoutId = null;
        }.bind(this), 300);

        linkTimeoutId = setTimeout(function() {
            if (linkClickCount == 3 && $link.attr('id') == 'music-link') {
                getForm(M.EASTEREGG_URL).submit();
            } else if (linkClickCount == 4 && $link.attr('id') == 'music-link') {
                getForm(M.EASTEREGG2_URL).submit();
            } else {
                alertRandomQuote();
            }

            linkTimeoutId  = null;
            linkClickCount = 0;
        }.bind(this), 500);
    });
});