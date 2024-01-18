<?php
include 'components/header.php';
?>

<body>
    <h1>Forgot Password</h1>

    <form action="controller/controller.email.php?mode=forgotPassword" method="post" id="forgotForm">
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="email" name="email" placeholder="Email Address">
        <br><br>

        <button type="submit">Submit</button>
        <a href="login.php">Login</a>
    </form>

    <div id="preloader"></div>

    <script>
        $(document).ready(function() {

            if ($("#preloader")) {
                window.addEventListener("load", () => {
                    $("#preloader").remove();
                });
            }

            $("#forgotForm").on("submit", function(e) {
                e.preventDefault();

                var $inputs = $(this).find("input");
                let action = $(this).attr("action");
                let type = $(this).attr("method");
                let formData = new FormData(this);

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
                        
                        // if(res_value["message"] === "Success!") {
                            alert(res_value["message"]);
                        //     window.location.href="dashboard.php";
                        // } else {
                        //     alert(res_value["message"]);
                        //     setTimeout(function() { location.reload(); }, 1000);
                        // }
                        $inputs.prop("disabled", false);
                    }
                });
            })
        })
    </script>
</body>

</html>