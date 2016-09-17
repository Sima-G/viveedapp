jQuery(document).ready(function () {

    $('#category-list-loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');

    productStats();
    productList();

    $("#product_list").on('click', '.product_delete', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');
        swal({
                title: "Είσαστε σίγουρος;",
                text: "Το προϊόν θα διαγραφεί οριστικά!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ναι, προχώρα!",
                cancelButtonText: "Άκυρο",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: '/backend/modules/catering/product/delete',
                    type: "post",
                    data: {
                        'product_id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function getcontent(data) {
                        $('#product_list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        swal("Ενημέρωση", "Το προϊόν διεγράφη!", "success");
                        $('#category-list-loader').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/><br/></div>');
                        productList();
                    }
                });
            });
    });

    function productStats() {
        jQuery.ajax({
            url: "/backend/modules/catering/products/product_stats",
            type: "GET",
            success: function (data) {
                $('#product-stats').html(data);
            }
        });
    }

    function productList() {
        jQuery.ajax({
            url: "/backend/modules/catering/products/product_list",
            type: "GET",
            success: function (data) {
                $('#product_list').html(data);
                $('table.search-table').tableSearch({
                    searchText:'Αναζήτηση: ',
                    searchPlaceHolder: 'Όρος αναζήτησης'
                });
            }
        });
    }

});
