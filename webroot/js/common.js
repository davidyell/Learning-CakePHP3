$(function() {

// Ajax globals
    $(document).ajaxStart(function() {
        $('#loading').show();
    });
    $(document).ajaxStop(function() {
        $('#loading').hide();
    });
    $(document).ajaxError(function() {
        $('#login').show();
    });

// Ajax voting
    $('.votes a').click(function(e) {
        e.preventDefault();

        $(this).addClass('voted');
        var linkElement = $(this);
        var url = '/' + $(this).data('controller') + '/vote/' + $(this).data('dir') + '/' + $(this).data('id') + '.json';

        $.get(url, function(data, status) {
            $(linkElement).siblings('span.votes').html(data.votes);
        }, 'json');
    });

// Dialogs
    $('.dialog span.glyphicon.glyphicon-remove').click(function() {
        $(this).parent().fadeOut();
    });

});
