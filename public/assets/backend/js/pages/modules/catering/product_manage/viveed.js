jQuery(document).ready(function () {


    var product_action = $('input[name=product_action]').val();
    var managed_product_category = $('input[name=managed_product_category]').val();
    var managed_product_id = $('input[name=managed_product_id]').val();

    $('#manage_product_block_action').html($('#manage_product_block_action_txt').val());

    CKEDITOR.replace('product_description', {
        // customConfig: "../../pages/speakers/ckeditor-config.js"
        customConfig: "../../pages/modules/catering/product_manage/ckeditor-config.js"
    });

    switch(product_action) {
        case "create":

            // chosenField('quantity_list', 'quantity_unit');
            chosenField('category_list', 'product_category', '0');
            // chosenField('group_list', 'ingroup_title');
            $('#manage_product_block_actions').hide();

            $(".product-manage-btn").html($('#product-manage-btn-txt').val());

            $('#inquantity_manage_block').find('input, textarea, button, select').attr('disabled','disabled');
            $('#ingroup_manage_blocks').find('input, textarea, button, select').attr('disabled','disabled');

            $('#quantity_manage_block').find('input, textarea, button, select').attr('disabled','disabled');
            $('#ingredient_manage_blocks').find('input, textarea, button, select').attr('disabled','disabled');
            break;


        case "view":

            $('.manage_product_block_anchor').attr('href', '/backend/modules/pricing/products/'+$('#managed_product_id').val()+'/manage');

            showingroupList($('#managed_product_id').val());
            showinquantityList($('#managed_product_id').val());

            showquantityList($('#managed_product_id').val());
            showingredientList($('#managed_product_id').val());

            $(".product-manage-btn").html($('#product-manage-btn-txt').val());
            $('#product_manage_block').find('input, textarea, select').attr('disabled','disabled');

            $('#inquantity_manage_block').find('input, textarea, button, select').attr('disabled','disabled');
            $('#ingroup_manage_blocks').find('input, textarea, button, select').attr('disabled','disabled');

            $('#quantity_manage_block').find('input, textarea, button, select').attr('disabled','disabled');
            $('#ingredient_manage_blocks').find('input, textarea, button, select').attr('disabled','disabled');
            break;


        case "edit":

            chosenField('category_list', 'product_category', '0');
            chosenField('quantity_list', 'quantity_unit', managed_product_category);
            chosenField('group_list', 'ingroup_title', managed_product_category);

            chosenField('ingredient_list', 'ingredient_title', '1');

            // $('#quantity_category_selected').val($('input[name=quantity_quantity]').val());

            // $('#quantity_quantity').mask('99.999');

            $('.manage_product_block_anchor').attr('href', '/backend/modules/pricing/products/'+$('#managed_product_id').val()+'/manage');

            // showingroupList($('#managed_product_id').val());
            showinquantityList($('#managed_product_id').val());

            showquantityList($('#managed_product_id').val());

            showgroupList($('#managed_product_id').val());

            showingredientList($('#managed_product_id').val());

            $('#product_action_id').val($('#managed_product_id').val());
            $(".product-manage-btn").html($('#product-manage-btn-txt-alt').val());
            $('#product_manage_block').find('input, textarea, select').removeAttr('disabled');

            $('#inquantity_manage_block').find('input, textarea, button, select').removeAttr('disabled');
            $('#ingroup_manage_blocks').find('input, textarea, button, select').removeAttr('disabled');

            $('#quantity_manage_block').find('input, textarea, button, select').removeAttr('disabled');
            $('#ingredient_manage_blocks').find('input, textarea, button, select').removeAttr('disabled');
            $('#product_title').val($('#managed_product_title').val());
            $('#product_status').val($('#managed_product_status').val());
            $('#product_state').val($('#managed_product_state').val());
            CKEDITOR.instances.product_description.setData($('#managed_product_description').val());
            break;
        case "delete":

            break;
        default:
            $('#quantity_manage_block').find('input, textarea, button, select').attr('disabled','disabled');
            $('#ingredient_manage_blocks').find('input, textarea, button, select').attr('disabled','disabled');

            $('#inquantity_manage_block').find('input, textarea, button, select').removeAttr('disabled');
            $('#ingroup_manage_blocks').find('input, textarea, button, select').removeAttr('disabled');
    }

    $('#quantity_unit').on('change', function() {
        $('#quantity_category_selected').val(1);
    });

    /*
     |--------------------------------------------------------------------------
     | Product block store forms
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for storing the data of product form blocks. It includes storage function for:
     | - Product manage block
     | - Quantity manage block
     | - Ingredient manage block
     |
     */

    // Product manage block
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
                    'product_category': $('#product_category').val(),
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
                    }).appendTo($(".product-manage-form").css("position", "relative"));
                },

                success: function getcontent(data) {
                    var new_product_id = data;


                    $('#product_manage_block').find('button').attr('disabled','disabled');
                    swal("Ενημέρωση", "Το προϊόν αποθηκεύτηκε!", "success");
                    $('#product_id').val(new_product_id);
                    $('#product_action_id').val(new_product_id);
                    $('#content_loader').remove();

                    // alert("before");

                    // $('.manage_product_block_anchor').attr("href", '/backend/modules/pricing/products/'+new_product_id+'/manage');

                    $(location).attr('href', '/backend/modules/catering/products/'+new_product_id+'/manage');
                    // $('#manage_product_block_anchor').prop("href", '/backend/modules/pricing/products/'+new_product_id+'/manage');

                    $('#manage_product_block_actions').show();

                    // $("a").attr("href", "http://www.google.com/");
                    // var manage_product_url = window.location.href+'/'+new_product_id+'/manage';
                    // alert($(location).attr('href'));
                    // alert(new_product_id);
                    // alert(window.location.href);
                    // var manage_product_anchor = "/pricing/products/"+new_product_id+"/manage";

                    // var manage_product_url = $(location).attr('href').replace('/catering/product/', '/pricing/products/');

                    // alert(manage_product_url);
                    // console.log(manage_product_url);
                    // alert(manage_product_url);
                    // console.log(manage_product_url);
                    // console.log(manage_product_anchor);
                    // console.log(manage_product_url);
                    // $('#manage_product_block_anchor').prop("href", manage_product_url);

                    // alert("after");

                }

            });
        }
    });

    // Ingroup manage block
    $('#form_ingroups_manage').validate({
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
            ingroup_title: {
                required: true
            },
        },
        messages: {
            ingroup_title: 'Εισαγετε ομάδα συστατικού'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/products/store_group',
                type: "post",
                data: {
                    'product_action_id': $('input[name=product_action_id]').val(),
                    'ingroup_action_id': $('input[name=ingroup_action_id]').val(),
                    'ingroup_id': $('[name=ingroup_title]').val(),
                    'ingroup_selection': $('#ingroup_selection').val(),
                    'ingroup_status': $("[name = 'ingroup_status']").val(),
                    'ingroup_state': $('#ingroup_state').val(),
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
                    }).appendTo($(".ingroup-manage-list").css("position", "relative"));
                },

                success: function getcontent(data) {
                    swal("Ενημέρωση", "Η ομάδα συστατικών αποθηκεύτηκε!", "success");
                    showingroupList($('#managed_product_id').val());
                    $('#form_ingroups_manage').trigger("reset");
                    $('#ingroup_manage_btn').html($('#ingroup-manage-btn-txt-alt').val());
                    $('#ingroup_undo_btn').remove();
                    $('#content_loader').remove();

                }

            });
        }
    });

    // Ingredient manage block
    $('#form_inquantities_manage').validate({
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
            inquantity_title: {
                required: true
            },
        },
        messages: {
            inquantity_title: 'Εισαγετε τίτλο συστατικού'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/products/store_inquantity',
                type: "post",
                data: {
                    'inquantity_title': $('input[name=inquantity_title]').val(),
                    'inquantity_quantity': $('input[name=inquantity_quantity]').val(),
                    'inquantity_status': $("[name = 'inquantity_status']").val(),
                    'inquantity_state': $('#inquantity_state').val(),
                    'product_action_id': $('input[name=product_action_id]').val(),
                    'inquantity_action_id': $('input[name=inquantity_action_id]').val(),
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
                    }).appendTo($(".inquantity-manage-list").css("position", "relative"));
                },

                success: function getcontent(data) {
                    swal("Ενημέρωση", "Η ποσότητα του συστατικού αποθηκεύτηκε!", "success");
                    showinquantityList($('#managed_product_id').val());
                    $('#form_inquantities_manage').trigger("reset");
                    $('#inquantity_manage_btn').html($('#inquantity-manage-btn-txt-alt').val());
                    $('#inquantity_undo_btn').remove();
                    $('#content_loader').remove();
                }

            });
        }
    });


    // Quantity manage block
    $('#form_quantities_manage').validate({
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
            quantity_unit: {
                required: true
            },
        },
        messages: {
            quantity_unit: 'Εισαγετε μονάδα μέτρησης'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/products/store_quantity',
                type: "post",
                data: {
                    'quantity_id': $('[name=quantity_unit]').val(),
                    'quantity_quantity': $('input[name=quantity_quantity]').val(),
                    'quantity_status': $("[name = 'quantity_status']").val(),
                    'quantity_state': $('#quantity_state').val(),
                    'product_action_id': $('input[name=product_action_id]').val(),
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
                    }).appendTo($(".quantity-manage-list").css("position", "relative"));
                },

                success: function getcontent(data) {
                    // var new_product_id = data;

                    // $('#quantity_manage_block').find('button').attr('disabled','disabled');
                    swal("Ενημέρωση", "Η μονάδα μέτρησης αποθηκεύτηκε!", "success");
                    // $('#product_id').val(new_product_id);
                    showquantityList($('#managed_product_id').val());
                    $('#form_quantities_manage').trigger("reset");
                    $('#quantity_action_id').val("");
                    $('#quantity_manage_btn').html($('#quantity-manage-btn-txt-alt').val());
                    $('#quantity_undo_btn').remove();
                    $('#content_loader').remove();

                }

            });
        }
    });

    // Ingredient manage block
    $('#form_ingredients_manage').validate({
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
            ingredient_title: {
                required: true
            },
        },
        messages: {
            ingredient_title: 'Εισαγετε τίτλο συστατικού'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/catering/products/store_ingredient',
                type: "post",
                data: {
                    'ingredient_title': $('[name=ingredient_title]').val(),
                    'ingredient_description': $('[name=ingredient_description]').val(),
                    // 'ingredient_unit': $('input[name=ingredient_unit]').val(),
                    'ingredient_quantity': $('input[name=ingredient_quantity]').val(),
                    'ingredient_status': $("[name = 'ingredient_status']").val(),
                    'ingredient_state': $('#ingredient_state').val(),
                    'product_action_id': $('input[name=product_action_id]').val(),
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
                    }).appendTo($(".ingredient-manage-list").css("position", "relative"));
                },

                success: function getcontent(data) {
                    swal("Ενημέρωση", "Το συστατικό αποθηκεύτηκε!", "success");
                    showingredientList($('#managed_product_id').val());
                    $('#form_ingredients_manage').trigger("reset");
                    $('#ingredient_manage_btn').html($('#ingredient-manage-btn-txt-alt').val());
                    $('#ingredient_undo_btn').remove();
                    $('#content_loader').remove();
                }

            });
        }
    });

    /*
     |--------------------------------------------------------------------------
     | Product block instance edit
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for editing the entries of product blocks. It includes the edit functions for:
     | - Product quantity list
     | - Product ingredient list
     |
     */

    // Product quantity edit
    $("#ingroup_list").on('click', '.ingroup_edit', function (event) {
        event.preventDefault();
        $('#form_ingroups_manage').trigger("reset");
        var ingroup_manage_btn_txt_alt = $('#ingroup-manage-btn-txt-alt').val();
        $('#ingroup_manage_btn').html(ingroup_manage_btn_txt_alt);
        if ($('#ingroup_undo_btn').length == 0) {
            var ingroup_undo_btn_txt = $('#ingroup_undo_btn_txt').val();
            $('#ingroup_actions').append('<button type=\"submit\" id=\"ingroup_undo_btn\" class=\"btn btn-sm btn-warning send-btn\">' + ingroup_undo_btn_txt + '</button>');
        }
        var id = $(this).attr('id');
        var ingroup_title_txt = $(this).closest('tr').children('td.ingroup_title_txt').html();
        var ingroup_selection_txt = $(this).closest('tr').children('td.ingroup_selection_txt').html();
        ingroup_selection_txt = ingroup_selection_txt.trim();
        var ingroup_status_txt = $(this).closest("tr").find(".ingroup_status_txt").text();
        ingroup_status_txt = ingroup_status_txt.trim();
        var ingroup_state_txt = $(this).closest("tr").find(".ingroup_state_txt").text();
        ingroup_state_txt = ingroup_state_txt.trim();
        $('#ingroup_action_id').val(id);
        $('#ingroup_title').val(ingroup_title_txt);
        $("#ingroup_selection option").filter(function() {
            return this.text == ingroup_selection_txt;
        }).prop('selected', true);
        $("#ingroup_status option").filter(function() {
            return this.text == ingroup_status_txt;
        }).prop('selected', true);
        $("#ingroup_state option").filter(function() {
            return this.text == ingroup_state_txt;
        }).prop('selected', true);

        var ingroup_btn_alt_txt = $('#ingroup_manage_btn_txt_alt').val();
        $('#ingroup_manage_btn').html(ingroup_btn_alt_txt);

    });

    // Product quantity edit
    $("#quantity_list").on('click', '.quantity_edit', function (event) {
        event.preventDefault();

        $('#form_quantities_manage').trigger("reset");

        var quantity_manage_btn_txt_alt = $('#quantity-manage-btn-txt-alt').val();
        $('#quantity_manage_btn').html(quantity_manage_btn_txt_alt);
        if ($('#quantity_undo_btn').length == 0) {
            var quantity_undo_btn_txt = $('#quantity-undo-btn-txt').val();
            $('#quantity_actions').append('<button type=\"submit\" id=\"quantity_undo_btn\" class=\"btn btn-sm btn-warning send-btn\">' + quantity_undo_btn_txt + '</button>');
        }

        var id = $(this).attr('id');

        var quantity_unit_id = $(this).closest("tr").find(".quantity_title_id").data("value");
        var quantity_unit_txt = $(this).closest("tr").find(".quantity_title_id").text();
        quantity_unit_txt = quantity_unit_txt.trim();

        $('#quantity_unit option[value="' + quantity_unit_id + '"]').remove();
        $('#quantity_unit').append('<option value="' + quantity_unit_id + '" selected="selected">' + quantity_unit_txt + '</option>');

        $("#quantity_unit").trigger("chosen:updated");


        $('#quantity_category_selected').val(1);


        var quantity_quantity = $(this).closest("tr").find(".quantity_quantity").text();
        quantity_quantity = quantity_quantity.trim();
        var quantity_status_txt = $(this).closest("tr").find(".quantity_status_txt").text();
        quantity_status_txt = quantity_status_txt.trim();
        var quantity_state_txt = $(this).closest("tr").find(".quantity_state_txt").text();
        quantity_state_txt = quantity_state_txt.trim();

        $('#quantity_action_id').val(id);

        $('#quantity_quantity').val(quantity_quantity);

        $("#quantity_status option").filter(function() {
            return this.text == quantity_status_txt;
        }).prop('selected', true);

        $("#quantity_state option").filter(function() {
            return this.text == quantity_state_txt;
        }).prop('selected', true);

        var send_btn_alt_txt = $('#send-btn-txt-alt').val();
        $('#send-btn').html(send_btn_alt_txt);

    });

    // Product ingredient edit
    $("#ingredient_list").on('click', '.ingredient_edit', function (event) {
        event.preventDefault();
        $('#form_ingredients_manage').trigger("reset");
        var ingredient_manage_btn_txt_alt = $('#ingredient-manage-btn-txt-alt').val();
        $('#ingredient_manage_btn').html(ingredient_manage_btn_txt_alt);
        if ($('#ingredient_undo_btn').length == 0) {
            var ingredient_undo_btn_txt = $('#ingredient-undo-btn-txt').val();
            $('#ingredient_actions').append('<button type=\"submit\" id=\"ingredient_undo_btn\" class=\"btn btn-sm btn-warning send-btn\">' + ingredient_undo_btn_txt + '</button>');
        }

        var id = $(this).attr('id');
        var ingredient_title_txt = $(this).closest('tr').children('td.ingredient_title_txt').html();
        var ingredient_description_txt = $(this).closest('tr').children('td.ingredient_description_txt').html();
        var ingredient_unit_txt = $(this).closest('tr').children('td.ingredient_unit_txt').html();
        var ingredient_quantity_txt = $(this).closest('tr').children('td.ingredient_quantity_txt').html();
        var ingredient_status_txt = $(this).closest("tr").find(".ingredient_status_txt").text();
        ingredient_status_txt = ingredient_status_txt.trim();
        var ingredient_state_txt = $(this).closest("tr").find(".ingredient_state_txt").text();
        ingredient_state_txt = ingredient_state_txt.trim();


        $('#ingredient_action_id').val(id);
        $('#ingredient_title').val(ingredient_title_txt);
        $('#ingredient_description').val(ingredient_description_txt);
        $('#ingredient_unit').val(ingredient_unit_txt);
        $('#ingredient_quantity').val(ingredient_quantity_txt);

        $("#ingredient_status option").filter(function() {
            return this.text == ingredient_status_txt;
        }).prop('selected', true);

        $("#ingredient_state option").filter(function() {
            return this.text == ingredient_state_txt;
        }).prop('selected', true);

        var send_btn_alt_txt = $('#send-btn-txt-alt').val();
        $('#send-btn').html(send_btn_alt_txt);

    });

    /*
     |--------------------------------------------------------------------------
     | End Of Product block instance edit
     |--------------------------------------------------------------------------
     */



    /*
     |--------------------------------------------------------------------------
     | Product block instance delete
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for deleting the entries of product blocks. It includes the edit functions for:
     | - Ingredient group list
     | - Ingredient quantity list
     | - Product quantity list
     | - Product ingredient list
     |
     */

    // Ingredient group delete
    $("#ingroup_list").on('click', '.ingroup_delete', function (event) {
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
                    url: '/backend/modules/catering/products/delete_ingroup',
                    type: "post",
                    data: {
                        'ingroup_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        swal("Ενημέρωση", "Η ομάδα συστατικών διεγράφη!", "success");
                        $('#form_ingroups_manage').trigger("reset");
                        showingroupList($('#managed_product_id').val());
                    }
                });
            });
    });

    // Ingredient group delete
    $("#inquantity_list").on('click', '.inquantity_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');
        swal({
                title: "Είσαστε σίγουρος;",
                text: "Η ποσότητα συστατικού θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/modules/catering/products/delete_inquantity',
                    type: "post",
                    data: {
                        'inquantity_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        swal("Ενημέρωση", "Η ποσότητα συστατικού διεγράφη!", "success");
                        $('#form_inquantities_manage').trigger("reset");
                        showinquantityList($('#managed_product_id').val());
                    }
                });
            });
    });

    // Product quantity delete
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
                    url: '/backend/modules/catering/products/delete_quantity',
                    type: "post",
                    data: {
                        'product_action_id': managed_product_id,
                        'quantity_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        swal("Ενημέρωση", "Η μονάδα μέτρησης διεγράφη!", "success");
                        $('#form_quantities_manage').trigger("reset");
                        showquantityList($('#managed_product_id').val());
                    }
                });
            });
    });

    // Product quantity delete
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
                    url: '/backend/modules/catering/products/delete_ingredient',
                    type: "post",
                    data: {
                        'ingredient_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        swal("Ενημέρωση", "Το συστατικό διεγράφη!", "success");
                        $('#form_ingredients_manage').trigger("reset");
                        showingredientList($('#managed_product_id').val());
                    }
                });
            });
    });

    /*
     |--------------------------------------------------------------------------
     | End Of Product block instance delete
     |--------------------------------------------------------------------------
     */



    /*
     |--------------------------------------------------------------------------
     | Product create block triggers
     |--------------------------------------------------------------------------
     |
     | The following javascript lines are for triggering the save button of product store block.
     |
     */

    // Trigger from input change
    $('#product_manage_block').on('input', function() {
        $('#product_manage_block').find('button').removeAttr('disabled');
    });

    // Trigger from ckeditor change
    CKEDITOR.instances.product_description.on('change', function() {
        $('#product_manage_block').find('button').removeAttr('disabled');
    });

    /*
     |--------------------------------------------------------------------------
     | End Of Product create block triggers
     |--------------------------------------------------------------------------
     */



    /*
     |--------------------------------------------------------------------------
     | Product lists
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for retrieve the data of product lists. It includes the list functions for:
     | - Ingredient group list
     | - Ingredient quantity list
     | - Product quantity list
     | - Product ingredient list
     |
     */

    // Populates Ingredient group List block
    function showingroupList(product_id) {
        $('#ingroup_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
        jQuery.ajax({
            url: "/backend/modules/catering/product/"+product_id+"/ingroup_list",
            type: "GET",
            success: function (data) {
                $('#ingroup_list').html(data);
            }
        });
    }

    // Populates Ingredient quantity block
    function showinquantityList(product_id) {
        $('#inquantity_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
        jQuery.ajax({
            url: "/backend/modules/catering/product/"+product_id+"/inquantity_list",
            type: "GET",
            success: function (data) {
                $('#inquantity_list').html(data);

            }
        });
    }

    // Populates Ingredient group List block
    function showgroupList(product_id) {
        $('#ingroup_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
        jQuery.ajax({
            url: "/backend/modules/catering/products/"+product_id+"/product_group_list",
            type: "GET",
            success: function (data) {
                $('#ingroup_list').html(data);

                tablerowsList('product_catering_groups', 'ingroup_manage_tab_text');

                chosenavailableField('group_title_id', 'ingroup_title');

            }
        });
    }

    // Populates Quantity List block
    function showquantityList(product_id) {
        $('#quantity_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
        jQuery.ajax({
            url: "/backend/modules/catering/products/"+product_id+"/product_quantity_list",
            type: "GET",
            success: function (data) {
                $('#quantity_list').html(data);

                // console.log($('#product_catering_quantities').data('count'));

                // var product_catering_quantities = $(data).find('#product_catering_quantities').data('count');
                // console.log(product_catering_quantities);
                // alert(product_catering_quantities);

                tablerowsList('product_catering_quantities', 'quantity_manage_tab_text');
                // showingredientviewBlock();
            }
        });
    }

    // Populates Ingredient List block
    function showingredientList(product_id) {
        $('#ingredient_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
        jQuery.ajax({
            url: "/backend/modules/catering/products/"+product_id+"/product_ingredient_list",
            type: "GET",
            success: function (data) {
                $('#ingredient_list').html(data);

                tablerowsList('product_catering_ingredients', 'ingredient_manage_tab_text');

                chosenavailableField('ingredient_title_id', 'ingredient_title');
            }
        });
    }

    /*
     |--------------------------------------------------------------------------
     | End Of Product list
     |--------------------------------------------------------------------------
     */



    /*
     |--------------------------------------------------------------------------
     | Product list data
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for retrieving the data for block listing. It includes storage function for:
     | - Quantity manage block
     | - Ingredient manage block
     |
     */

    // Quantity Undo Function
    $("#quantity_actions").on('click', '#quantity_undo_btn', function (event) {
        event.preventDefault();
        $('#form_quantities_manage').trigger("reset");
        $("#quantity_action_id").val("");
        var quantity_manage_btn_txt = $('#quantity-manage-btn-txt').val();
        $('#quantity_manage_btn').html(quantity_manage_btn_txt);
        // $('#quantity_manage_btn').html(send_btn_txt);
        $('#quantity_undo_btn').remove();

    });

    // Ingroup Undo Function
    $("#ingroup_actions").on('click', '#ingroup_undo_btn', function (event) {
        event.preventDefault();
        $('#form_ingroups_manage').trigger("reset");
        $("#ingroup_action_id").val("");
        var ingroup_manage_btn_txt = $('#ingroup_manage_btn_txt').val();
        $('#ingroup_manage_btn').html(ingroup_manage_btn_txt);
        // $('#quantity_manage_btn').html(send_btn_txt);
        $('#ingroup_undo_btn').remove();

    });

    // Quantity Undo Function
    $("#ingredient_actions").on('click', '#ingredient_undo_btn', function (event) {
        event.preventDefault();
        $('#form_ingredients_manage').trigger("reset");
        $("#ingredient_action_id").val("");
        var ingredient_manage_btn_txt = $('#ingredient-manage-btn-txt').val();
        $('#ingredient_manage_btn').html(ingredient_manage_btn_txt);
        // $('#quantity_manage_btn').html(send_btn_txt);
        $('#ingredient_undo_btn').remove();

    });

    /*function cleanFields(block_id) {
        $('#'+block_id).trigger("reset");
    }*/

    function chosenField(field, target, product_id){
        if(product_id > 0){
            field = product_id+'/'+field;
        }
        jQuery.ajax({
            url: "/backend/modules/catering/products/"+field,
            type: "GET",
            success: function (data) {
                $('#'+target).append(data);
                var config = {
                    '.chosen-container': {width: "100%" },
                    '.chosen-select': {},
                    '.chosen-select-deselect': {allow_single_deselect: true},
                    '.chosen-select-no-single': {disable_search_threshold: 10},
                    '.chosen-select-no-results': {no_results_text: 'Συγγνώμη, δεν βρέθηκαν κατηγορίες!'},
                    '.chosen-select-width': {width: "100%"}
                };
                for (var selector in config) {
                    $('#'+target).chosen(config[selector]);
                }

                if (target == "product_category"){
                    var managed_product_category_id = $('input[name=managed_product_category]').val();
                    var managed_product_category_title = $('input[name=managed_product_category_title]').val();
                    $('#product_category option[value="' + managed_product_category_id + '"]').remove();
                    $('#product_category').append('<option value="' + managed_product_category_id + '" selected="selected">' + managed_product_category_title + '</option>');
                    $("#product_category").trigger("chosen:updated");
                }

            }
        });
    }

    function chosenavailableField(field, target){

        // var list_data = 'category_' + id;
        $('.' + field).each(function () {
            // alert(field);
            var selection_id = $(this).data('value');
            var selection_value = $(this).text();
            selection_value = selection_value.trim();

            // alert(selection_id);
            // var category_id = $(this).attr('id');
            // var category_title = $(this).text();
            // category_title = category_title.trim();

            // $('#'+target+' option[value="' + selection_id + '"]').remove();

            $('#'+target+' option[value="' + selection_id + '"]').attr("disabled", true);

            // $('#'+target).append('<option value="' + selection_id + '" selected="selected">' + selection_value + '</option>');
            $("#"+target).trigger("chosen:updated");
        });

    }

    function choseninitField(field, target, product_id){
                $('#'+target).append(data);
                var config = {
                    '.chosen-container': {width: "100%" },
                    '.chosen-select': {},
                    '.chosen-select-deselect': {allow_single_deselect: true},
                    '.chosen-select-no-single': {disable_search_threshold: 10},
                    '.chosen-select-width': {width: "100%"}
                };
                for (var selector in config) {
                    $('#'+target).chosen(config[selector]);
                }
    }

    function tablerowsList(table, target) {
        // var rowCount = $('#'+table+' tr').length;
        // var tab_message = "("+$('#'+table).data("count")+")";

        var data = $('#'+table).data('count');
        var tab_message = "("+data+")";
        // alert($('#product_catering_quantities').data('count'));
        $("#"+target).text(tab_message);

    }

});
