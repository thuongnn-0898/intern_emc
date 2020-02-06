$(document).ready(function () {
    $('#form-order').click(function () {
        $('#order-form').submit();
    });

    $('#get-my-profile').click(function () {
        if($('#get-my-profile').is(':checked')){
            const url = $(this).val();
            console.log(url);
            $.ajax({
               url,
               dataType: 'json',
               type: 'get',
               success: function (res) {
                   const user = res.data;

               }
            });
        }
    });
});
