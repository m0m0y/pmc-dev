<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, true, "login.php");
$pageTitle = "PMC Dashboard - Branches";

include "components/header.php";
?>
<style>
    #branchFrom .branch_modal .modal-content {
        border-radius: 0px !important;
    }

    #branchFrom .branch_modal .modal-body {
        padding: 0;
        border-radius: 0;
    }

    #branchFrom .branch_modal .primary_btn {
        padding: 8px 2%;
        border: 0;
        background-color: #11155d;
        color: white;
        transition: 0.4s;
    }

    #branchFrom .branch_modal .primary_btn:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    #branchFrom .branch_modal .secondary_btn {
        padding: 7px 2%;
        border: 1px solid #8ec646;
        border-color: #8ec646;
        background-color: transparent;
        color: #7cba2c;
        transition: 0.4s;
    }

    #branchFrom .branch_modal .secondary_btn:hover {
        background-color: #8ec646;
        color: white;
    }

    #branchFrom .branch_modal .modal-header,
    #branchFrom .branch_modal .modal-footer {
        border-bottom: none;
        border-top: none;
        padding-left: 5%;
        padding-right: 5%;
        padding-top: 0;
        padding-bottom: 35px;
    }

    #branchFrom .branch_modal .modal-header {
        padding-top: 35px;
        padding-bottom: 10px;
    }

    #branchFrom .branch_modal .modal-header .modal-title {
        font-weight: 600;
        color: #11155d;
    }

    #branchFrom .branch_modal .btn-close {
        box-shadow: none;
    }

    #branchFrom .branch_modal .modal-body {
        padding: 0;
    }

    #branchFrom .branch_container {
        padding: 25px 5%;
    }

    #branchFrom .branch_container .form-control,
    #branchFrom .branch_container .form-select {
        border-radius: 0px;
        border: 0;
        border-bottom: 1px solid #dee2e6;
        transition: 0.3s;
    }

    #branchFrom .branch_container .form-control:focus {
        box-shadow: none;
        border-color: #8ec646;
    }

    #branchFrom .branch_container .form-select:focus {
        box-shadow: none;
    }
</style>

<body>
    <?php include "components/sidenav.php"; ?>

    <main>

        <div class="breadcrumbs">
            <div class="d-flex px-3">
                <div class="me-auto"><h3>Our Branches</h3></div>

                <div class="align-self-center">
                    <a href="#" class=""> <i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>

        <div class="table_container">

            <div class="mb-3 d-flex align-items-center">
                <h4 class="table_title">Existing Branches</h4>
                <button type="button" class="primary_btn" onclick="addBrancModal()"><i class="bi bi-plus-circle-fill"></i> Add New Branch</button>
            </div>

            <table class="table table-bordered" id="branchData" style="width:100%">
                <thead>
                    <tr>
                        <th>Branch</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Mobile</th>
                        <th>Fax</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody></tbody>
            </table>

        </div>

        <form action="" method="" id="branchFrom">
            <div class="modal fade branch_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <!-- <h1 class="modal-title fs-5"><i class="bi bi-person-fill-add"></i> Add New <span style="color: #8ec646;"> User </span> </h1> -->
                            <h1 class="modal-title fs-5"></h1>
                        </div>

                        <div class="modal-body">
                            <div class="branch_container">

                                <div class="mb-3" id="messageAlert"></div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Branch:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="branch_name" class="form-control" placeholder="Location Name">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Location:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="branch_address" class="form-control" placeholder="Complete Address">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Telephone:</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="branch_tel" class="form-control" placeholder="+63 (0) 0000 0000">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Mobile No:</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="branch_mob" class="form-control" placeholder="+63 (000) 0000000">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Fax No:</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="branch_fax" class="form-control" placeholder="+63 (0) 0000 0000">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="branch_email" class="form-control" placeholder="Complete email of the branch">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Status:</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="branch_status">
                                            <option value="0">Disabled</option>
                                            <option value="1">Enabled</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="secondary_btn" id="branchModalCls" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="primary_btn"><i class="bi bi-floppy-fill me-1"></i> Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>


        <div class="modal fade delete_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <p class="message_body"></p>
                        </center>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="danger_btn me-1" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="primary_btn proceed_btn">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include "components/logout_modal.php";  ?>
    <?php include "components/footer.php";  ?>

    <script>
        window.addEventListener("load", () => {
            document.getElementById("preloader").remove();
        });

        document.addEventListener("DOMContentLoaded", function () {
            loadTable();
        })

        function loadTable() {
            new DataTable('#branchData', {
                "dom": 'rtip',
                ajax: {
                    url: 'http://localhost/pmc-dev/admin/controller/controller.branch.php?mode=getBranches',
                    dataSrc: 'branchData'
                },
                columns: [
                    { "data" : "branch_name" },
                    { "data" : "branch_address" },
                    { "data" : "branch_tel" },
                    { "data" : "branch_mob" },
                    { "data" : "branch_fax" },
                    { "data" : "branch_email" },
                    { "data" : "branch_status" },
                    { "data" : "action" }
                ]
            });
        }

        function addBrancModal() {
            $(".branch_modal").modal("show");

            document.getElementById("branchFrom").setAttribute("action", "controller/controller.branch.php?mode=addBranch");
            document.getElementById("branchFrom").setAttribute("method", "post");
            document.querySelector(".modal-title").innerHTML = "<i class='bi bi-pencil-square'></i> Add New <span style='color: #8ec646;'> Branch </span>";

            document.querySelector("#branchFrom").addEventListener("submit", async (e) => {
                e.preventDefault();

                let messageAlert = document.getElementById("messageAlert");

                let action = document.getElementById("branchFrom").getAttribute("action");
                let method = document.getElementById("branchFrom").getAttribute("method");
                let formData = new FormData(document.getElementById("branchFrom"));
                
                try {
                    const response = await fetch(action , {
                        method: method,
                        body: formData,
                    });
                    const result = await response.json();

                    if(result.status <= 1) {
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

                        document.getElementById("branchFrom").reset();
                        $('#branchData').DataTable().destroy();
                        loadTable();
                        return;
                    }
                }
                catch(e) {
                    console.error(e.message);
                }
            });

            document.querySelector("#branchModalCls").addEventListener("click", () => {
                document.getElementById("messageAlert").style.display = "none";
                document.getElementById("messageAlert").classList.remove("warning_alert_msg", "success_alert_msg", "danger_alert_msg");
                document.getElementById("branchFrom").reset();
            });
        }

        function deleteUser(branch_id) {
            const apiUrl = "http://localhost/pmc-dev/admin/controller/controller.branch.php?mode=deleteBranch&branch_id="+branch_id;

            $(".delete_modal").modal("show");

            document.querySelector(".message_body").innerText = "Are you sure to delete this item?";
            document.querySelector(".proceed_btn").addEventListener("click", async () => {
                try {
                    const response = await fetch(apiUrl, {
                            method: 'post',
                        }
                    );
                    const result = await response.json();
                    
                    if(result.status == 1) {
                        $('.delete_modal').modal('hide');
                        $('#branchData').DataTable().destroy();
                        loadTable();
                    }

                }
                catch(e) {
                    console.error(e.message);
                }
            });
        }
    </script>

</body>

</html>