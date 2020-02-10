$(document).ready(function () {
    $('body').on('click', '.handle-order', function () {
        const type = $(this).attr('data-type');
        const id = $(this).attr('data-id');
        const url = $(this).attr('data-url');
        $.ajax({
           url,
           type: 'put',
           data: { type, id },
           success: function (res) {
               $('#order-item-'+id).replaceWith(res);
           }
        });
    });

    $('body').on('click', '.order-detail', function () {
        const id = $(this).attr('data-id');
        const url = $(this).attr('data-url');
        $.ajax({
            url,
            type: 'get',
            success: function (res) {
                $('#order-detail-'+id).html(res);
            }
        });
    });

    const url = window.location.href;
    if(url.includes('page')){
        $('html,body').animate({
            scrollTop: $("#order-here").offset().top
        }, 'slow');
    };

});
