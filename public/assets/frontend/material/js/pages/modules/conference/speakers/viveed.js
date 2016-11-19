jQuery(document).ready(function () {

    $('#speaker_list').html('<div class="mdl-grid"><div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div></div>');

    $.ajax({
        url: '/frontend/json/speakers_full',
        type: 'GET',
        datatype: 'json',

        success: function (data) {
            data = $.parseJSON(data);
            var html_str = '';
            for (var i=0; i<data.length; i++){
                html_str += '<div class="demo-separator mdl-cell--1-col"></div><div class="mdl-card__actions mdl-card--border"><span><h4>' + data[i].full_name + ' | ' + data[i].email + '</h4></span></div><div class=""><span>' + data[i].text + '</span></div>';
            }
            $('#speaker_list').html(html_str);
        }

    });

});
