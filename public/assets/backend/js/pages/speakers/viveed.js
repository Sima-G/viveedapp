jQuery(document).ready(function () {

    CKEDITOR.replace('speaker_description', {
        customConfig: "../../pages/speakers/ckeditor-config.js"
    });

    $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/></div>');
    jQuery.ajax({
        url: "/backend/schedule/speakers/show",
        type: "GET",
        success: function (data) {
            $('#speaker-list').html(data);
        }
    });

    $("#speaker-list").on('click', '.speaker_edit', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');

        $('#speaker_action_id').val(id);
        $('#speaker_firstname').val($('#firstname_' + id).html());
        $('#speaker_lastname').val($('#lastname_' + id).html());
        CKEDITOR.instances.speaker_description.setData($('#description_' + id).html());
        $('#speaker_email').val($('#email_' + id).html());
        var send_btn_alt_txt = $('#send-btn-txt-alt').val();
        $('#send-btn').html(send_btn_alt_txt);
        if ($('#undo-btn').length == 0) {
            var alt_button_alt_txt = $('#alt-btn-txt-alt').val();
            $('#speaker_actions').append('<button type=\"submit\" id=\"undo-btn\" class=\"btn btn-sm btn-success send-btn\">' + alt_button_alt_txt + '</button>');
        }

    });


    $("#speaker-list").on('click', '.speaker_delete', function (event) {
        event.preventDefault();
        $.ajax({
            url: '/backend/schedule/speakers/delete',
            type: "post",
            data: {
                'speaker_action_id': $(this).attr('id'),
                '_token': $('input[name=_token]').val()
            },
            success: function getcontent(data) {
                $('#widget_' + data).remove();
                $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
            }
        });
    });


    $("#speaker_actions").on('click', '#undo-btn', function (event) {
        event.preventDefault();
        $('#speaker_action_id').val("");
        $('#speaker_firstname').val("");
        $('#speaker_lastname').val("");
        CKEDITOR.instances.speaker_description.setData("");
        $('#speaker_email').val("");
        var send_btn_txt = $('#send-btn-txt').val();
        $('#send-btn').html(send_btn_txt);
        $('#undo-btn').remove();

    });

    $('.send-btn').click(function () {
        $.ajax({
            url: '/backend/schedule/speakers/store',
            type: "post",
            data: {
                'speaker_firstname': $('input[name=speaker_firstname]').val(),
                'speaker_lastname': $('input[name=speaker_lastname]').val(),
                'speaker_email': $('input[name=speaker_email]').val(),
                'speaker_description': CKEDITOR.instances.speaker_description.getData(),
                'speaker_action_id': $('input[name=speaker_action_id]').val(),
                '_token': $('input[name=_token]').val()
            },

            success: function getcontent(data) {
                if ($('#widget_' + data).length >> 0) {
                    $('#widget_' + data).remove();
                }
                $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                jQuery.ajax({
                    url: "/backend/schedule/speakers/data",
                    type: "post",
                    widget_id: data,
                    data: {
                        'speaker_action_id': data,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function (data) {
                        $('#speaker-list').append(data);
                    }
                });
            }

        });
    });

});
