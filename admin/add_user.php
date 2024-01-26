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
                <div class="me-auto"><h3>Register User</h3></div>

                <div class="align-self-center">
                    <a href="#" class=""> <i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>

        <div class="register_container">
            <div class="register_form">
                
                <div id="alert_msg"></div>

                <form action="controller/controller.register.php?mode=add" method="post" id="registrationForm">

                    <div class="mt-4 row">
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
                                <option value="1">Active</option>
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

                    <div class="mt-5 d-flex justify-content-end">
                        <button type="submit">Register Account</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <div id="preloader"></div>

    <script>
        $(document).ready(function(){ 

            if ($("#preloader")) {
                window.addEventListener("load", () => {
                    $("#preloader").remove();
                });
            }

            $("#registrationForm").on("submit", function(e) {

                e.preventDefault();
                let $inputs = $(this).find("input");
                let action = $(this).attr("action");
                let type = $(this).attr("method");
                let formData = new FormData(this);

                if($("input[name='email']").val() == "" || $("input[name='username']").val() == "" || $("input[name='password']").val() == "" || $("input[name='confirm_password']").val() == "" || $("select[name='status']").val() == "" || $("select[name='user_type']").val() == "") {
                    $("#alert_msg").addClass("danger_alert_msg");
                    $("#alert_msg").html("<p class='alert_message'>Please double check the field! <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                    $(".btn-close").click(function() { $("#alert_msg").fadeOut("slow"); });
                    return false;
                }

                if($("input[name='password']").val() != $("input[name='confirm_password']").val()) {
                    $("#alert_msg").addClass("danger_alert_msg");
                    $("#alert_msg").html("<p class='alert_message'>Password did not match! <button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                    $(".btn-close").click(function() { $("#alert_msg").fadeOut("slow"); });
                    return false;
                }

                console.log("submitting form");

                $.ajax({
                    url: action,
                    method: type,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#alert_msg").addClass("success_alert_msg");
                        $("#alert_msg").html("<p class='alert_message'>Registration successfully!</p>").fadeIn("slow").fadeOut(1900);
                        $inputs.val("");
                    }
                });

            })
        })
    </script>
</body>

</html>