$(document).ready(function () {

    $('#registration-form').validate({
        rules: {
            firstname: {
                minlength: 2,
                required: true
            },
            lastname: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                phoneUS: true,
                minlength: 10,
                maxlength:12,
                required: true
            },
            dob: {
                date:true,
                required: true
            },
            gender: {
                required: true
            },
            username: {
                minlength: 3,
                required: true
            },
            password: {
                minlength: 8,
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('success').addClass('error').css('color', 'red');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.form-group').removeClass('error').addClass('success').css('color', 'green');
        }
    });

    $('#process-login').validate({
        rules:{
            username: {
                minlength: 3,
                required: true
            },
            password: {
                minlength: 8,
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('success').addClass('error').css('color', 'red');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.form-group').removeClass('error').addClass('success').css('color', 'green');
        }
    });

});