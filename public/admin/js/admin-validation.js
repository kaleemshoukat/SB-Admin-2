$(document).ready(function () {
    //custom validator methods
    $.validator.addMethod("alphabetsAndNumbers", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z0-9]*$/);
    });

    $.validator.addMethod("alphabetsAndSpacesAndNumbers", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z0-9 ]*$/);
    });

    $.validator.addMethod("alphabetsAndSpaces", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ]*$/);
    });

    $.validator.addMethod("alphabetsOnly", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z]*$/);
    });

    jQuery.validator.addMethod("validDate", function (value, element) {
        return this.optional(element) || moment(value, "DD/MM/YYYY").isValid();
    });

    //pakistani mobile number both formats
    $.validator.addMethod("phoneNumber", function (value, element) {
        return this.optional(element) || value == value.match(/^[\+]\d{2}\d{10}$/) || value == value.match(/^[\d]{4}[\d]{7}$/);
    });

    $.validator.addMethod("telePhoneNumber", function (value, element) {
        return this.optional(element) || value == value.match(/^[\+]\d{2}\d{10}$/) || value == value.match(/^[\d]{3}[\d]{8}$/);
    });

    jQuery.validator.addMethod("checkFee", function (value, element, param) {
        $(param + '-error').html('');
        if (Number(value) < Number($(param).val())) {
            return true;
        } else {
            return false;
        }
    });
    //Login
    // Login Validation
    $('#login_form').validate({
        rules: {
            email: "required",
            password: "required",
        },
        messages: {
            email: {
                required: "Please enter email address.",
            },
            password: {
                required: "Please enter password.",
            },
        }
    });

    $("#password_reset_form").validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Password is required.",
                minlength: "Password requires minimum 8 characters.",
                maxlength: "Password can have maximum 15 characters."
            },
            confirm_password: {
                required: "Password confirmation is required.",
                equalTo: "Password confirmation is incorrect."
            }
        }
    });

    $("#forgot_password_form").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            mobile_number: {
                required: "Email is required.",
                email: "Email is invalid.",
            },
        }
    });






});
