$(document).ready(function () {
    $('#more-img').click(function () {
        var html = $("#clone").html();
        $("#clone").append(html_());
    });

    $('.delete-product').click(function (e) {
        e.preventDefault();
        const id = $(this).attr('data-id');
        const url = $(this).attr('data-url');
        $.ajax({
            url,
            dataType: 'json',
            type: 'delete',
            success: function (res) {
                if(res.success){
                    alert(res.msg);
                }
            }
        }).done(function () {
            $('tr#product-'+id).remove();
        });
    });
});

function html_() {
    return '<div class="custom-file">\n' +
        '<input type="file" class="custom-file-input" name="images[]">\n' +
        '<label class="custom-file-label">Choose file</label>\n' +
        '</div>';
}
