jQuery(document).ready(function () {

    grouplistLoader();
    groupList();

    jQuery.ajax({
        url: "/backend/modules/catering/groups/category_list",
        type: "GET",
        success: function (data) {
            $('#group_categories').append(data);
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Συγγνώμη, δεν βρέθηκαν κατηγορίες!'},
                '.chosen-select-width': {width: "100%"}
            };
            for (var selector in config) {
                $('#group_categories').chosen(config[selector]);
            }

        }
    });



    $("#group_list").on('click', '.group_edit', function (event) {
        event.preventDefault();
        cleanFields();
        var id = $(this).attr('id');

        var group_title = $(this).closest('tr').children('td.group_title').html();
        var group_description = $(this).closest('tr').children('td.group_description').html();
        group_description = group_description.trim();
        var group_selection = $(this).closest('tr').children('td.group_selection').html();
        group_selection = group_selection.trim();

        var group_status_txt = $(this).closest("tr").find(".group_status_txt").text();
        group_status_txt = group_status_txt.trim();
        var group_state_txt = $(this).closest("tr").find(".group_state_txt").text();
        group_state_txt = group_state_txt.trim();


        $('#group_action_id').val(id);
        $('#group_title').val(group_title);
        $('#group_description').val(group_description);

        var category_data = 'category_' + id;
        $('.' + category_data).each(function () {
            var category_id = $(this).attr('id');
            var category_title = $(this).text();
            category_title = category_title.trim();
            $('#group_categories option[value="' + category_id + '"]').remove();
            $('#group_categories').append('<option value="' + category_id + '" selected="selected">' + category_title + '</option>');
            $("#group_categories").trigger("chosen:updated");
        });

        $("#group_selection option").filter(function() {
            return this.text == group_selection;
        }).prop('selected', true);

        $("#group_status option").filter(function() {
            return this.text == group_status_txt;
        }).prop('selected', true);

        $("#group_state option").filter(function() {
            return this.text == group_state_txt;
        }).prop('selected', true);


        var send_btn_alt_txt = $('#send_btn_txt_alt').val();
        $('#send_btn').html(send_btn_alt_txt);


        if ($('#send_btn').length == 0) {
            var send_btn_txt_alt = $('#send_btn_txt_alt').val();
            $('#group_actions').append('<button type=\"submit\" id=\"send_btn\" class=\"btn btn-sm btn-primary send-btn\"><i class=\"fa fa-arrow-right\"></i>  ' + send_btn_txt_alt + '</button>');
        }

        if ($('#undo_btn').length == 0) {
            var alt_button_alt_txt = $('#alt_btn_txt_alt').val();
            $('#group_actions').append('<button type=\"submit\" id=\"undo_btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }

    });


    $("#group_list").on('click', '.group_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');

        swal({
                title: "Είσαστε σίγουρος;",
                text: "Η ομάδα συστατικών θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/modules/catering/groups/delete',
                    type: "post",
                    data: {
                        'group_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        grouplistLoader();
                        swal("Ενημέρωση", "Η ομάδα συστατικών διεγράφη!", "success");
                        groupList();
                    }
                });
            });
    });


    $("#group_actions").on('click', '#undo_btn', function (event) {
        event.preventDefault();
        cleanFields();
    });



    $('#form_groups').validate({
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
            group_title: {
                required: true
            },
        },
        messages: {
            group_title: 'Εισαγετε τίτλο ομάδας'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/groups/store',
                type: "post",
                data: {
                    'group_title': $('input[name=group_title]').val(),
                    'group_description': $('input[name=group_description]').val(),
                    'group_selection': $('#group_selection').val(),
                    'group_categories': $('#group_categories').val(),
                    'group_status': $("[name = 'group_status']").val(),
                    'group_state': $('#group_state').val(),
                    'group_action_id': $('input[name=group_action_id]').val(),
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
                    }).appendTo($(".groups_content").css("position", "relative"));
                },

                success: function getcontent(data) {
                    grouplistLoader();
                    groupList();
                    swal("Ενημέρωση", "Η ομάδα συστατικών αποθηκεύτηκε!", "success");
                    $('#content_loader').remove();
                    cleanFields();
                }

            });
        }
    });

    $('#form_groups').on('input change', '.group-control', function() {
        if ($('#undo_btn').length == 0) {
            var alt_button_alt_txt = $('#alt_btn_txt_alt').val();
            $('#group_actions').append('<button type=\"submit\" id=\"undo_btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }
    });

    function cleanFields() {
        $('#group_action_id').val("");
        $('#group_title').val("");
        $('#group_description').val("");
        $('#group_selection').val(0);
        $("#group_categories").val('').trigger("chosen:updated");
        $('#group_status').val(1);
        $('#group_state').val(1);
        var send_btn_txt = $('#send-btn-txt').val();
        $('#send_btn').html(send_btn_txt);
        $('#undo_btn').remove();
    }

    function groupList() {
        jQuery.ajax({
            url: "/backend/modules/catering/groups/group_list",
            type: "GET",
            success: function (data) {
                $('#group_list').html(data);
            }
        });
    }

    function grouplistLoader() {
        $('#group_list_loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');
    }

});
