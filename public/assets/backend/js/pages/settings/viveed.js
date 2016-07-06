jQuery(document).ready(function () {

    CKEDITOR.replace('schedule_description', {
        customConfig: "../../pages/settings/ckeditor-config.js"
    });

    $('.content_not_for_init').hide();


    $('#form_settings').validate({

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
            schedule_title: {
                required: true
            },
            schedule_date_starts: {
                required: true
            },
            schedule_date_ends: {
                required: true
            },
            schedule_description: {
                required: function()
                {
                    CKEDITOR.instances.schedule_description.updateElement();
                }
            }
        },
        messages: {
            schedule_title: 'Παρακαλώ επιλέξτε έναν τίτλο',
            schedule_date_starts: 'Επιλέξτε μια ημερομηνία έναρξης',
            schedule_date_ends: 'Επιλέξτε μια ημερομηνία λήξης',
            schedule_description: 'Θα πρέπει να εισάγετε μια περιγραφή'
        },

    submitHandler: function(form) {
        //$('.send-btn').click(function () {

        $.ajax({
            url: '/backend/schedule/settings/store',
            type: "post",
            data: {
                'schedule_title': $('input[name=schedule_title]').val(),
                'schedule_date_starts': $('input[name=schedule_date_starts]').val(),
                'schedule_date_ends': $('input[name=schedule_date_ends]').val(),
                'schedule_init_status': $('input[name=schedule_init_status]').val(),
                'schedule_description': CKEDITOR.instances.schedule_description.getData(),
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
                }).appendTo($(".settings_content").css("position", "relative"));
            },
            success: function getcontent(session_title) {

                jQuery.ajax({
                    url: "/backend/schedule/settings/data",
                    data: {'_token': $('input[name=_token]').val()},
                    dataType: 'JSON',
                    type: "POST",
                    success: function (data) {
                        var start_dateAr = data.start_date.split('-');
                        var end_dateAr = data.end_date.split('-');
                        var start_date = start_dateAr[2] + '/' + start_dateAr[1] + '/' + start_dateAr[0];
                        var end_date = end_dateAr[2] + '/' + end_dateAr[1] + '/' + end_dateAr[0];
                        var date = '<p class="lead">' + start_date + ' - ' + end_date + '</p>';
                        $('#title').html(data.title);
                        $("#date").html(data.start_date + "-" + data.end_date);
                        $('#description').html(date + data.description);
                        $('#schedule_init_status').val(data.init);
                        $('.notice_init').remove();
                        $('.content_not_for_init').show();
                        //$('.notice_init_tooltip').removeAttribute('data-toggle', 'dada-original-title');
                        $('.sidebar_nav_no_preview').replaceWith('<a href="" target="_blank" class="sidebar-nav-menu"><i class="gi gi-eye_open sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">' + $("#preview_nav_span").attr("title") + '</span></a>');
                        //$('.notice_init_tooltip').data('original-title', $('#settings_nav_span').attr('title'))
                        $('.notice_init_tooltip').tooltip('hide').attr('data-original-title', $('#settings_nav_span').attr('title')).tooltip('fixTitle').tooltip('show');
                        $('#content_loader').remove();

                    }
                });
            }
        });


    }

    });


});