$(document).ready(function () {
    $('#preloader').css('display', 'block');
    $('body').on('click', '.handle-order', function (e) {
        e.preventDefault();
        const type = $(this).attr('data-type');
        const id = $(this).attr('data-id');
        const url = $(this).attr('data-url');
        let method = $(this).attr('data-method');
        if(!method)
            method = 'put'
        $.ajax({
           url,
           type: method,
           data: { type, id },
           success: function (res) {
               if(method === 'delete'){
                   $('#order-item-'+id).remove();
               }else{
                   $('#order-item-'+id).replaceWith(res);
               }
               toastr.success('Handle successfully');
           }
        }).fail(function () {
            toastr.error('Has a error, try later!');
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
