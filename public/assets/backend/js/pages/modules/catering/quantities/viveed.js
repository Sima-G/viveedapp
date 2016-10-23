jQuery(document).ready(function () {

    quantitylistLoader();
    quantityList();

    jQuery.ajax({
        url: "/backend/modules/catering/quantities/category_list",
        type: "GET",
        success: function (data) {
            $('#quantity_categories').append(data);
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Συγγνώμη, δεν βρέθηκαν κατηγορίες!'},
                '.chosen-select-width': {width: "100%"}
            };
            for (var selector in config) {
                $('#quantity_categories').chosen(config[selector]);
            }

        }
    });



    $("#quantity_list").on('click', '.quantity_edit', function (event) {
        event.preventDefault();
        cleanFields();
        var id = $(this).attr('id');

        var quantity_title = $(this).closest('tr').children('td.quantity_title').html();
        var quantity_description = $(this).closest('tr').children('td.quantity_description').html();
        quantity_description = quantity_description.trim();
        var quantity_decimal = $(this).closest('tr').children('td.quantity_decimal').html();
        quantity_decimal = quantity_decimal.trim();

        var quantity_status_txt = $(this).closest("tr").find(".quantity_status_txt").text();
        quantity_status_txt = quantity_status_txt.trim();
        var quantity_state_txt = $(this).closest("tr").find(".quantity_state_txt").text();
        quantity_state_txt = quantity_state_txt.trim();


        $('#quantity_action_id').val(id);
        $('#quantity_title').val(quantity_title);
        $('#quantity_description').val(quantity_description);

        var category_data = 'category_' + id;
        $('.' + category_data).each(function () {
            var category_id = $(this).attr('id');
            var category_title = $(this).text();
            category_title = category_title.trim();
            $('#quantity_categories option[value="' + category_id + '"]').remove();
            $('#quantity_categories').append('<option value="' + category_id + '" selected="selected">' + category_title + '</option>');
            $("#quantity_categories").trigger("chosen:updated");
        });

        $("#quantity_decimal option").filter(function() {
            return this.text == quantity_decimal;
        }).prop('selected', true);

        $("#quantity_status option").filter(function() {
            return this.text == quantity_status_txt;
        }).prop('selected', true);

        $("#quantity_state option").filter(function() {
            return this.text == quantity_state_txt;
        }).prop('selected', true);


        var send_btn_alt_txt = $('#send_btn_txt_alt').val();
        $('#send_btn').html(send_btn_alt_txt);


        if ($('#send_btn').length == 0) {
            var send_btn_txt_alt = $('#send_btn_txt_alt').val();
            $('#quantity_actions').append('<button type=\"submit\" id=\"send_btn\" class=\"btn btn-sm btn-primary send-btn\"><i class=\"fa fa-arrow-right\"></i>  ' + send_btn_txt_alt + '</button>');
        }

        if ($('#undo_btn').length == 0) {
            var alt_button_alt_txt = $('#alt_btn_txt_alt').val();
            $('#quantity_actions').append('<button type=\"submit\" id=\"undo_btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }

    });


    $("#quantity_list").on('click', '.quantity_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');

        swal({
                title: "Είσαστε σίγουρος;",
                text: "Η μονάδα μέτρησης θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/modules/catering/quantities/delete',
                    type: "post",
                    data: {
                        'quantity_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        quantitylistLoader();
                        swal("Ενημέρωση", "Η μονάδα μέτρησης διεγράφη!", "success");
                        quantityList();
                    }
                });
            });
    });


    $("#quantity_actions").on('click', '#undo_btn', function (event) {
        event.preventDefault();
        cleanFields();
    });



    $('#form_quantities').validate({
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
            quantity_title: {
                required: true
            },
        },
        messages: {
            quantity_title: 'Εισαγετε μονάδα μέτρησης'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/quantities/store',
                type: "post",
                data: {
                    'quantity_title': $('input[name=quantity_title]').val(),
                    'quantity_description': $('input[name=quantity_description]').val(),
                    'quantity_decimal': $('#quantity_decimal').val(),
                    'quantity_categories': $('#quantity_categories').val(),
                    'quantity_status': $("[name = 'quantity_status']").val(),
                    'quantity_state': $('#quantity_state').val(),
                    'quantity_action_id': $('input[name=quantity_action_id]').val(),
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
                    }).appendTo($(".quantities_content").css("position", "relative"));
                },

                success: function getcontent(data) {
                    quantitylistLoader();
                    quantityList();
                    swal("Ενημέρωση", "Η μονάδα μέτρησης αποθηκεύτηκε!", "success");
                    $('#content_loader').remove();
                    cleanFields();
                }

            });
        }
    });

    $('#form_quantities').on('input change', '.quantity-control', function() {
        if ($('#undo_btn').length == 0) {
            var alt_button_alt_txt = $('#alt_btn_txt_alt').val();
            $('#quantity_actions').append('<button type=\"submit\" id=\"undo_btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }
    });

    function cleanFields() {
        $('#quantity_action_id').val("");
        $('#quantity_title').val("");
        $('#quantity_description').val("");
        $('#quantity_decimal').val(0);
        $("#quantity_categories").val('').trigger("chosen:updated");
        $('#quantity_status').val(1);
        $('#quantity_state').val(1);
        var send_btn_txt = $('#send-btn-txt').val();
        $('#send_btn').html(send_btn_txt);
        $('#undo_btn').remove();
    }

    function quantityList() {
        jQuery.ajax({
            url: "/backend/modules/catering/quantities/quantity_list",
            type: "GET",
            success: function (data) {
                $('#quantity_list').html(data);
            }
        });
    }

    function quantitylistLoader() {
        $('#quantity_list_loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');
    }

});
