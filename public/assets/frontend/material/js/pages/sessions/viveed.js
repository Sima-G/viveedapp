jQuery(document).ready(function () {
    $('#session_list').html('<div class="mdl-grid"><div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div></div>');
        $.ajax({
            url: '/frontend/sessions/',
            type: 'GET',
            success: function (data) {
                $('#session_list').html(data);
            }

        });
});
