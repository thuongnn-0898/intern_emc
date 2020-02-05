require('./bootstrap');

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#logout').click(function(){
       $('#logout-form').submit();
    });
});
