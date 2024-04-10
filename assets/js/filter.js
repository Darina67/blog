$(document).ready(function () {
    let sublinks = document.querySelectorAll('header .subnav__link');
    let parent = document.querySelector('.post__list');

    $('.subnav__link').on('click', function (e) {
        e.preventDefault()
        $.ajax({
            url: 'vendor/filter.php',
            data: {
                'category': $(this).text()
            },
            type: 'POST',
            // dataType: 'json',
            success: function (data) {
                parent.innerHTML = data
            },
            error: function () {
                alert('error')
            }
        })

        })
    })