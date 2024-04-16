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
    #branchForm .branch_modal .modal-content {
        border-radius: 0px !important;
    }

    #branchForm .branch_modal .modal-body {
        padding: 0;
        border-radius: 0;
    }

    #branchForm .branch_modal .primary_btn {
        padding: 8px 2%;
        border: 0;
        background-color: #11155d;
        color: white;
        transition: 0.4s;
    }

    #branchForm .branch_modal .primary_btn:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    #branchForm .branch_modal .secondary_btn {
        padding: 7px 2%;
        border: 1px solid #8ec646;
        border-color: #8ec646;
        background-color: transparent;
        color: #7cba2c;
        transition: 0.4s;
    }

    #branchForm .branch_modal .secondary_btn:hover {
        background-color: #8ec646;
        color: white;
    }

    #branchForm .branch_modal .modal-header,
    #branchForm .branch_modal .modal-footer {
        border-bottom: none;
        border-top: none;
        padding-left: 5%;
        padding-right: 5%;
        padding-top: 0;
        padding-bottom: 35px;
    }

    #branchForm .branch_modal .modal-header {
        padding-top: 35px;
        padding-bottom: 10px;
    }

    #branchForm .branch_modal .modal-header .modal-title {
        font-weight: 600;
        color: #11155d;
    }

    #branchForm .branch_modal .btn-close {
        box-shadow: none;
    }

    #branchForm .branch_modal .modal-body {
        padding: 0;
    }

    #branchForm .branch_container {
        padding: 25px 5%;
    }

    #branchForm .branch_container .form-control,
    #branchForm .branch_container .form-select {
        border-radius: 0px;
        border: 0;
        border-bottom: 1px solid #dee2e6;
        transition: 0.3s;
    }

    #branchForm .branch_container .form-control:focus {
        box-shadow: none;
        border-color: #8ec646;
    }

    #branchForm .branch_container .form-select:focus {
        box-shadow: none;
    }

    #branchForm .branch_container .note {
        font-size: 13px;
        color: #919191;
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
                <button type="button" class="primary_btn" onclick="addBranchModal()"><i class="bi bi-plus-circle-fill"></i> Add New Branch</button>
            </div>

            <table class="table table-bordered" id="branchData" style="width:100%">
                <thead>
                    <tr>
                        <th>Branch</th>
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

        <form action="" method="" id="branchForm" onsubmit="submitForm(event)">
            <div class="modal fade branch_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5"></h1>
                        </div>

                        <div class="modal-body">
                            <div class="branch_container">

                                <div class="mb-3" id="messageAlert"></div>
                                <p class="note"><em>- Follow the indicated number format.</em></p>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Branch:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="branch_name" class="form-control" placeholder="Branch Name">
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
                                        <input type="text" name="branch_tel" class="form-control" placeholder="+63 (0) 0000 0000">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Mobile No:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="branch_mob" class="form-control" placeholder="+63 (000) 0000000">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Fax No: </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="branch_fax" class="form-control" placeholder="+63 (0) 0000 0000">
                                    </div>
                                </div>

                                <div class="mt-4 row">
                                    <label class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="branch_email" class="form-control" placeholder="Branch Email">
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
                            <input type="hidden" name="branch_id" id="branch_id" readonly>
                            <button type="button" class="secondary_btn" id="branchModalCls" onclick="closeBtn()">Close</button>
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
                    { "data" : "branch_tel" },
                    { "data" : "branch_mob" },
                    { "data" : "branch_fax" },
                    { "data" : "branch_email" },
                    { "data" : "branch_status" },
                    { "data" : "action" }
                ]
            });
        }

        function addBranchModal() {
            $(".branch_modal").modal("show");
            
            document.getElementById("branchForm").setAttribute("action", "controller/controller.branch.php?mode=addBranch");
            document.getElementById("branchForm").setAttribute("method", "post");
            document.querySelector(".modal-title").innerHTML = "<i class='bi bi-pencil-square'></i> Add New <span style='color: #8ec646;'> Branch </span>";
        }

        function updateBranchModal(branch_id, branch_name, branch_address, branch_tel, branch_mob, branch_fax, branch_email, branch_status) {
            $(".branch_modal").modal("show");

            document.getElementById("branchForm").setAttribute("action", "controller/controller.branch.php?mode=updateBranch");
            document.getElementById("branchForm").setAttribute("method", "post");
            document.querySelector(".modal-title").innerHTML = "<i class='bi bi-pencil-square'></i> <span style='color: #8ec646;'>"+ branch_name +"</span> Branch";

            let inputValue = document.getElementById("branchForm").getElementsByTagName("input");
            let selectValue = document.getElementById("branchForm").getElementsByTagName("select");
            let branchData = [branch_name, branch_address, branch_tel, branch_mob, branch_fax, branch_email];

            for (let i = 0; i < inputValue.length && i < branchData.length; i++) {
                inputValue[i].value = branchData[i];
            }

            (branch_status == "Enabled") ? selectValue.branch_status.value = 1 : "";
            document.getElementById("branch_id").value = branch_id;
        }

        async function submitForm(e) {
            e.preventDefault();

            let messageAlert = document.getElementById("messageAlert");

            let action = document.getElementById("branchForm").getAttribute("action");
            let method = document.getElementById("branchForm").getAttribute("method");
            let formData = new FormData(document.getElementById("branchForm"));

            try {
                const response = await fetch(action , {
                    method: method,
                    body: formData,
                });
                const result = await response.json();

                if(result.status <= 1) {
                    console.log(result.message);
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

                    if(result.message != "Update successfully") {
                        document.getElementById("branchForm").reset();
                        return;
                    }

                    $('#branchData').DataTable().destroy();
                    loadTable();
                    return;
                }
            }
            catch(e) {
                console.error(e.message);
            }
            
        }


        function deleteBranch(branch_id) {
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

        function closeBtn() {
            $(".branch_modal").modal("hide");
            let messageAlert = document.getElementById("messageAlert");

            messageAlert.style.display = "none";
            messageAlert.classList.remove("warning_alert_msg", "success_alert_msg", "danger_alert_msg");
            document.getElementById("branchForm").reset();
        }
    </script>

</body>

</html>