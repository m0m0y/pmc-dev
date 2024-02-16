<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, true, "login.php");
$pageTitle = "PMC Dashboard - Careers";

include "components/header.php";
?>

<style>
    .card_container {
        padding: 70px 10%;
    }

    .card_container .card-dashed {
        border: 2px dashed; 
        border-color: rgb(0 0 0 / 17%);
    }

    .card_container .iconplus_container {
        text-align: center;
        padding-top: 35px; 
        padding-bottom: 35px;
    }

    .card_container .iconplus_container i {
        font-size: 100px; 
        color: rgb(0 0 0 / 41%);
    }

    #addCareers {
        cursor: pointer;
    }

    #addNewCareersForm .add_modal .modal-content {
        border-radius: 0px;
    }

    #addNewCareersForm .add_modal .primary_btn {
        padding: 8px 2%;
        border: 0;
        background-color: #11155d;
        color: white;
        transition: 0.4s;
    }

    #addNewCareersForm .add_modal .primary_btn:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    #addNewCareersForm .add_modal .secondary_btn {
        padding: 7px 2%;
        border: 1px solid #8ec646;
        border-color: #8ec646;
        background-color: transparent;
        color: #7cba2c;
        transition: 0.4s;
    }

    #addNewCareersForm .add_modal .secondary_btn:hover {
        background-color: #8ec646;
        color: white;
    }

    #addNewCareersForm .add_modal .modal-header,
    #addNewCareersForm .add_modal .modal-footer {
        border-bottom: none;
        border-top: none;
        padding-left: 5%;
        padding-right: 5%;
        padding-top: 0;
        padding-bottom: 35px;
    }

    #addNewCareersForm .add_modal .modal-header {
        padding-top: 35px;
        padding-bottom: 10px;
    }

    #addNewCareersForm .add_modal .modal-header .modal-title {
        font-weight: 600;
        color: #11155d;
    }

    #addNewCareersForm .add_modal .btn-close {
        box-shadow: none;
    }

    #addNewCareersForm .add_modal .modal-body {
        padding: 0;
    }

    #addNewCareersForm .add_container .add_form {
        padding: 25px 8%;
    }

    #addNewCareersForm .add_container .form-control,
    #addNewCareersForm .add_container .form-select  {
        border-radius: 0px;
        border: 0;
        border-bottom: 1px solid #dee2e6;
        transition: 0.3s;
    }

    #addNewCareersForm .add_container .form-control:focus {
        box-shadow: none;
        border-color: #8ec646;
    }

    #addNewCareersForm .add_container .form-select:focus {
        box-shadow: none;
    }

    #addNewCareersForm .add_container .upload_file {
        border: 2px dashed;
        border-color: rgb(0 0 0 / 17%);
        text-align: center;
        cursor: pointer;
        padding-top: 33px; 
        padding-bottom: 33px;
        background-color: #ebebeb;
        width:100%;
        height:147px;
        overflow:hidden;
        position:relative;
    }

    #addNewCareersForm .add_container .upload_file #thumbnailImg {
        opacity: 0.35;
    }

    #addNewCareersForm .add_container .upload_file #displayImg {
        display: none;
        position:absolute;
        max-width: 100%; 
        max-height: 250px
    }

    #addNewCareersForm .modal-body .ck-editor__editable {
        min-height: 200px;
    }

    #addNewCareersForm .modal-body .invalid-message{
        margin: 0;
        font-size: 13px;
        color: red;
    }

    #addNewCareersForm .modal-body .image-note {
        font-size: 13px;
        text-align: center;
        margin: 0;
        color: #a5a9ad;
        margin-top: 4px;
    }
</style>

<body>
    <?php include "components/sidenav.php"; ?>

    <main>

        <div class="breadcrumbs">
            <div class="d-flex px-3">
                <div class="me-auto"><h3>PMC Career's</h3></div>

                <div class="align-self-center">
                    <a href="#" class=""> <i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>

        <div class="card_container">
            <div class="row row-cols-1 row-cols-md-4 g-4">

                <div class="col d-flex align-items-stretch">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-success">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col d-flex align-items-stretch">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-success">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col d-flex align-items-stretch">
                    <div class="card h-100 w-100 card-dashed">
                        <div class="card-body" id="addCareers">
                            <div class="iconplus_container">
                                <i class="bi bi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <form action="controller/controller.careers.php?mode=addCareers" method="post" id="addNewCareersForm" enctype="multipart/form-data">
        <div class="modal fade add_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5"><i class="bi bi-briefcase-fill"></i> Create New <span style="color: #8ec646;"> Career </span> </h1>
                    </div>

                    <div class="modal-body">
                        <div class="add_container">
                            <div class="add_form">

                                <div class="row">

                                    <div class="mb-3" id="modal_add_alert_msg"></div>

                                    <div class="col-sm-12 col-md-9">
                                        <input type="text" class="form-control" name="careers_title" placeholder="Job role/position">
                                        <p class="invalid-message" id="careers_title_error"></p>
                                        
                                        <input type="text" class="form-control mt-3" name="careers_subtitle" placeholder="Sub Title (optional)">

                                        <input type="email" class="form-control mt-3" name="careers_mailto" placeholder="Mail to: mail@example.ph">
                                        <p class="invalid-message" id="careers_mailto_error"></p>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="upload_file">
                                            <img src="assets/img/thumbnail.svg" alt="img-thumbnail" class="w-50" id="thumbnailImg">
                                            <img src="" alt="img-selected" id="displayImg">
                                            <input type="file" class="file_upload d-none" name="careers_img" accept="image/*" onchange="showImg(this)" />
                                        </div>
                                        <p class="image-note">optional</p>
                                    </div>

                                    <div class="col-md-12 mt-5">
                                        <textarea name="careers_content" id="careersContent" placeholder="Put your content here"></textarea>
                                    </div>
                                    <p class="invalid-message" id="careers_content_error"></p>
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

    <?php include "components/logout_modal.php";  ?>
    <?php include "components/footer.php";  ?>

    <script>
        ClassicEditor
        .create( document.querySelector( '#careersContent' ), {
            toolbar: [ 'heading', 'bold', 'italic', 'bulletedList', 'numberedList', ]
        })
        .catch( error => {
            console.error( error );
        } );

        let preload = document.querySelector("#preloader");
        window.addEventListener("load", () => {
            document.getElementById("preloader").remove();
        });

        function showImg(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector(".upload_file").style.padding = 0;
                    document.getElementById("thumbnailImg").style.display = "none";

                    let selectedImg = document.getElementById("displayImg");
                    selectedImg.style.display = "block";
                    selectedImg.setAttribute("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);

            }
            
        }

        function hideShowImage() {
            document.querySelector(".upload_file").style.padding = "";

            document.getElementById("displayImg").style.display = "none";
            document.getElementById("displayImg").setAttribute("src", "");

            document.getElementById("thumbnailImg").style.display = "";
        } 


        document.getElementById("addCareers").addEventListener("click", () => {
            $(".add_modal").modal("show");

            let fileInput = document.querySelector(".upload_file");
            fileInput.addEventListener("click", () => {
                document.querySelector(".file_upload").click();
            });

            document.getElementById("modal_add_close_btn").onclick = () => {
                document.getElementById("modal_add_alert_msg").style.display = "none";
                document.getElementById("modal_add_alert_msg").classList = "";

                document.getElementById("addUserForm").reset();
                hideShowImage();
            };

            document.querySelector("#addNewCareersForm").addEventListener("submit", async (e) => {
                e.preventDefault();

                let inputValue = document.getElementsByTagName("input");
                let invalidMessage = document.querySelectorAll(".invalid-message");
                let textareaValue = document.getElementsByTagName("textarea");

                (inputValue.careers_title.value === "") ? invalidMessage[0].innerText = "This field is required!" : invalidMessage[0].innerText = "";
                (inputValue.careers_mailto.value === "") ? invalidMessage[1].innerText = "This field is required!" : invalidMessage[1].innerText = "";
                (textareaValue.careers_content.value === "") ? invalidMessage[2].innerText = "Put some content here!" : invalidMessage[2].innerText = "";

                if (inputValue.careers_title.value !== "" && inputValue.careers_mailto.value !== "") {

                    let addModalMessageAlert = document.getElementById("modal_add_alert_msg");

                    let action = document.getElementById("addNewCareersForm").getAttribute("action");
                    let method = document.getElementById("addNewCareersForm").getAttribute("method");
                    let formData = new FormData(document.getElementById("addNewCareersForm"));

                    try {
                        const response = await fetch(action, {
                            method: method,
                            body: formData
                        });
                        const result = await response.json();

                        if(result.status <= 3) {
                            $("#modal_add_alert_msg").html("<p class='alert_message'>"+ result.message +"<button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                            document.querySelector(".btn-close").onclick = () => {
                                $("#modal_add_alert_msg").fadeOut("slow");
                            }
                        }

                        if(result.status == 2 || result.status == 3) {
                            addModalMessageAlert.classList.remove("danger_alert_msg", "success_alert_msg");
                            addModalMessageAlert.classList.add("warning_alert_msg");
                            return;
                        }

                        if(result.status == 0) {
                            addModalMessageAlert.classList.remove("warning_alert_msg", "success_alert_msg");
                            addModalMessageAlert.classList.add("danger_alert_msg");
                            return;
                        }

                        if(result.status == 1) {
                            addModalMessageAlert.classList.remove("warning_alert_msg", "danger_alert_msg");
                            addModalMessageAlert.classList.add("success_alert_msg");

                            document.getElementById("addNewCareersForm").reset();

                            hideShowImage();
                            textareaValue.careers_content.value = "";
                            return;
                        }

                    }
                    catch(e) {
                        console.error(e.message);
                    }
                }

            });

        });
      

    </script>
</body>

</html>