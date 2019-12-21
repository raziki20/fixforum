$(document).ready(function() {
    $('#button-password').click(function () {
        if($(this).is(':checked')) {
            $('.password-register').attr('type', 'text');
        } else {
            $('.password-register').attr('type', 'password');
        }

    });
});

