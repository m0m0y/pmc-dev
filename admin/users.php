<?php
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, true, "login.php");
$pageTitle = "PMC Dashboard - Add User's";
include "components/header.php";
?>

<body>
    <?php include "components/sidenav.php"; ?>
   
    <main>
        <div class="breadcrumbs">
            <div class="d-flex px-3">
                <div class="me-auto"><h3>List of User's</h3></div>

                <div class="align-self-center">
                    <a href="#" class=""> <i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>

        <div class="table_container">

            <div class="mb-3 d-flex align-items-center">
                <h4 class="table_title">Registered Accounts</h4>
                <button type="button" class="primary_btn" onclick="addUserModal()"><i class="bi bi-plus-circle-fill"></i> New Account</button>
            </div>

            <table class="table table-bordered" id="userData" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>  
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Account Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody></tbody>
            </table>

        </div>

        <form action="controller/controller.users.php?mode=addUsers" method="post" id="addUserForm">
            <div class="modal fade add_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5"><i class="bi bi-person-fill-add"></i> Add New <span style="color: #8ec646;"> User </span> </h1>
                        </div>

                        <div class="modal-body">
                            <div class="add_container">
                                <div class="add_form">

                                    <div class="mb-3" id="modal_add_alert_msg"></div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Email:</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" placeholder="email@example.com">
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">Username:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">Password:</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" placeholder="********">
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">Confirm:</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="confirm_password" class="form-control" placeholder="********">
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">Status:</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status">
                                                <option value="0">Disabled</option>
                                                <option value="1">Enabled</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">User Type:</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="user_type">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="secondary_btn" id="modal_add_close_btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="primary_btn"><i class="bi bi-floppy-fill me-1"></i> Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <form action="controller/controller.users.php?mode=updateUsers" method="post" id="updateUserForm">
            <div class="modal fade update_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5"><i class="bi bi-person-fill-add" style="color: #;"></i> Update <span style="color: #8ec646;"> User </span> </h1>
                        </div>

                        <div class="modal-body">
                            <div class="update_container">
                                <div class="update_form">

                                    <div class="mb-3" id="modal_update_alert_msg"></div>

                                    <input type="hidden" name="id" readonly>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Email:</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" placeholder="email@example.com">
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">Username:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">Password:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password" class="form-control" placeholder="********">
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">Status:</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status">
                                                <option value="0">Disabled</option>
                                                <option value="1">Enabled</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-4 row">
                                        <label class="col-sm-2 col-form-label">User Type:</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="user_type">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="secondary_btn" id="modal_update_close_btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="primary_btn" id="modal_update_btn"><i class="bi bi-floppy-fill me-1"></i> Save</button>
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
    <script src="assets/js/users.js"></script>
    
</body>

</html>