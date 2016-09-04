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
            $('#session_actions').append('<button type=\"submit\" id=\"undo-btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i> ' + alt_button_alt_txt + '</button>');
        }
    });

    $(document).on("click", '.session_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');

        swal({
                title: "Είσαστε σίγουρος;",
                text: "Η ομιλία θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/schedule/sessions/delete',
                    type: "post",
                    data: {
                        // 'session_action_id': $(this).attr('id'),
                        'session_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        // swal("Ενημέρωση", "Η ομιλία διεγράφη!", "success");
                        /*alert(del_msg_txt);*/

                        $('#session_title').val("");
                        $('#session_starts').val("");
                        $('#session_ends').val("");
                        $('#session_date').val("");
                        $("#session_speakers").val('').trigger("chosen:updated");
                        CKEDITOR.instances.session_description.setData("");

                        $('#session_' + data).remove();
                        swal("Ενημέρωση", "Η ομιλία διεγράφη!", "success");
                    }
                });
            });


    });

    $("#session_actions").on('click', '#undo-btn', function (event) {
        event.preventDefault();
        $('#session_title').val("");
        $('#session_starts').val("");
        $('#session_ends').val("");
        $('#session_date').val("");
        // $("#session_speakers").val("");
        // $('#session_speakers').select2('data', null);
        // $('#session_speakers').select2("val", "");
        // $("#session_speakers").trigger("liszt:updated");
        $("#session_speakers").val('').trigger("chosen:updated");
        CKEDITOR.instances.session_description.setData("");
        $('#send-btn').html(send_btn_txt);
        $('#undo-btn').remove();
    });


    $('#btn1').click(function () {
        $('#field2').val($('#field1').val());
    });


    //-------------- Send Form------------------------------------------------------------------------------------------
    $('#form_sessions').validate({

        ignore: [],
        errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
        errorElement: 'div',
        errorPlacement: function(error, e) {
            e.parents('.form-group > div').append(error);
        },
        highlight: function(e) {
            $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
            $(e).closest('.help-block').remove();
        },
        success: function(e) {
            // You can use the following if you would like to highlight with green color the input after successful validation!
            e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
            e.closest('.help-block').remove();
        },
        rules: {
            session_title: {
                required: true
            },
            session_speakers: {
                required: true
            },
            session_description: {
                required: function()
                {
                    CKEDITOR.instances.session_description.updateElement();
                }
            }
        },
        messages: {
            session_title: 'Πρέπει να εισάγετε ένα τίτλο',
            session_starts: 'Εισάγετε την ώρα έναρξης της ομιλίας',
            session_ends: 'Εισάγετε την ώρα λήξης της ομιλίας',
            session_date: 'Εισάγετε την ημερομηνία διεξαγωγής της ομιλίας',
            session_speakers: 'Εισάγετε τους ομιλητές της ομιλίας',
            session_description: 'Εισάγετε την περιγραφή της ομιλίας'
        },

    submitHandler: function(form) {
        //$('.send-btn').click(function () {


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
                // $("#session_speakers").val("");
                // $('#session_speakers').select2("val", "");
                $("#session_speakers").val('').trigger("chosen:updated");
                CKEDITOR.instances.session_description.setData("");
                alert(session_title);
                alert("Get Content");

                if (!$('input[name=session_action_id]').val()) {
                    alert("There is no session_action_id!!!");
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
                    alert("There is an id for a session to edit!!!");
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

        }

    });
    //------------------------------------------------------------------------------------------------------------------




});
