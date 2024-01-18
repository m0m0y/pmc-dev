<?php
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
            <h1>Register User</h1>

            <form action="controller/controller.register.php?mode=add" method="post" id="registrationForm">
                <input type="text" name="username" class="rounded-0" placeholder="Username">
                </br>
                <input type="text" name="password" class="rounded-0" placeholder="Password">
                </br>
                <input type="text" name="confirm_password" class="rounded-0" placeholder="Confirm Password">
                </br>
                <select name="status">
                    <option value="1">Disabled</option>
                    <option value="0">Active</option>
                </select>
                </br>
                <select name="user_type">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                </br></br>
                <button type="submit">Register Account</button>
            </form>
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

                let action = $(this).attr("action");
                let type = $(this).attr("method");
                let formData = new FormData(this);


                console.log("submitting form");

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
                            window.location.href="add_user.php";
                        } else {
                            // alert(res_value["message"]);
                            // setTimeout(function() { location.reload(); }, 1000);
                        }
                    }
                });
            })
        })
    </script>
</body>

</html>