window.addEventListener("load", () => {
    document.getElementById("preloader").remove();
});

document.querySelector("#loginForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    let inputs = document.getElementsByTagName("input");

    let action = document.getElementById("loginForm").getAttribute("action");
    let method = document.getElementById("loginForm").getAttribute("method");
    let formData = new FormData(document.getElementById("loginForm"));
    let modalLoginBtn = document.getElementById("modal_login_btn");

    fieldDisabled(inputs);

    try {
        const response = await fetch(action , {
            method: method,
            body: formData,
        });

        const result = await response.json();

        if (result.status == 0) {
            $(".login_modal").modal("show");
            document.querySelector(".message_body").innerText = result.message;

            modalLoginBtn.onclick = () => {
                fieldEnable(inputs);
            }

            return false;
        }

        $(".login_modal").modal("show");
        document.querySelector(".message_body").innerText = result.message;
        modalLoginBtn.innerText = "Proceed";

        modalLoginBtn.onclick = () => {
            window.location.replace("dashboard.php");
        }
    } 
    catch (e) {
        console.error(e.message);
    }
    
});

function fieldDisabled(inputs) {
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = true;
    }
}

function fieldEnable(inputs) {
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
}