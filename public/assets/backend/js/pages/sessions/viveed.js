jQuery(document).ready(function () {

    var send_btn_txt = $('#send-btn-txt').val();
    var send_btn_alt_txt = $('#send-btn-txt-alt').val();
    var alt_button_alt_txt = $('#alt-btn-txt-alt').val();
    var del_msg_txt = $('#del-msg-txt').val();

    CKEDITOR.replace('session_description', {
        customConfig: "../../pages/sessions/ckeditor-config.js"
    });

    $('#sessions').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
    jQuery.ajax({
        url: "/backend/schedule/sessions/show",
        type: "GET",
        success: function (data) {
            $('#sessions').html(data);
        }
    });

    jQuery.ajax({
        url: "/backend/schedule/sessions/speaker_list",
        type: "GET",
        success: function (data) {
            $('#session_speakers').append(data);
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "100%"}
            };
            for (var selector in config) {
                $('#session_speakers').chosen(config[selector]);
            }

        }
    });


    $(document).on("click", '.session_edit', function (event) {
        event.preventDefault();
        var id = event.target.id;
        $('#session_action_id').val(id);
        $('#session_title').val($('#title_' + id).html());
        $('#session_starts').val($('#start_time_' + id).html());
        $('#session_ends').val($('#end_time_' + id).html());
        $('#session_date').val($('#date_' + id).html());
        var speaker_data = 'speaker_' + id;
        $('.' + speaker_data).each(function () {
            var id = $(this).attr('id');
            var text = $(this).text();
            $('#session_speakers option[value="' + id + '"]').remove();
            $('#session_speakers').append('<option value="' + id + '" selected="selected">' + text + '</option>');
            $("#session_speakers").trigger("chosen:updated");
        });
        CKEDITOR.instances.session_description.setData($('#description_' + id).html());
        $('#send-btn').html(send_btn_alt_txt);
        if ($('#undo-btn').length == 0) {
            $('#session_actions').append('<button type=\"submit\" id=\"undo-btn\" class=\"btn btn-sm btn-success send-btn\">' + alt_button_alt_txt + '</button>');
        }
    });

    $(document).on("click", '.session_delete', function (event) {
        event.preventDefault();
        $.ajax({
            url: '/backend/schedule/sessions/delete',
            type: "post",
            data: {
                'session_action_id': $(this).attr('id'),
                '_token': $('input[name=_token]').val()
            },
            success: function getcontent(data) {
                alert(del_msg_txt);
                $('#session_' + data).remove();
            }
        });
    });

    $("#session_actions").on('click', '#undo-btn', function (event) {
        event.preventDefault();
        $('#session_title').val("");
        $('#session_starts').val("");
        $('#session_ends').val("");
        $('#session_date').val("");
        $("#session_speakers").val("");
        CKEDITOR.instances.session_description.setData("");
        $('#send-btn').html(send_btn_txt);
        $('#undo-btn').remove();
    });


    $('#btn1').click(function () {
        $('#field2').val($('#field1').val());
    });

    $('.send-btn').click(function () {
        $.ajax({
            url: '/backend/schedule/sessions/store',
            type: "post",
            data: {
                'session_title': $('input[name=session_title]').val(),
                'session_starts': $('input[name=session_starts]').val(),
                'session_ends': $('input[name=session_ends]').val(),
                'session_date': $('input[name=session_date]').val(),
                'session_speakers': $("#session_speakers").val(),
                'session_description': CKEDITOR.instances.session_description.getData(),
                'session_action_id': $('input[name=session_action_id]').val(),
                '_token': $('input[name=_token]').val()
            },


            success: function getcontent(session_title) {
                $('#session_title').val("");
                $('#session_starts').val("");
                $('#session_ends').val("");
                $('#session_date').val("");
                $("#session_speakers").val("");
                CKEDITOR.instances.session_description.setData("");
                alert(session_title);

                if (!$('input[name=session_action_id]').val()) {
                    $('#sessions').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                    jQuery.ajax({
                        url: "/backend/schedule/sessions/show",
                        type: "GET",
                        success: function (data) {
                            $('#sessions').html(data);
                        }
                    });
                } else {
                    alert(session_title);
                    jQuery.ajax({
                        url: "/backend/schedule/sessions/data",
                        data: {
                            session_id: session_title,
                            '_token': $('input[name=_token]').val()
                        },
                        type: "POST",
                        success: function (data) {
                            $('#session_' + $('input[name=session_action_id]').val()).html(data);
                            $('#session_action_id').val("");
                        }
                    });
                }
            }

        });
    });


});
