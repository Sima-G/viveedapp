jQuery(document).ready(function () {

    ingredientlistLoader();
    ingredientList();

    jQuery.ajax({
        url: "/backend/modules/catering/ingredients/group_list",
        type: "GET",
        success: function (data) {
            $('#ingredient_groups').append(data);
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Συγγνώμη, δεν βρέθηκαν ομάδες!'},
                '.chosen-select-width': {width: "100%"}
            };
            for (var selector in config) {
                $('#ingredient_groups').chosen(config[selector]);
            }

        }
    });



    $("#ingredient_list").on('click', '.ingredient_edit', function (event) {
        event.preventDefault();
        cleanFields();
        var id = $(this).attr('id');

        var ingredient_title = $(this).closest('tr').children('td.ingredient_title').html();
        var ingredient_description = $(this).closest('tr').children('td.ingredient_description').html();
        ingredient_description = ingredient_description.trim();
        var ingredient_selection = $(this).closest('tr').children('td.ingredient_selection').html();
        ingredient_selection = ingredient_selection.trim();

        var ingredient_status_txt = $(this).closest("tr").find(".ingredient_status_txt").text();
        ingredient_status_txt = ingredient_status_txt.trim();
        var ingredient_state_txt = $(this).closest("tr").find(".ingredient_state_txt").text();
        ingredient_state_txt = ingredient_state_txt.trim();


        $('#ingredient_action_id').val(id);
        $('#ingredient_title').val(ingredient_title);
        $('#ingredient_description').val(ingredient_description);

        var group_data = 'group_' + id;
        $('.' + group_data).each(function () {
            var group_id = $(this).attr('id');
            var group_title = $(this).text();
            group_title = group_title.trim();
            $('#ingredient_groups option[value="' + group_id + '"]').remove();
            $('#ingredient_groups').append('<option value="' + group_id + '" selected="selected">' + group_title + '</option>');
            $("#ingredient_groups").trigger("chosen:updated");
        });

        $("#ingredient_selection option").filter(function() {
            return this.text == ingredient_selection;
        }).prop('selected', true);

        $("#ingredient_status option").filter(function() {
            return this.text == ingredient_status_txt;
        }).prop('selected', true);

        $("#ingredient_state option").filter(function() {
            return this.text == ingredient_state_txt;
        }).prop('selected', true);


        var send_btn_alt_txt = $('#send_btn_txt_alt').val();
        $('#send_btn').html(send_btn_alt_txt);


        if ($('#send_btn').length == 0) {
            var send_btn_txt_alt = $('#send_btn_txt_alt').val();
            $('#ingredient_actions').append('<button type=\"submit\" id=\"send_btn\" class=\"btn btn-sm btn-primary send-btn\"><i class=\"fa fa-arrow-right\"></i>  ' + send_btn_txt_alt + '</button>');
        }

        if ($('#undo_btn').length == 0) {
            var alt_button_alt_txt = $('#alt_btn_txt_alt').val();
            $('#ingredient_actions').append('<button type=\"submit\" id=\"undo_btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }

    });


    $("#ingredient_list").on('click', '.ingredient_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');

        swal({
                title: "Είσαστε σίγουρος;",
                text: "Το συστατικό θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/modules/catering/ingredients/delete',
                    type: "post",
                    data: {
                        'ingredient_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        ingredientlistLoader();
                        swal("Ενημέρωση", "Το συστατικό διεγράφη!", "success");
                        ingredientList();
                    }
                });
            });
    });


    $("#ingredient_actions").on('click', '#undo_btn', function (event) {
        event.preventDefault();
        cleanFields();
    });



    $('#form_ingredients').validate({
        ignore: [],
        errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
        errorElement: 'div',
        errorPlacement: function(error, e) {
            e.parents('.form-ingredient > div').append(error);
        },
        highlight: function(e) {
            $(e).closest('.form-ingredient').removeClass('has-success has-error').addClass('has-error');
            $(e).closest('.help-block').remove();
        },
        success: function(e) {
            // You can use the following if you would like to highlight with green color the input after successful validation!
            e.closest('.form-ingredient').removeClass('has-success has-error'); // e.closest('.form-ingredient').removeClass('has-success has-error').addClass('has-success');
            e.closest('.help-block').remove();
        },
        rules: {
            ingredient_title: {
                required: true
            },
        },
        messages: {
            ingredient_title: 'Εισαγετε τίτλο συστατικού'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/ingredients/store',
                type: "post",
                data: {
                    'ingredient_title': $('input[name=ingredient_title]').val(),
                    'ingredient_description': $('input[name=ingredient_description]').val(),
                    'ingredient_selection': $('#ingredient_selection').val(),
                    'ingredient_groups': $('#ingredient_groups').val(),
                    'ingredient_status': $("[name = 'ingredient_status']").val(),
                    'ingredient_state': $('#ingredient_state').val(),
                    'ingredient_action_id': $('input[name=ingredient_action_id]').val(),
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
                    }).appendTo($(".ingredients_content").css("position", "relative"));
                },

                success: function getcontent(data) {
                    ingredientlistLoader();
                    ingredientList();
                    swal("Ενημέρωση", "Το συστατικό αποθηκεύτηκε!", "success");
                    $('#content_loader').remove();
                    cleanFields();
                }

            });
        }
    });

    $('#form_ingredients').on('input change', '.ingredient-control', function() {
        if ($('#undo_btn').length == 0) {
            var alt_button_alt_txt = $('#alt_btn_txt_alt').val();
            $('#ingredient_actions').append('<button type=\"submit\" id=\"undo_btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }
    });

    function cleanFields() {
        $('#ingredient_action_id').val("");
        $('#ingredient_title').val("");
        $('#ingredient_description').val("");
        $('#ingredient_selection').val(0);
        $("#ingredient_groups").val('').trigger("chosen:updated");
        $('#ingredient_status').val(1);
        $('#ingredient_state').val(1);
        var send_btn_txt = $('#send-btn-txt').val();
        $('#send_btn').html(send_btn_txt);
        $('#undo_btn').remove();
    }

    function ingredientList() {
        jQuery.ajax({
            url: "/backend/modules/catering/ingredients/ingredient_list",
            type: "GET",
            success: function (data) {
                $('#ingredient_list').html(data);
            }
        });
    }

    function ingredientlistLoader() {
        $('#ingredient_list_loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');
    }

});
