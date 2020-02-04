$(document).ready(function () {
    $('#more-img').click(function () {
        var html = $("#clone").html();
        $("#clone").append(html_());
    });
});

function html_() {
    return '<div class="custom-file">\n' +
        '<input type="file" class="custom-file-input" name="images[]">\n' +
        '<label class="custom-file-label">Choose file</label>\n' +
        '</div>';
}
