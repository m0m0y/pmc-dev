<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, false, "dashboard.php");

include "components/header.php";
?>

<body>
    <h1>Admin dashboard</h1>

    <form action="controller/controller.login.php?mode=login" method="POST" id="loginForm">
        <input type="text" name="username" class="rounded-0" placeholder="username">
        <input type="password" name="password" class="rounded-0" placeholder="password">

        <button type="submit">Login</button>
        <a href="fogot_password.php">Fogot Password</a>
    </form>

    <div id="preloader"></div>

    <script>
        $(document).ready(function(){

            if ($("#preloader")) {
                window.addEventListener("load", () => {
                    $("#preloader").remove();
                });
            }

            $("#loginForm").on("submit", function(e){
                e.preventDefault();

                var $inputs = $(this).find("input");
                let action = $(this).attr("action");
                let type = $(this).attr("method");
                let formData = new FormData(this);

                console.log("submitting form");
                $inputs.prop("disabled", true);
                $inputs.val("");

                $.ajax({
                    url: action,
                    method: type,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        let res_value = jQuery.parseJSON(res);
                        
                        if(res_value["message"] === "Success!") {
                            alert(res_value["message"]);
                            window.location.href="dashboard.php";
                        } else {
                            alert(res_value["message"]);
                            setTimeout(function() { location.reload(); }, 1000);
                        }

                        $inputs.prop("disabled", false);
                    }
                });
            })
        });
    </script>
</body>

<html>