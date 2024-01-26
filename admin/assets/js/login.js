$(document).ready(function(){

    if ($("#preloader")) {
        window.addEventListener("load", () => {
            $("#preloader").remove();
        });
    }

    $("#loginForm").on("submit", function(e){
        e.preventDefault();

        var $inputs = $(this).find("input");
        let action = $(this).attr("action");
        let type = $(this).attr("method");
        let formData = new FormData(this);

        console.log("submitting form");
        $inputs.prop("disabled", true);
        $inputs.val("");

        $.ajax({
            url: action,
            method: type,
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                let res_value = jQuery.parseJSON(res);

                switch(res_value["status"]) {
                    case 0:
                        $(".login_modal").modal("show");
                        $(".message_body").text("Invalid Account!");
                        $inputs.prop("disabled", false);
                        return false;
                        break;
                }

                $(".login_modal").modal("show");
                $(".message_body").text("Successfully Login In");
                $(".primary_btn").click(function(){ window.location.replace("dashboard.php"); })
                $inputs.prop("disabled", false);
            }
        });
    });
});