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


    <?php include "components/logout_modal.php";  ?>
    <script src="assets/js/dashboard.js"></script>
    <?php include "components/footer.php";  ?>
</body>

<html>
