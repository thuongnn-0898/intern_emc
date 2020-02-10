$(document).ready(function(){
    $('.del-cate').click(function(){
        if(confirm('Are you sure?')){
            $(this).next().submit();
        }
    });
});
