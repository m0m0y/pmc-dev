$(document).ready(function(){
    $('#contactForm').on('submit', function(e) {

        e.preventDefault();
        let captcha_ref = $('#captcha_ref').html();
        let fields = $(this).serializeArray();
        let values = {};

        let action = $(this).attr("action");
        let type = $(this).attr("method");
        let formData = new FormData(this);

        $.each(fields, function(i, field) {
            validation(field, captcha_ref);
            values[field.name] = field.value;
        })

        function getValue(valueName) {
            return values[valueName];
        };

        let captcha = getValue('captcha');
        let email = getValue('email');
        let confirm_email = getValue('confirm_email');

        if(email != confirm_email) {
            $('#email-error').html('Email address did not match!').fadeIn();
        } else {
            $('#email-error').fadeOut();

            if(captcha == captcha_ref) {
                $.ajax({
                    url: action,
                    method: type,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(res) {
                        if(res == "Failed to sent") {
                            return false;
                        } else {
                            location.replace("thankyou.php");
                        }
                    }
                });
            }
        }
    })
})

function txtvalidator(el) {
    let input_id = $(el).attr('id');
    let input_value = $('input[id='+input_id+']').val();
    let textarea_value = $('textarea[id='+input_id+']').val();

    if(input_value == "" || textarea_value == "") {
        $('#'+input_id+'-error').html('This field is required!').fadeIn();
    } else {
        $('#'+input_id).css("border-bottom", "1px solid #8ec646");
        $('#'+input_id+'-error').fadeOut();
    }
}


function validation(field, captcha_ref) {
    let error_message_id = "#"+field.name+"-error";

    if(field.name == "name") {
        if(field.value == "") {
            $(error_message_id).html('This field is required!').fadeIn();
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "contact") {
        if(field.value == "") {
            $(error_message_id).html('This field is required!').fadeIn();
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "email") {
        if(field.value == "") {
            $(error_message_id).html('Email address is required!').fadeIn();
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "confirm_email") {
        if(field.value == "") {
            $(error_message_id).html('Email address is required!').fadeIn();
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "subject") {
        if(field.value == "") {
            $(error_message_id).html('Email Subject is required!').fadeIn();
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "message") {
        if(field.value == "") {
            $(error_message_id).html('Please put message').fadeIn();
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "captcha") {
        if(field.value == "") {
            $(error_message_id).html('This Field is required!').fadeIn();
        } else if (field.value !== captcha_ref) {
            $(error_message_id).html('Invalid captcha code!').fadeIn();
        } else {
            $(error_message_id).fadeOut();
        }
    }
}