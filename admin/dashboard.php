<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, true, "login.php");
$pageTitle = "PMC Dashboard";
include "components/header.php";
?>

<body>
    <?php include "components/sidenav.php"; ?>

    <main>
        <div class="breadcrumbs">
            <div class="d-flex px-3">
                <div class="me-auto"><h3>Dashboard</h3></div>

                <div class="align-self-center">
                    <a href="#" class=""> <i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade logout_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <i class="bi bi-question-diamond-fill"></i>
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

    <script src="assets/js/dashboard.js"></script>
    <?php include "components/footer.php";  ?>
</body>

<html>
