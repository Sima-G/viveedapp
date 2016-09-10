jQuery(document).ready(function () {

    CKEDITOR.replace('product_description', {
        customConfig: "../../pages/speakers/ckeditor-config.js"
    });
    CKEDITOR.replace('ingredient_description', {
        customConfig: "../../pages/speakers/ckeditor-config.js"
    });
    // $('#category-list-loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');


    var product_action = $('input[name=product_action]').val();
    if ((product_action == 2) || (product_action == 3)){
        var product_id = 1;
        alert(product_action);
        showingredientmanageBlock(product_id);
    }



    // categoryStats();
    // speakerList();

    /*$("#category-list").on('click', '.category_edit', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');
        var category_status_txt = $(this).closest("tr").find(".category_status_txt").text();
        category_status_txt = category_status_txt.trim();
        var category_state_txt = $(this).closest("tr").find(".category_state_txt").text();
        category_state_txt = category_state_txt.trim();
        var category_title = $(this).closest('tr').children('td.category_title').html();
        $('#category_action_id').val(id);
        $('#category_title').val(category_title);
        CKEDITOR.instances.category_description.setData($('#description_' + id).html());

        $("#category_status option").filter(function() {
            return this.text == category_status_txt;
        }).prop('selected', true);


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

    });*/


    /*$("#speaker-list").on('click', '.speaker_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');
        swal({
                title: "Είσαστε σίγουρος;",
                text: "Ο ομιλιτής θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/schedule/speakers/delete',
                    type: "post",
                    data: {
                        'ct_category_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        swal("Ενημέρωση", "Ο ομιλιτής διεγράφη!", "success");
                        speakerList();
                    }
                });
            });
    });*/


    /*$("#category_actions").on('click', '#undo-btn', function (event) {
        event.preventDefault();
        cleanFields();
    });*/

    $('#form_products_manage').validate({
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
            product_title: {
                required: true
            },
        },
        messages: {
            product_title: 'Εισαγετε τίτλο προϊόντος'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/products/store_product',
                type: "post",
                data: {
                    'product_title': $('input[name=product_title]').val(),
                    'product_status': $("[name = 'product_status']").val(),
                    'product_state': $('#product_state').val(),
                    'product_description': CKEDITOR.instances.product_description.getData(),
                    'product_action_id': $('input[name=product_action_id]').val(),
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
                    }).appendTo($(".product-create-form").css("position", "relative"));
                },

                success: function getcontent(data) {
                    // $('#product-list-loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                    var new_product_id = data;
                    jQuery.ajax({
                        url: "/backend/modules/catering/products/"+data+"/product_view_block",
                        type: "get",
                        success: function (data) {
                            swal("Ενημέρωση", "Το προϊόν δημιουργήθηκε!", "success");
                            $('#product_manage_block').replaceWith(data);
                            $('#product_id').val(new_product_id);
                            $('#content_loader').remove();
                            showingredientmanageBlock();

                            // cleanFields();
                        }
                    });
                }

            });
        }
    });

    $('.product-manage-btn').click(function () {

        var product_id = $('input[name=product_id]').val();

        $("<div id='content_loader' style='text-align: center'><i style='position: relative; top: calc(50% - 10px)' class='fa fa-asterisk fa-4x fa-spin'></i></div>").css({
            position: "absolute",
            width: "100%",
            height: "100%",
            top: 0,
            left: 0,
            opacity: 0.7,
            background: "#ccc"
        }).appendTo($(".product-create-form").css("position", "relative"));

        jQuery.ajax({
            url: "/backend/modules/catering/products/"+product_id+"/product_manage_block",
            type: "get",
            success: function (data) {
                $('#product_view_block').replaceWith(data);
            }
        });
    });

    /*function cleanFields() {
        $('#category_action_id').val("");
        $('#category_title').val("");
        $('#category_status').val(1);
        $('#category_state').val(1);
        CKEDITOR.instances.category_description.setData("");
        var send_btn_txt = $('#send-btn-txt').val();
        $('#send-btn').html(send_btn_txt);
        $('#undo-btn').remove();
    }*/

    /*function speakerList() {
        jQuery.ajax({
            url: "/backend/modules/catering/categories/category_list",
            type: "GET",
            success: function (data) {
                $('#category-list').html(data);
            }
        });
    }*/

    /*function categoryStats() {
        jQuery.ajax({
            url: "category_stats",
            type: "GET",
            success: function (data) {
                $('#category-stats').html(data);
            }
        });
    }*/

    function showingredientmanageBlock(product_id) {
        jQuery.ajax({
            url: "/backend/modules/catering/products/"+product_id+"/ingredient_manage_block",
            type: "GET",
            success: function (data) {
                $('#ingredient_manage_blocks').append(data);
                showingredientviewBlock();
            }
        });
    }

    function showingredientviewBlock() {
        jQuery.ajax({
            url: "/backend/modules/catering/products/ingredient_view_block",
            type: "GET",
            success: function (data) {
                $('#ingredient_manage_blocks').append(data);
            }
        });
    }

});
