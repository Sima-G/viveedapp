jQuery(document).ready(function () {

    $('#speaker_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');

    $.ajax({
        url: '/frontend/json/speakers_full',
        type: 'GET',
        datatype: 'json',

        success: function (data) {
            data = $.parseJSON(data);
            var html_str = '';
            for (var i=0; i<data.length; i++){

                html_str += '<div class="col-sm-6 col-lg-4">';
                html_str += '<div class="widget">';
                html_str += '<div class="widget-simple">';
                html_str += '<h4 class="widget-content text-left">';
                html_str += '<strong>'+data[i].full_name+'</strong>';
                html_str += '</h4>';
                html_str += '<div class="row">';
                html_str += '<div class="col-md-12">';
                html_str += '<span class="speaker_description">'+data[i].description+'</span>';
                html_str += '<h4 class="widget-content text-right">';
                html_str += '<span class="btn-group">';
                html_str += '<a href="mailto:'+data[i].email+'" class="btn btn-xs btn-default" data-toggle="tooltip">'+data[i].email+'</a>';
                html_str += '</span>';
                html_str += '</h4>';
                html_str += '</div>';
                html_str += '</div>';
                html_str += '</div>';
                html_str += '</div>';
                html_str += '</div>';

            }
            $('#speaker_list').html(html_str);
        }

    });

});
