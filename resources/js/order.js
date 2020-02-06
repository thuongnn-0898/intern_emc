$(document).ready(function () {
    $('#form-order').click(function () {
        $('#order-form').submit();
    });

    $('#get-my-profile').click(function () {
        if($('#get-my-profile').is(':checked')){
            const url = $(this).val();
            $.ajax({
               url,
               dataType: 'json',
               type: 'get',
               success: function (res) {
                   const user = res.data;
                   $('#user-name').val(user.name);
                   $('#user-email').val(user.email);
               }
            });
        }
    });
});
