<?php
$pageTitle = "PMC Dashboard - Forgot Password";
include 'components/header.php';
?>

<body class="forgot_body">
    <div class="container">

        <?php if(empty($_GET["mode"])) { ?>

            <div class="forgot_container">

                <div class="form_border">

                    <center><h3>Forgot Password</h3></center>

                    <form class="mt-5" action="controller/controller.resetpass.php?mode=forgotPassword" method="post" id="resetPassForm">

                        <div class="info_alert_msg">
                            <p class="m-0">We will send you a link to your email to change your password.</p>
                        </div>

                        <div class="form-group mt-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="f_username" placeholder="">
                                <label>Type your username here</label>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="f_email" placeholder="">
                                <label>Email address</label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="primary_btn me-2"><i class="bi bi-send me-1"></i> Submit</button>
                            <a href="login.php">Login Account <i class="bi bi-arrow-right"></i></a>
                        </div>

                    </form>

                </div>
                
            </div>
        
        <?php } else if($_GET["mode"] == "update_password") { 
            $email = $_GET["email"];
            ?>
            <div class="update_container">

                <div class="form_border">

                    <center><h3>Update Password</h3></center>

                    <form class="mt-5" action="controller/controller.resetpass.php?mode=updatePassword" method="post" id="resetPassForm">

                        <div class="form-group mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="u_username" placeholder="">
                                <label>Username</label>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="u_password" placeholder="">
                                <label>New Password</label>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="u_confirm_password" placeholder="">
                                <label>Confirm Password</label>
                            </div>
                        </div>

                        <input type="email" name="email" value="<?= $email ?>" style="display: none;" readonly>

                        <div class="mt-4" id="alert_msg"></div>

                        <div class="mt-4">
                            <button type="submit" class="primary_btn me-2"><i class="bi bi-arrow-clockwise me-1"></i>Update</button>
                            <a href="login.php">Login Account <i class="bi bi-arrow-right"></i></a>
                        </div>

                    </form>

                </div>
            
            </div>
        <?php } ?>

        <div class="modal fade forgot_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <i class="bi bi-exclamation-diamond-fill"></i>
                            <p class="message_body"></p>
                        </center>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="primary_btn" data-bs-dismiss="modal" id="fogot_modal_btn">Okay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "components/footer.php"; ?>
    <script src="assets/js/forgot_password.js"></script>

</body>

</html>