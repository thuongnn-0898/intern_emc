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
        const url = '/add-cart';
        let qty = 1;
        if($('#qty-qty').length){
            qty = $('#qty-qty').val();
        }
        $.ajax({
            url,
            data: {
                id, qty,
            },
            type: 'post',
            success: function (res) {
                $('.cart-list').html(res);
                let totalItem = $('.cart-item').length;
                $('#item-select').html( totalItem+ ' Item(s) selected');
                $('#qty-cart').html(totalItem);
            }
        });
    });

    $(body).on('click', '.delete-cart-item', function () {
        const id = $(this).attr('data-id');
        $.ajax({
            url: 'delete-item-cart/'+id,
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
            url: 'delete-cart',
            dataType: 'json',
            type: 'delete',
            success: function (res) {
                $('.cart-item').remove();
                let totalItem = $('.cart-item').length;
                $('#item-select').html('0 Item(s) selected');
                $('#qty-cart').html(0);
                $('#subtotal').html('$0');
            }
        });
    });
});
