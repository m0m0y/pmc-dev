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

        if(result.status <= 3) {
            $(".forgot_modal").modal("show");
            document.querySelector(".message_body").innerText = result.message;
            return
        }

        if (result.status >= 4 && result.status <= 6) {
            messageAlert.style.display = "block";
            $("#alert_msg").html("<p class='alert_message'>"+ result.message +"<button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            document.querySelector(".btn-close").onclick = () => {
                $("#alert_msg").fadeOut("slow");
            }
           
            if(result.status == 4) {
                messageAlert.classList.remove("danger_alert_msg", "success_alert_msg");
                messageAlert.classList.add("warning_alert_msg");
                return;
            }

            if(result.status == 5) {
                messageAlert.classList.remove("warning_alert_msg", "danger_alert_msg");
                messageAlert.classList.add("success_alert_msg");
                return;
            }

            if(result.status == 6) {
                messageAlert.classList.remove("danger_alert_msg", "success_alert_msg");
                messageAlert.classList.add("warning_alert_msg");
                return;
            }

        } 

    } 
    catch (e) {
        console.error(e.message);
    }
});