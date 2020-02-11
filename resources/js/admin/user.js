$(document).ready(function () {
    $('#user-btn').click(function(){
        $('#form-user').submit();
    });

    $('.delete-user').click(function () {
        const url = $(this).attr('data-url');
        const id = $(this).attr('data-id');
        if(confirm('You wan\'t delete this?')){
            $.ajax({
                url,
                dataType: 'json',
                type: 'DELETE',
                success: function (res) {
                    if(res.status){
                        alert(res.msg);
                        $('#user-'+id).remove();
                    }else{
                        alert(res.msg);
                    }
                }
            });
        }
    });

    $('body').on('click', '.status-user', function () {
        let $this = $(this);
        console.log($this);
        const id = $this.attr('id');
        const _status = $this.attr('data-status');
        if(confirm('Do you want continue?')){
            $.ajax({
                url: '/admin/user/active/'+id+'/'+_status,
                dateType: 'json',
                type: 'patch',
                success: function (res) {
                    if(res){
                        if(_status == 0){
                            $this.attr('data-status', 1).addClass('btn-danger').removeClass('btn-success');
                        }else{
                            $this.attr('data-status', 0).addClass('btn-success').removeClass('btn-danger');
                        }
                    }
                }
            });
        }
    });
});
