jQuery(document).ready(function () {
    $('#session').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
        $.ajax({
            url: '/frontend/conference/sessions/',
            type: 'GET',
            success: function (data) {
                $('#session').html(data);
            }

        });
});
