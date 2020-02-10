require('./bootstrap');
$(document).ready(function(){
    $('#change-sidebar').click(function () {
        if($(this).attr('data-type') === 'horizontal'){
            quixSettings.prototype.constructor({'layout':'horizontal'});
            $('#change-sidebar').attr('data-type', 'vertical');
        }else{
            quixSettings.prototype.constructor({'layout':'vertical'});
            $('#change-sidebar').attr('data-type', 'horizontal');
        }
    });
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
