jQuery(document).ready(function () {

    $('#price_manage_block').find('input, textarea, select, button').not('.price_edit').not('.price_delete').attr('disabled','disabled');

    /*
     |--------------------------------------------------------------------------
     | Pricing catalogue block store forms
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for storing the data of price catalogue form blocks. It includes storage function for:
     | - Catalogue manage block
     |
     */

    // Pricing catalogue manage block
    // $(".price_manage_form").on('click', '.price_save', function (event) {
    //     // event.preventDefault();
    //
    //     var product_action_id = $(this).attr('value');
    //
    //     alert(product_action_id);

    // $("#price_manage_block").on('click', '.price_edit', function (event) {
    //     event.preventDefault();



    // $('#catalogue_actions').append('<button id=\"catalogue_undo_btn\" class=\"btn btn-sm btn-warning undo-btn\">' + catalogue_undo_btn_txt + '</button>');



        // $('.price_save').click(function () {
    $("#price_manage_block").on('click', '.price_save', function (event) {
        event.preventDefault();
            var  formID = $(this).attr('value');
            var formSID = $(this).attr('name');
            // var formDetails = $('#quantity_'+formID);
            var formDetails = $('#qnt_'+formID+'_'+formSID);
            $.ajax({
                url: '/backend/modules/pricing/products/store',
                type: "post",
                data: formDetails.serialize(),
                success: function getcontent(data) {
                    swal("Ενημέρωση", "Η τιμή στον κατάλογο αποθηκεύτηκε!", "success");
                }
            });
    });


    $("#price_manage_block").on('click', '.price_edit', function (event) {
        event.preventDefault();
        var id = $(this).attr('value');
        var catalogue = $(this).attr('name');
        var quantity = "qnt_"+id+"_"+catalogue;
        // $('#'+quantity+'.'+catalogue).find('input, textarea, button').removeAttr('disabled');
        $('#'+quantity).find('input, textarea, button').removeAttr('disabled');
    });

    // Quantity Undo Function
    $("#price_manage_block").on('click', '.price_undo', function (event) {
        event.preventDefault();
        // var id = $(this).attr('id');
        var id = $(this).attr('value');
        var catalogue = $(this).attr('name');
        // var quantity = "quantity_"+id;
        var quantity = "qnt_"+id+"_"+catalogue;
        // $('#'+quantity+'.'+catalogue).find('input').not(':hidden').val('');
        $('#'+quantity).find('input').not(':hidden').val('');

        // $('#catalogue_manage_btn').html($('#catalogue_manage_btn_txt').val());

        $('#price_'+id).val($('#old_price_'+id).val());
        $('#discount_'+id).val($('#old_discount_'+id).val());
        // $('#quantity_unit').val(quantity_unit_txt);
        // $('#quantity_unit').val(quantity_unit_txt);
    });





    /*$('input:checkbox').change(function(){
        var tot=0;
        $('input:checkbox:checked').each(function(){
            tot+=parseInt($(this).val());
        });
        $('#catalogue_dates').val(tot)
    });*/

    showcatalogueList();
    catalogueStats();

    /*
     |--------------------------------------------------------------------------
     | Pricing catalogue block store forms
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for storing the data of price catalogue form blocks. It includes storage function for:
     | - Catalogue manage block
     |
     */

    // Pricing catalogue manage block
    $('#form_catalogues_manage').validate({
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
            ingredient_title: 'Εισαγετε όνομα καταλόγου'
        },

        submitHandler: function(form) {
            $.ajax({
                url: '/backend/modules/pricing/catalogues/store',
                type: "post",
                data: {
                    'catalogue_title': $('input[name=catalogue_title]').val(),
                    'catalogue_description': $('[name=catalogue_description]').val(),
                    'catalogue_status': $("[name = 'catalogue_status']").val(),
                    'catalogue_state': $('#catalogue_state').val(),
                    'catalogue_dates': $('input[name=catalogue_dates]').val(),
                    'catalogue_start_date': $('input[name=catalogue_start_date]').val(),
                    'catalogue_end_date': $('input[name=catalogue_end_date]').val(),
                    'catalogue_start_hour': $('input[name=catalogue_start_hour]').val(),
                    'catalogue_end_hour': $('input[name=catalogue_end_hour]').val(),
                    'catalogue_action_id': $('input[name=catalogue_action_id]').val(),
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
                    swal("Ενημέρωση", "Ο κατάλογος αποθηκεύτηκε!", "success");
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
     | Pricing catalogue block instance edit
     |--------------------------------------------------------------------------
     |
     | The following javascript lines contain the code for editing the entries of price catalogue blocks. It includes the edit functions for:
     | - Pricing catalogue list
     |
     */

    // Pricing catalogue edit
    $("#quantity_list").on('click', '.quantity_edit', function (event) {
        event.preventDefault();
        // cleanFields();
        // cleanFields(quantity_manage_block);
        $('#form_quantities_manage').trigger("reset");

        // $('#form_quantities_manage').find('select').val('1');

        var quantity_manage_btn_txt_alt = $('#quantity-manage-btn-txt-alt').val();
        $('#quantity_manage_btn').html(quantity_manage_btn_txt_alt);
        if ($('#quantity_undo_btn').length == 0) {
            var quantity_undo_btn_txt = $('#quantity-undo-btn-txt').val();
            $('#quantity_actions').append('<button type=\"submit\" id=\"quantity_undo_btn\" class=\"btn btn-sm btn-warning send-btn\">' + quantity_undo_btn_txt + '</button>');
        }

        var id = $(this).attr('id');

        var quantity_unit_txt = $(this).closest('tr').children('td.quantity_unit_txt').html();

        var quantity_quantity_txt = $(this).closest('tr').children('td.quantity_quantity_txt').html();

        var quantity_status_txt = $(this).closest("tr").find(".quantity_status_txt").text();
        quantity_status_txt = quantity_status_txt.trim();
        var quantity_state_txt = $(this).closest("tr").find(".quantity_state_txt").text();
        quantity_state_txt = quantity_state_txt.trim();


        $('#quantity_action_id').val(id);

        $('#quantity_unit').val(quantity_unit_txt);

        $('#quantity_quantity').val(quantity_quantity_txt);

        /*$("#category_parent option").filter(function() {
         return this.text == category_parent_txt;
         }).prop('selected', true);*/

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
    $("#catalogue_list").on('click', '.ingredient_edit', function (event) {
        event.preventDefault();
        $('#form_catalogues_manage').trigger("reset");
        var catalogue_manage_btn_txt_alt = $('#catalogue_manage_btn_txt_alt').val();
        $('#catalogue_manage_btn').html(catalogue_manage_btn_txt_alt);
        if ($('#catalogue_undo_btn').length == 0) {
            var catalogue_undo_btn_txt = $('#catalogue_undo_btn_txt').val();
            $('#catalogue_actions').append('<button type=\"submit\" id=\"ingredient_undo_btn\" class=\"btn btn-sm btn-warning send-btn\">' + ingredient_undo_btn_txt + '</button>');
        }
        var id = $(this).attr('id');

        var catalogue_title_txt = $('#catalogue_title_'+id).text();

        alert(catalogue_title_txt);
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
     | - Product quantity list
     | - Product ingredient list
     |
     */

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
                        'ct_quantity_action_id': id,
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
    /*CKEDITOR.instances.product_description.on('change', function() {
        $('#product_manage_block').find('button').removeAttr('disabled');
    });*/

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
     | - Product quantity list
     | - Product ingredient list
     |
     */

    // Populates Quantity List block
    function showcatalogueList(product_id) {
        $('#quantity_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
        jQuery.ajax({
            url: "/backend/modules/pricing/catalogues/catalogue_list",
            type: "GET",
            success: function (data) {
                $('#catalogue_list').html(data);
                // showingredientviewBlock();
            }
        });
    }

    // Populates Ingredient List block
    function catalogueStats() {
        jQuery.ajax({
            url: "/backend/modules/pricing/catalogues/catalogue_stats",
            type: "GET",
            success: function (data) {
                $('#catalogue_stats').html(data);
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

    // Quantity Undo Function
    $("#ingredient_actions").on('click', '#ingredient_undo_btn', function (event) {
        event.preventDefault();
        $('#form_ingredients_manage').trigger("reset");
        $("#ingredient_action_id").val("");
        var ingredient_manage_btn_txt = $('#ingredient-manage-btn-txt').val();
        $('#quantity_manage_btn').html(ingredient_manage_btn_txt);
        // $('#quantity_manage_btn').html(send_btn_txt);
        $('#ingredient_undo_btn').remove();

    });

    /*function cleanFields(block_id) {
     $('#'+block_id).trigger("reset");
     }*/

});
