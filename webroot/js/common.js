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
    
// Ajax comments
    $('a.add-comment').click(function (e) {
        e.preventDefault();
        $(this).parents('div.comment').find('div.add-comment-form').show();
    });
    
    $('form.ajax-comment-form').submit(function (e) {
       e.preventDefault();
       var form = $(this);
       $.ajax($(form).attr('action') + '.json', {
           data: $(form).serialize(),
           method: 'post',
           success: function (data, status) {
               $(form).hide();
               $(form).find('input').val(null);
               var comment = "<div class='comment'><p>" + data.comment.comment + "</p></div>";
               $(form).parents('div.comment').before(comment);
           }
       });
    });

});
