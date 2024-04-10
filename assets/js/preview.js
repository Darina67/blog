$(document).ready(function () {
    $('#pct').on('change', function (e) {
        $('#profile__preview').attr('src', URL.createObjectURL(e.target.files[0]))
    })
})