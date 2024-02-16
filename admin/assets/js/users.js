let preload = document.querySelector("#preloader");
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
    $(".add_modal").modal("show");

    document.getElementById("modal_add_close_btn").onclick = () => {
        let addModalMessageAlert = document.getElementById("modal_add_alert_msg");

        addModalMessageAlert.style.display = "none";
        addModalMessageAlert.classList.className = '';

        document.getElementById("addUserForm").reset();
    };

    document.querySelector("#addUserForm").addEventListener("submit", async (e) => {
        e.preventDefault();

        let addModalMessageAlert = document.getElementById("modal_add_alert_msg");

        let action = document.getElementById("addUserForm").getAttribute("action");
        let method = document.getElementById("addUserForm").getAttribute("method");
        let formData = new FormData(document.getElementById("addUserForm"));
        
        try {
            const response = await fetch(action , {
                method: method,
                body: formData,
            });
            const result = await response.json();

            if(result.status <= 2) {
                $("#modal_add_alert_msg").html("<p class='alert_message'>"+ result.message +"<button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                document.querySelector(".btn-close").onclick = () => {
                    $("#modal_add_alert_msg").fadeOut("slow");
                }       
            }

            if(result.status == 0) {
                addModalMessageAlert.classList.remove("danger_alert_msg", "success_alert_msg");
                addModalMessageAlert.classList.add("warning_alert_msg");
                return;
            }

            if(result.status == 1) {
                addModalMessageAlert.classList.remove("danger_alert_msg", "warning_alert_msg");
                addModalMessageAlert.classList.add("success_alert_msg");

                document.getElementById("addUserForm").reset();
                $('#userData').DataTable().destroy();
                loadTable();
                return;
            }

            if(result.status == 2) {
                addModalMessageAlert.classList.remove("warning_alert_msg", "success_alert_msg");
                addModalMessageAlert.classList.add("danger_alert_msg");
                return;
            }

        }
        catch(e) {
            console.error(e.message);
        }
    });

}

function updateUserModal(id, username, password, email, userType, status) {
    $(".update_modal").modal("show");

    document.getElementById("modal_update_close_btn").onclick = () => {
        let updateModalMessageAlert = document.getElementById("modal_update_alert_msg");

        updateModalMessageAlert.style.display = "none";
        updateModalMessageAlert.classList.className = '';
    };


    let inputValue = document.getElementById("updateUserForm").getElementsByTagName("input");
    let selectValue = document.getElementById("updateUserForm").getElementsByTagName("select");
    let userData = [id, email, username, password];

    for (let i = 0; i < inputValue.length && i < userData.length; i++) {
        inputValue[i].value = userData[i];
    }
    
    (status == "Enabled") ? selectValue.status.value = 1 : "";
    selectValue.user_type.value = userType;

    document.querySelector("#updateUserForm").addEventListener("submit", async (e) => {
        e.preventDefault();

        let updateModalMessageAlert = document.getElementById("modal_update_alert_msg");

        let action = document.getElementById("updateUserForm").getAttribute("action");
        let method = document.getElementById("updateUserForm").getAttribute("method");
        let formData = new FormData(document.getElementById("updateUserForm"));

        try {
            const response = await fetch(action , {
                method: method,
                body: formData,
            });
            const result = await response.json();

            if(result.status <= 1) {
                $("#modal_update_alert_msg").html("<p class='alert_message'>"+ result.message +"<button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                document.querySelector(".btn-close").onclick = () => { 
                    $("#modal_update_alert_msg").fadeOut("slow");
                }
            }

            if(result.status == 0) {
                updateModalMessageAlert.classList.remove("warning_alert_msg", "success_alert_msg");
                updateModalMessageAlert.classList.add("danger_alert_msg");
                return;
            }

            if(result.status == 1) {
                updateModalMessageAlert.classList.remove("danger_alert_msg", "warning_alert_msg");
                updateModalMessageAlert.classList.add("success_alert_msg");

                $('#userData').DataTable().destroy();
                loadTable();
                return;
            }
        }
        catch(e) {
            console.error(e.message);
        }
    });
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
