window.addEventListener("load", () => {
    document.getElementById("preloader").remove();
});

document.addEventListener("DOMContentLoaded", function () {
    loadTable();
})

function loadTable() {
    new DataTable('#userData', {
        "dom": 'rtip',
        ajax: {
            url: 'http://localhost/pmc-dev/admin/controller/controller.users.php?mode=getUsers',
            dataSrc: 'userData'
        },
        columns: [
            { "data" : "row" },
            { "data" : "username" },
            { "data" : "password" },
            { "data" : "email" },
            { "data" : "user_type" },
            { "data" : "status" },
            { "data" : "action" }
        ]
    });
}

function addUserModal() {
    $(".user_modal").modal("show");

    document.getElementById("userForm").setAttribute("action", "controller/controller.users.php?mode=addUsers");
    document.getElementById("userForm").setAttribute("method", "post");
    document.querySelector(".modal-title").innerHTML = "<i class='bi bi-person-fill-add'></i> Add New <span style='color: #8ec646;'> User </span>";

}


function updateUserModal(id, username, password, email, userType, status) {
    $(".user_modal").modal("show");

    document.getElementById("userForm").setAttribute("action", "controller/controller.users.php?mode=updateUsers");
    document.getElementById("userForm").setAttribute("method", "post");
    document.querySelector(".modal-title").innerHTML = "<i class='bi bi-person-fill-add' style='color: #;'></i> Update <span style='color: #8ec646;'> User </span>";

    let inputValue = document.getElementById("userForm").getElementsByTagName("input");
    let selectValue = document.getElementById("userForm").getElementsByTagName("select");
    document.getElementById("user_id").value = id;
    let userData = [email, username, password];

    for (let i = 0; i < inputValue.length && i < userData.length; i++) {
        inputValue[i].value = userData[i];
    }
    
    (status == "Enabled") ? selectValue.status.value = 1 : "";
    selectValue.user_type.value = userType;
}


async function submitForm(e) {
    e.preventDefault();

    let messageAlert = document.getElementById("messageAlert");

    let action = document.getElementById("userForm").getAttribute("action");
    let method = document.getElementById("userForm").getAttribute("method");
    let formData = new FormData(document.getElementById("userForm"));

    try {
        const response = await fetch(action , {
            method: method,
            body: formData,
        });
        const result = await response.json();

        if(result.status <= 2) {
            $("#messageAlert").html("<p class='alert_message'>"+ result.message +"<button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
            document.querySelector(".btn-close").onclick = () => {
                $("#messageAlert").fadeOut("slow");
            }
        }

        if(result.status == 0) {
            messageAlert.classList.remove("danger_alert_msg", "success_alert_msg");
            messageAlert.classList.add("warning_alert_msg");
            return;
        }

        if(result.status == 1) {
            messageAlert.classList.remove("danger_alert_msg", "warning_alert_msg");
            messageAlert.classList.add("success_alert_msg");
            if(result.message != "The account was successfully updated") {
                document.getElementById("userForm").reset();
            }
            $('#userData').DataTable().destroy();
            loadTable();
            return;
        }

        if(result.status == 2) {
            messageAlert.classList.remove("warning_alert_msg", "success_alert_msg");
            messageAlert.classList.add("danger_alert_msg");
            return;
        }

    }
    catch(e) {
        console.error(e.message);
    }
}

function deleteUser(id) {
    const apiUrl = "http://localhost/pmc-dev/admin/controller/controller.users.php?mode=deleteUsers&id="+id;

    $(".delete_modal").modal("show");

    document.querySelector(".message_body").innerText = "Are you sure to delete this one?";

    document.querySelector(".proceed_btn").addEventListener("click", async () => {
        try {
            const response = await fetch(apiUrl, {
                    method: 'post',
                }
            );
            const result = await response.json();
            
            if(result.status == 1) {
                $('.delete_modal').modal('hide');
                $('#userData').DataTable().destroy();
                loadTable();
            }

        }   
        catch(e) {
            console.error(e.message);
        }
    });
}

function closeBtn() {
    $(".user_modal").modal("hide");
    let messageAlert = document.getElementById("messageAlert");

    messageAlert.style.display = "none";
    messageAlert.classList.remove("warning_alert_msg", "success_alert_msg", "danger_alert_msg");
    document.getElementById("userForm").reset();
}