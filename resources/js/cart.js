$(document).ready(function () {
    $('#cart').click(function () {
        $('.cart-dropdown').css({
           "opacity": "1",
            "visibility": "visible",
        });
    });

    $('#close-cart').click(function () {
        $('.cart-dropdown').css({
            "opacity": "0",
            "visibility": "invisible",
        });
    });

    $('.add-cart').click(function () {
        const id = $(this).attr('data-id');
        const url = $(this).attr('data-url');
        let qty = 1;
        if($('#qty-qty').val()){
            qty = $('#qty-qty').val();
        }
        if(qty >= 1){
            $.ajax({
                url,
                data: {
                    id, qty,
                },
                type: 'post',
                success: function (res, status, xhr) {
                    var ct = xhr.getResponseHeader("content-type") || "";
                    if (ct.indexOf('html') > -1) {
                        $('.cart-list').html(res);
                        let totalItem = $('.cart-item').length;
                        $('#item-select').html( totalItem+ ' Item(s) selected');
                        $('#qty-cart').html(totalItem);
                        $('.top-right').notify({
                            message: { text: "Product was added to cart" },
                            type: "success",
                        }).show();
                    }
                    if (ct.indexOf('json') > -1) {
                        $('.top-right').notify({
                            message: { text: res.data },
                            type: "warning",
                        }).show();
                    }
                }
            })
        }else{
            $('.top-right').notify({
                message: { text: "Quantity must more than 0" },
                type: "warning",
            }).show();
        }
    });

    $(body).on('click', '.delete-cart-item', function () {
        const id = $(this).attr('data-id');
        $.ajax({
            url: '/delete-item-cart/'+id,
            type: 'delete',
            success: function (res) {
                $('.cart-list').html(res);
                let totalItem = $('.cart-item').length;
                $('#item-select').html( totalItem+ ' Item(s) selected');
                $('#qty-cart').html(totalItem);
            }
        }).fail(function (ers) {
            alert('Please try again!');
        });
    });

    $('#clear-cart').click(function () {
        $.ajax({
            url: '/delete-cart',
            dataType: 'json',
            type: 'delete',
            success: function (res) {
                $('.cart-item').remove();
                let totalItem = $('.cart-item').length;
                $('#item-select').html('0 Item(s) selected');
                $('#qty-cart').html(0);
                $('#subtotal').html('$0');
            }
        }).done(function () {
            $('.top-right').notify({
                message: { text: 'Empty cart' },
                type: "success",
            }).show();
        });
    });
});
