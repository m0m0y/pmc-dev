$(document).ready(function() {
    if ($("#preloader")) {
        window.addEventListener("load", () => {
            $("#preloader").remove();
        });
    }

    $("#alert_msg").css("display", "none");

    $("#resetPassForm").on("submit", function(e) {
        e.preventDefault();

        let $inputs = $(this).find("input");
        let action = $(this).attr("action");
        let type = $(this).attr("method");
        let formData = new FormData(this);

        if ($("input[name='f_username']").val() == "" || $("input[name='f_email']").val() == "") {
            $(".forgot_modal").modal("show");
            $(".message_body").text("Please double check the field!");
            return false;
        } else if ($("input[name='u_username']").val() == "" || $("input[name='u_password']").val() == "" || $("input[name='u_confirm_password']") == "") {
            $("#alert_msg").removeClass("success_alert_msg").removeClass("warning_alert_msg").addClass("danger_alert_msg");
            $(".danger_alert_msg").html("<p class='alert_message'>Please double check the field! <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            $(".btn-close").click(function() {
                $(".danger_alert_msg").fadeOut("slow");
            });
            return false;
        }

        if($("input[name='u_password']").val() != $("input[name='u_confirm_password']").val()) {
            $("#alert_msg").removeClass("success_alert_msg").removeClass("warning_alert_msg").addClass("danger_alert_msg");
            $(".danger_alert_msg").html("<p class='alert_message'>Password did not match <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            $(".btn-close").click(function() {
                $(".danger_alert_msg").fadeOut("slow");
            });
            return false;
        }

        $.ajax({
            url: action,
            method: type,
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                let res_value = jQuery.parseJSON(res);

                switch (res_value["status"]) {
                    case 0:
                        $(".forgot_modal").modal("show");
                        $(".message_body").text("Email did not sent, something went wrong!");
                        break;
                    case 1: 
                        $(".forgot_modal").modal("show");
                        $(".message_body").text("Please check your email!");
                        $inputs.val("");
                        break;
                    case 2:
                        $(".forgot_modal").modal("show");
                        $(".message_body").text("Invalid Account!");
                        break;
                    case 3:
                        $("#alert_msg").removeClass("danger_alert_msg").removeClass("warning_alert_msg").addClass("success_alert_msg");
                        $(".success_alert_msg").html("<p class='alert_message'>Updated successfully <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                        
                        setTimeout(function() { window.location.href="login.php"; }, 2500);
                        $inputs.val("");
                        break;
                    case 4:
                        $("#alert_msg").removeClass("danger_alert_msg").removeClass("success_alert_msg").addClass("warning_alert_msg");
                        $(".warning_alert_msg").html("<p class='alert_message'>Invalid Account! <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                        break;
                    default:
                        alert("Something wrong!");
                }
                
            }
        });
    });
});