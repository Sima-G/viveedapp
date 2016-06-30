jQuery(document).ready(function () {

    CKEDITOR.replace('schedule_description', {
        customConfig: "../../pages/settings/ckeditor-config.js"
    });

    $('.send-btn').click(function () {
        $.ajax({
            url: '/backend/schedule/settings/store',
            type: "post",
            data: {
                'schedule_title': $('input[name=schedule_title]').val(),
                'schedule_date_starts': $('input[name=schedule_date_starts]').val(),
                'schedule_date_ends': $('input[name=schedule_date_ends]').val(),
                'schedule_description': CKEDITOR.instances.schedule_description.getData(),
                '_token': $('input[name=_token]').val()
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
                    }
                });
            }
        });
    });

});