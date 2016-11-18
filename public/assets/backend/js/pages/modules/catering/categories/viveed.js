jQuery(document).ready(function () {

    CKEDITOR.replace('category_description', {
        // customConfig: "../../pages/speakers/ckeditor-config.js"
        customConfig: "../../pages/modules/catering/categories/ckeditor-config.js"
    });

    categorylistLoader();
    // $('#category-list-loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');
    categoryStats();
    categoryList();



    $("#category-list").on('click', '.category_edit', function (event) {
        event.preventDefault();
        cleanFields();
        var id = $(this).attr('id');

        categoryparentField(id);

        var category_parent_txt = $(this).closest("tr").find(".category_parent_txt").text();
        category_parent_txt = category_parent_txt.trim();

        var category_status_txt = $(this).closest("tr").find(".category_status_txt").text();
        category_status_txt = category_status_txt.trim();
        var category_state_txt = $(this).closest("tr").find(".category_state_txt").text();
        category_state_txt = category_state_txt.trim();
        var category_title = $(this).closest('tr').children('td.category_title').html();

        // alert($(this).closest("tr").find("span[class='category_status_txt']").text());
        // console.log($(this).closest("tr").children('td.category_status').find("span[class='category_status_txt']").text());
        // console.log($(this).closest("tr").find("span[class='category_status_txt']").html());
        // console.log(category_status_txt);
        // alert($(this).closest("tr").find('span.category_status_txt'));
        // alert($(this).closest('tr').find('span.date_depart').text());
        $('#category_action_id').val(id);
        // $('#category_title').val($('#title_' + id).html()); Correct
        // $('#category_title').val($(this).find(".category_title").html()); Wrong
        $('#category_title').val(category_title);

        CKEDITOR.instances.category_description.setData($('#description_' + id).html());

        $("#category_parent option").filter(function() {
            return this.text == category_parent_txt;
        }).prop('selected', true);

        // var category_status_txt = 'μη διαθέσιμη';
        $("#category_status option").filter(function() {
            return this.text == category_status_txt;
        }).prop('selected', true);

        // var category_state_txt = 'ενεργή';
        // alert(category_state_txt);
        $("#category_state option").filter(function() {
            return this.text == category_state_txt;
        }).prop('selected', true);


        var send_btn_alt_txt = $('#send-btn-txt-alt').val();
        $('#send-btn').html(send_btn_alt_txt);


        if ($('#send-btn').length == 0) {
            var send_btn_txt_alt = $('#send-btn-txt-alt').val();
            $('#category_actions').append('<button type=\"submit\" id=\"send-btn\" class=\"btn btn-sm btn-primary send-btn\"><i class=\"fa fa-arrow-right\"></i>  ' + send_btn_txt_alt + '</button>');
        }

        if ($('#undo-btn').length == 0) {
            var alt_button_alt_txt = $('#alt-btn-txt-alt').val();
            $('#category_actions').append('<button type=\"submit\" id=\"undo-btn\" class=\"btn btn-sm btn-warning send-btn\"><i class=\"fa fa-repeat\"></i>  ' + alt_button_alt_txt + '</button>');
        }

    });


    $("#category-list").on('click', '.category_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');

        categoryparentField(id);

        swal({
                title: "Είσαστε σίγουρος;",
                text: "Η κατηγορία θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/modules/catering/categories/delete',
                    type: "post",
                    data: {
                        'ct_category_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        swal("Ενημέρωση", "Η κατηγορία διεγράφη!", "success");
                        categoryList();
                    }
                });
            });
    });


    $("#category_actions").on('click', '#undo-btn', function (event) {
        event.preventDefault();
        cleanFields();
    });

    $('#form_categories').validate({
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
            category_title: {
                required: true
            },
        },
        messages: {
            category_title: 'Εισαγετε τίτλο κατηγορίας'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/categories/store',
                type: "post",
                data: {
                    'category_title': $('input[name=category_title]').val(),
                    'category_parent': $('#category_parent').val(),
                    'category_status': $("[name = 'category_status']").val(),
                    'category_state': $('#category_state').val(),
                    'category_description': CKEDITOR.instances.category_description.getData(),
                    'category_action_id': $('input[name=category_action_id]').val(),
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
                    }).appendTo($(".categories_content").css("position", "relative"));
                },

                success: function getcontent(data) {
                    categorylistLoader();
                    // $('#category-list-loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                    categoryStats();
                    jQuery.ajax({
                        url: "/backend/modules/catering/categories/category_list",
                        type: "get",
                        success: function (data) {
                            swal("Ενημέρωση", "Η κατηγορία αποθηκεύτηκε!", "success");
                            $('#category-list').html(data);
                            $('#content_loader').remove();
                            cleanFields();
                            categoryparentField(0);
                        }
                    });
                }

            });
        }
    });

    function cleanFields() {
        $('#category_action_id').val("");
        $('#category_title').val("");
        $('#category_parent').val("");
        $('#category_status').val(1);
        $('#category_state').val(1);
        CKEDITOR.instances.category_description.setData("");
        var send_btn_txt = $('#send-btn-txt').val();
        $('#send-btn').html(send_btn_txt);
        $('#undo-btn').remove();
    }

    function categoryStats() {
        jQuery.ajax({
            url: "/backend/modules/catering/categories/category_stats",
            type: "GET",
            success: function (data) {
                $('#category-stats').html(data);
            }
        });
    }

    function categoryList() {
        jQuery.ajax({
            url: "/backend/modules/catering/categories/category_list",
            type: "GET",
            success: function (data) {
                $('#category-list').html(data);
            }
        });
    }

    function categoryparentField(category_id) {
        jQuery.ajax({
            url: "/backend/modules/catering/categories/"+category_id+"/category_parent_field",
            type: "GET",
            success: function (data) {
                var select = $('#category_parent');
                select.empty().append(data);
            }
        });
    }

    /*function showLoader(loadiv) {
        $('#'+loadiv).html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
    }*/

    function categorylistLoader() {
        $('#category-list-loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');
    }

});
