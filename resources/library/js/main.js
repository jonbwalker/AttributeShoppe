$(document).ready(function () {

    $('#registration-form').validate({
        rules: {
            firstName: {
                minlength: 2,
                required: true
            },
            lastName: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                digits: true,
                minlength: 2,
                required: true
            },
            message: {
                minlength: 2,
                required: true
            },
            message: {
                minlength: 2,
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.form-group').removeClass('error').addClass('success');
        }
    });

});