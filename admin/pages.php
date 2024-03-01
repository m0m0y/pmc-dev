<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, true, "login.php");
$pageTitle = "PMC Dashboard - Pages";
include "components/header.php";
?>
<style>
    .table_container {
        background: white;
        position: absolute;
        left: 27%;
        top: 15%;
        width: 55%;
    }

    .table_container .table_title {
        font-weight: 800;
        margin: 0;
        display: inline-block;
        margin-right: auto;
    }

    .table_container .primary_btn {
        padding: 8px 2%;
        border: 0;
        background-color: #11155d;
        color: white;
        transition: 0.4s;
    }

    .table_container .primary_btn:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .addpages_modal .modal-content{
        border-radius: 0px;
    }

    .addpages_modal .modal-header {
       display: block;
    }

    .addpages_modal .modal-body {
       padding: 30px 5%;
    }

    .addpages_modal .primary_btn {
        padding: 8px 4%;
        border: 0;
        background-color: #11155d;
        color: white;
        transition: 0.4s;
    }

    .addpages_modal .primary_btn:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .addpages_modal .danger_btn {
        padding: 8px 3%;
        border: 1px solid #dc3545;
        border-color: #dc3545;
        background-color: transparent;
        color: #dc3545;
        transition: 0.4s;
    }

    .addpages_modal .danger_btn:hover {
        background-color: #dc3545;
        color: white;
    }

    .addpages_modal form .form-control {
        border-radius: 0px;
        border: 0;
        border-bottom: 1px solid #dee2e6;
        padding-top: 0px;
    }

    .addpages_modal form .form-control:focus {
        box-shadow: none;
        border-color: #8ec646;
    }

    .addpages_modal form .form-select {
        border-radius: 0px;
        border: 0;
        border-bottom: 1px solid #dee2e6;
        transition: 0.3s;
    }

    .addpages_modal form .form-select:focus {
        box-shadow: none;
    }

    .addpages_modal form #basic-addon3 {
        border-radius: 0;
        border: 0;
    }

    .addpages_modal form .invalid-message {
        color: red;
        font-size: 13px;
        opacity: 0.90;
        margin: 0;
    }
</style>

<body>
    <?php include "components/sidenav.php"; ?>

    <main>
        <div class="breadcrumbs">
            <div class="d-flex px-3">
                <div class="me-auto"><h3>Pages</h3></div>

                <div class="align-self-center">
                    <a href="#"> <i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>
        
        <div class="table_container">

            <div class="mb-3 d-flex align-items-center">
                <h4 class="table_title">List of page's</h4>
                <button type="button" class="primary_btn" onclick="triggerAddPageModal()"><i class="bi bi-plus-circle-fill"></i> Add page</button>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
        <div class="modal fade addpages_modal" id="staticBackdrop" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <center><h5 class="modal-title">Add new page's</h5></center>
                    </div>
                    <div class="modal-body">

                        <form action="" method="post" id="addPagesForm">

                            <div class="mb-3">
                                <label class="form-label">Page Name:</label>
                                <input type="text" class="form-control" placeholder="Page title">
                                <p class="invalid-message" id="p_name_err"></p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Page Link:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                                    <p class="invalid-message" id="p_link_err"></p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status:</label>
                                <select class="form-select" name="status">
                                    <option value="0">Disabled</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="danger_btn me-1" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" class="primary_btn"><i class="bi bi-floppy-fill"></i></button>
                            </div>

                        </form>

                
                    </div>
                </div>
            </div>
        </div>
        
    </main>


    <?php include "components/logout_modal.php"; ?>
    
<script>
    if ($("#preloader")) {
        window.addEventListener("load", () => {
            $("#preloader").remove();
        });
    }

    function triggerAddPageModal() {
        $(".addpages_modal").modal("show");
    }

    // let addPagesForm = document.getElementById("addPagesForm");

    // addPagesForm.addEventListener("submit", (e) => {
    //     e.preventDefault();

    //     let 
    // });


    // document.addEventListener('DOMContentLoaded', function () {
    //     initiateTable();
    // });

    // async function initiateTable() {
    //     const jsonFileData = await fetch("https://jsonplaceholder.typicode.com/posts");
    //     const jsonBody = await jsonFileData.json();

    //     const convertedObject = convertObject(jsonBody);

    //     const dataTable = new simpleDatatables.DataTable("#table", {
    //         data: convertedObject,
    //         searchable: true,
    //         fixedHeight: true,
    //     });
        
    //     // dataTable.columns().remove([0, 2, 3, 6]);
    // }

    // function convertObject(dataObject) {
    //     if (dataObject.length === 0) return {
    //         headings: [],
    //         data: []
    //     };

    //     let obj = {
    //         // Quickly get the headings
    //         headings: Object.keys(dataObject[0]),

    //         // data array
    //         data: []
    //     };

    //     const len = dataObject.length;
    //     // Loop over the objects to get the values
    //     for (let i = 0; i < len; i++) {
    //         obj.data[i] = [];

    //         for (let p in dataObject[i]) {
    //             if (dataObject[i].hasOwnProperty(p)) {
    //                 obj.data[i].push(dataObject[i][p]);
    //             }
    //         }
    //     }

    //     return obj
    // };
</script>

    <?php include "components/footer.php"; ?>
    

</body>