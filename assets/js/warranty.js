$(document).ready(function(){
    $("#warrant_form").on("submit", function(e){

        e.preventDefault();
        let captcha_ref = $("#captcha_ref").html();
        let fields = $(this).serializeArray();
        let values = {};

        var $inputs = $(this).find("input, select");
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

        let captcha = getValue("captcha");
        let email = getValue("email");
        let confirm_email = getValue("confirm_email");

        if(email != confirm_email) {
            $("#email-error").html("Email address did not match!").fadeIn();
        } else {
            if(captcha == captcha_ref) { 

                $inputs.prop("disabled", true);

                $.ajax({
                    url: action,
                    method: type,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(res) {
                        let res_value = jQuery.parseJSON(res);

                        if(res_value["status"] == 1) {
                            location.replace("thankyou.php");
                        }

                        console.log(res_value["status"]);
                        $inputs.prop("disabled", false);
                    }
                });
            }
        }
    })
})

function txtvalidator(el) {
    let input_id = $(el).attr("id");
    let input_value = $("input[id="+input_id+"]").val();

    if(input_value == "") {
        $("#"+input_id).css("border-bottom", "1px solid red");
        $("#"+input_id+"-error").html("This field is required!").fadeIn();
    } else {
        $("#"+input_id).css("border-bottom", "1px solid #8ec646");
        $("#"+input_id+"-error").fadeOut();
    }
}

function validation(field, captcha_ref) {

    let error_message_id = "#"+field.name+"-error";
    let input_id = "#"+field.name;

    if(field.name == "name") {
        if(field.value == "") {
            $(error_message_id).html("This field is required!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "contact") {
        if(field.value == "") {
            $(error_message_id).html("This field is required!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "email") {
        if(field.value == "") {
            $(error_message_id).html("Email address is required!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "confirm_email") {
        if(field.value == "") {
            $(error_message_id).html("Email address is required!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "address") {
        if(field.value == "") {
            $(error_message_id).html("Please input your complete address");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "product_item") {
        if(field.value == "") {
            $(error_message_id).html("Select at least one to proceed!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "purchase_from") {
        if(field.value == "") {
            $(error_message_id).html("This Field is required!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "item_price") {
        if(field.value == "") {
            $(error_message_id).html("Input the amout of the item in peso here!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "purchase_date") {
        if(field.value == "") {
            $(error_message_id).html("Select date here!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }

    if(field.name == "serial") {
        if(field.value == "") {
            $(error_message_id).html("This Field is required!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }


    if(field.name == "captcha") {
        if(field.value == "") {
            $(error_message_id).html("This Field is required!");
            $(input_id).css("border-bottom", "1px solid red");
        } else if (field.value !== captcha_ref) {
            $(error_message_id).html("Invalid captcha code!");
            $(input_id).css("border-bottom", "1px solid red");
        } else {
            $(error_message_id).fadeOut();
        }
    }
}