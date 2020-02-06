require('./bootstrap');

$(document).ready(function(){

    setTimeout(function () {
        $('.alert').slideUp();
    }, 3000);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#logout').click(function(){
       $('#logout-form').submit();
    });
});
