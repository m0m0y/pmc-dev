<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$user_type = $auth->getSession("type");
$auth->redirect($isLoggedIn, true, "dashboard.php");

include "components/header.php";
?>

<body>
    <nav class="nav flex-column" style="width: 15%;">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
        <a class="nav-link" href="add_user.php">Register User</a>
        <a class="nav-link" href="logout.php">Logout</a>
    </nav>

    <main class="">
        <div>
            <h1>Welcome <?= $useraccount; ?></h1>
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
        });

    </script>
</body>

<html>
