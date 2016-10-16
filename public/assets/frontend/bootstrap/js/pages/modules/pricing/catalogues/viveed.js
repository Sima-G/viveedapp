jQuery(document).ready(function () {

    $('input:checkbox').change(function(){
        var tot=0;
        $('input:checkbox:checked').each(function(){
            tot+=parseInt($(this).val());
        });
        $('#catalogue_days').val(tot)
    });

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
            catalogue_title: {
                required: true
            },
        },
        messages: {
            catalogue_title: 'Εισαγετε όνομα καταλόγου'
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
                    'catalogue_days': $('input[name=catalogue_days]').val(),
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
                    }).appendTo($(".catalogue-manage-list").css("position", "relative"));
                },

                success: function getcontent(data) {
                    swal("Ενημέρωση", "Ο κατάλογος αποθηκεύτηκε!", "success");
                    showcatalogueList();

                    $('#form_catalogues_manage').trigger("reset");

                    $('#catalogue_manage_btn').html($('#catalogue_manage_btn_txt').val());
                    $('#catalogue_undo_btn').remove();

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
    $("#catalogue_list").on('click', '.catalogue_edit', function (event) {
        event.preventDefault();

        $('#form_catalogues_manage').trigger("reset");

        undoButtons();

        var id = $(this).attr('id');

        var catalogue_title = $('#catalogue_title_'+id).text();
        var catalogue_description = $('#catalogue_description_'+id).text();
        var catalogue_start_date = $('#catalogue_start_date_'+id).text();
        var catalogue_end_date = $('#catalogue_end_date_'+id).text();
        var catalogue_start_hour = $('#catalogue_start_hour_'+id).text();
        var catalogue_end_hour = $('#catalogue_end_hour_'+id).text();
        var catalogue_days = $('#catalogue_days_'+id).data("days");

        var days = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
        $.each( days, function(index, value){
            if ($('#catalogue_day_'+value+'_'+id).data("selected") == 1){
                $( "#catalogue_day_"+value ).prop( "checked", true );
            } else {
                $( "#catalogue_day_"+value ).prop( "checked", false );
            }
        });

        $('#catalogue_title').val(catalogue_title);
        $('#catalogue_description').val(catalogue_description);
        $('#catalogue_start_date').val(catalogue_start_date);
        $('#catalogue_end_date').val(catalogue_end_date);
        $('#catalogue_start_hour').val(catalogue_start_hour);
        $('#catalogue_end_hour').val(catalogue_end_hour);
        $('#catalogue_days').val(catalogue_days);
        $('#catalogue_action_id').val(id);



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
    $("#catalogue_list").on('click', '.catalogue_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');
        initButtons();
        swal({
                title: "Είσαστε σίγουρος;",
                text: "Ο τιμοκατάλογος θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/modules/pricing/catalogues/delete',
                    type: "post",
                    data: {
                        'catalogue_action_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        swal("Ενημέρωση", "Ο κατάλογος διεγράφη!", "success");
                        $('#form_catalogues_manage').trigger("reset");
                        showcatalogueList();
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

    function initButtons() {
        var catalogue_manage_btn_txt = $('#catalogue_manage_btn_txt').val();
        $('#catalogue_manage_btn').html(catalogue_manage_btn_txt);
        $('#catalogue_undo_btn').remove();
    }

    function undoButtons() {
        if ($('#catalogue_undo_btn').length == 0) {
            var catalogue_undo_btn_txt = $('#catalogue_undo_btn_txt').val();
            $('#catalogue_actions').append('<button id=\"catalogue_undo_btn\" class=\"btn btn-sm btn-warning undo-btn\">' + catalogue_undo_btn_txt + '</button>');
        }

        var catalogue_manage_btn_txt_alt = $('#catalogue_manage_btn_txt_alt').val();
        $('#catalogue_manage_btn').html(catalogue_manage_btn_txt_alt);
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
    $("#catalogue_actions").on('click', '#catalogue_undo_btn', function (event) {
        event.preventDefault();
        $('#form_catalogues_manage').trigger("reset");
        $("#catalogue_action_id").val("");
        initButtons();
    });

});
