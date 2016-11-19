jQuery(document).ready(function () {

    $('#timeline').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');

    var startSdt = $('#startDt').html().split('/');
    var endSdt = $('#endDt').html().split('/');
    var startDt = startSdt[2] + '-' + startSdt[1] + '-' + startSdt[0];
    var endDt = endSdt[2] + '-' + endSdt[1] + '-' + endSdt[0];

    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var now = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
    var curDate = (day<10 ? '0' : '') + day + '/' + (month<10 ? '0' : '') + month + '/' + d.getFullYear();

    if( (new Date(now).getTime() < new Date(startDt).getTime()))
    {
        var timeline_date = startDt;
        var timeline_sdate = $('#startDt').html();
        $("button[id='now_date_btn']").attr("disabled", "disabled");
    } else if ( (new Date(now).getTime() > new Date(endDt).getTime())){
        var timeline_date = endDt;
        var timeline_sdate = $('#endDt').html();
        $("button[id='now_date_btn']").attr("disabled", "disabled");
    } else {
        var timeline_date = now;
        var timeline_sdate = curDate;
    }

    $('#currentDt').html(timeline_sdate);
    $('#currentSdt').val(timeline_date);

    $.ajax({
        url: '/frontend/conference/timeline/' + timeline_date,
        type: 'GET',

        success: function (data) {
            $('#timeline').html(data);
            var timeline_date_title = timeline_date.split('-');
            var timeline_date_show_title = timeline_date_title[2] + '/' + timeline_date_title[1] + '/' + timeline_date_title[0].slice(-2);

            $('#timeline_date').text(timeline_date_show_title);
        }

    });

    $('.date_change_btn').click(function () {

        $('#timeline').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');


        var action = $(this).attr('value');
        curSdate = new Date($('#currentSdt').val());
        // curSdate = Date.parse($('#currentSdt').val());

        alert(action);

        switch (action) {
            case '-1':
                curSdate.setDate(curSdate.getDate() - 1);
                break;
            case '1':
                curSdate.setDate(curSdate.getDate() + 1);
                break;
            case '0':
                curSdate = new Date();
        }

        alert(curSdate);


        if( (new Date(curSdate).getTime() >= new Date(endDt).getTime()))
        {
            $("button[id='next_date_btn']").attr("disabled", "disabled");
        } else {
            $("button[id='next_date_btn']").removeAttr("disabled")
        }

        if( (new Date(curSdate).getTime() <= new Date(startDt).getTime()))
        {
            $("button[id='previous_date_btn']").attr("disabled", "disabled");
        } else {
            $("button[id='previous_date_btn']").removeAttr("disabled")
        }

        var dd = curSdate.getDate();
        var mm = curSdate.getMonth() + 1;
        var y = curSdate.getFullYear();

        // var someFormattedDate = dd + '/'+ mm + '/'+ y;

        $('#currentDt').html(dd + '/'+ mm + '/'+ y);
        $('#currentSdt').val(y + '-' + mm + '-' + dd);

        // alert(curSdate);



        $.ajax({
            url: '/frontend/conference/timeline/' + y + '-' + mm + '-' + dd,
            type: 'GET',
            success: function (data) {
                $('#timeline').html(data);
                var timeline_date_title = timeline_date.split('-');
                var timeline_date_show_title = timeline_date_title[2] + '/' + timeline_date_title[1] + '/' + timeline_date_title[0].slice(-2);

                $('#timeline_date').text(timeline_date_show_title);
            }

        });
    });

});
