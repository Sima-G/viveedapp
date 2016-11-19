jQuery(document).ready(function () {

    CKEDITOR.replace('speaker_description', {
        customConfig: "../../pages/speakers/ckeditor-config.js"
    });

    $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');
    jQuery.ajax({
        url: "/backend/schedule/speakers/speaker_list",
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

        if ($('#send-btn').length == 0) {
            var send_btn_txt_alt = $('#send-btn-txt-alt').val();
            $('#speaker_actions').append('<button type=\"submit\" id=\"send-btn\" class=\"btn btn-sm btn-primary send-btn\"><i class=\"fa fa-arrow-right\"></i>  ' + send_btn_txt_alt + '</button>');
        }

        if ($('#undo-btn').length == 0) {
            var alt_button_alt_txt = $('#alt-btn-txt-alt').val();
            $('#speaker_actions').append('<button type=\"submit\" id=\"undo-btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }

    });


    $("#speaker-list").on('click', '.speaker_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');
        swal({
                title: "Είσαστε σίγουρος;",
                text: "Ο ομιλιτής θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/schedule/speakers/delete',
                    type: "post",
                    data: {
                        'speaker_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        swal("Ενημέρωση", "Ο ομιλιτής διεγράφη!", "success");
                        jQuery.ajax({
                            url: "/backend/schedule/speakers/speaker_list",
                            type: "get",
                            success: function (data) {
                                $('#speaker-list').html(data);
                            }
                        });
                    }
                });
            });
    });


    $("#speaker_actions").on('click', '#undo-btn', function (event) {
        event.preventDefault();
        cleanFields();
    });

    $('#form_speakers').validate({

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
            speaker_firstname: {
                required: true
            },
            speaker_lastname: {
                required: true
            },
            speaker_email: {
                email: true
            },
            speaker_description: {
                required: function()
                {
                    CKEDITOR.instances.speaker_description.updateElement();
                }
            }
        },
        messages: {
            speaker_firstname: 'Εισάγετε το επώνυμο του ομιλητή',
            speaker_lastname: 'Εισάγετε το όνομα του ομιλητή',
            speaker_email: 'Εισάγετε ένα έγκυρο email ή αφήστε το κενό',
            speaker_description: 'Εισάγετε μια περιγραφή'
        },

        submitHandler: function(form) {
            //$('.send-btn').click(function () {
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

                beforeSend: function () {
                    $("<div id='content_loader' style='text-align: center'><i style='position: relative; top: calc(50% - 10px)' class='fa fa-asterisk fa-4x fa-spin'></i></div>").css({
                        position: "absolute",
                        width: "100%",
                        height: "100%",
                        top: 0,
                        left: 0,
                        opacity: 0.7,
                        background: "#ccc"
                    }).appendTo($(".speakers_content").css("position", "relative"));
                },

                success: function getcontent(data) {
                    if ($('#widget_' + data).length >> 0) {
                        $('#widget_' + data).remove();
                    }
                    $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                    jQuery.ajax({
                        url: "/backend/schedule/speakers/speaker_list",
                        type: "get",
                        success: function (data) {
                            swal("Ενημέρωση", "Ο ομιλιτής αποθηκεύτηκε!", "success");
                            $('#speaker-list').html(data);
                            $('#content_loader').remove();
                            cleanFields();
                        }
                    });
                }

            });
        }
    });

    function cleanFields() {
        $('#speaker_action_id').val("");
        $('#speaker_firstname').val("");
        $('#speaker_lastname').val("");
        CKEDITOR.instances.speaker_description.setData("");
        $('#speaker_email').val("");
        var send_btn_txt = $('#send-btn-txt').val();
        $('#send-btn').html(send_btn_txt);
        $('#undo-btn').remove();
    }

});
