<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, false, "dashboard.php");
$pageTitle = "PMC Dashboard - Login";
include "components/header.php";
?>

<body class="login_body">
    <div class="container">

        <div class="login_container row align-items-center">
            <div class="col-xl-6 login_form align-self-center">
                
                <div class="form_border">

                    <center><h4>Login Form</h4></center>

                    <form class="mt-5" action="controller/controller.login.php?mode=login" method="POST" id="loginForm">       

                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="username" placeholder="" onkeyup="txtvalidator(this)">
                                <label>Type your username here</label>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" placeholder="" onkeyup="txtvalidator(this)">
                                <label>Your Password</label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="me-2">Login<i class="bi bi-box-arrow-in-right ms-1"></i></button>
                            <a href="fogot_password.php?mode">Fogot Password ? <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </form>

                </div>

            </div>

            <div class="col-xl-6 banner_img">
                <img src="https://pmc.ph/app/static/image/bannermain-1.jpg" class="login_banner" alt="banner-image">
            </div>
        </div>

        <div class="modal fade login_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <p class="message_body"></p>
                        </center>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="primary_btn" data-bs-dismiss="modal">Okay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="assets/js/login.js"></script>
    <?php include "components/footer.php";  ?>
</body>

<html>