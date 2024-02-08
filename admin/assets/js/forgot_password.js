let preload = document.querySelector("#preloader");
window.addEventListener("load", () => {
    document.getElementById("preloader").remove();
});

document.querySelector("#resetPassForm").addEventListener("submit", async (e) => {
    e.preventDefault();
   
    let messageAlert = document.getElementById("alert_msg");
   
    let action = document.getElementById("resetPassForm").getAttribute("action");
    let method = document.getElementById("resetPassForm").getAttribute("method");
    let formData = new FormData(document.getElementById("resetPassForm"));
    let modalFogotBtn = document.getElementById("fogot_modal_btn");

    try {
        const response = await fetch(action , {
            method: method,
            body: formData,
        });

        const result = await response.json();

        if (result.status == 0) {

            $(".forgot_modal").modal("show");
            document.querySelector(".message_body").innerText = "Something went wrong!";
            return false;

        } else if(result.status == 3) {

            $(".forgot_modal").modal("show");
            document.querySelector(".message_body").innerText = "You submit empty field, please check the field before submitting";
            return false;

        } else if(result.status == 2) {

            $(".forgot_modal").modal("show");
            document.querySelector(".message_body").innerText = "Invalid Account!";
            return false;

        } else if(result.status == 4) {

            messageAlert.style.display = "block";
            messageAlert.classList.remove("warning_alert_msg", "success_alert_msg");
            messageAlert.classList.add("danger_alert_msg");
            $("#alert_msg").html("<p class='alert_message'>Invalid Account! <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            document.querySelector(".btn-close").onclick = () => {
                $("#alert_msg").fadeOut("slow");
            }
            return false;
             
        } else if(result.status == 5) {

            messageAlert.style.display = "block";
            messageAlert.classList.remove("warning_alert_msg", "danger_alert_msg");
            messageAlert.classList.add("success_alert_msg");
            $("#alert_msg").html("<p class='alert_message'>Your password is already update! <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            document.querySelector(".btn-close").onclick = () => {
                $("#alert_msg").fadeOut("slow");
            }
            return false;

        } else if(result.status == 6) {

            messageAlert.style.display = "block";
            messageAlert.classList.remove("danger_alert_msg", "success_alert_msg");
            messageAlert.classList.add("warning_alert_msg");
            $("#alert_msg").html("<p class='alert_message'>Please double check the field! <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            document.querySelector(".btn-close").onclick = () => {
                $("#alert_msg").fadeOut("slow");
            }
            return false;

        } else if(result.status == 7) {

            messageAlert.style.display = "block";
            messageAlert.classList.remove("danger_alert_msg", "success_alert_msg");
            messageAlert.classList.add("warning_alert_msg");
            $("#alert_msg").html("<p class='alert_message'>Password did not match <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            document.querySelector(".btn-close").onclick = () => {
                $("#alert_msg").fadeOut("slow");
            }
            return false;

        }


        $(".forgot_modal").modal("show");
        document.querySelector(".message_body").innerText = "We have sent you a link to your email";
        return false;

    } 
    catch (e) {
        console.error(e.message);
    }
});