<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, true, "login.php");
$pageTitle = "PMC Dashboard - Careers";

include "controller/controller.db.php";
include "model/model.careers.php";
$careers = new ModelCareers();

include "components/header.php";
?>

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
            <div class="row row-cols-1 row-cols-md-4 g-4" id="cardContents"></div>
        </div>

        <form action="" method="" class="careers_form" id="careersForm" enctype="multipart/form-data">
            <div class="modal fade careers_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5"></h1>
                        </div>

                        <div class="modal-body">
                            <div class="careers_container">

                                <div class="row mb-4">
                                    <div class="mb-3" id="messageAlert"></div>

                                    <div class="col-sm-12 col-md-9">
                                        <input type="text" class="form-control" name="careers_title" placeholder="Job role/position">
                                        <p class="invalid-message" id="careers_title_error"></p>
                                        
                                        <input type="text" class="form-control mt-3" name="careers_subtitle" placeholder="Sub Title (optional)">

                                        <input type="email" class="form-control mt-3" name="careers_mailto" placeholder="Mail to: mail@example.ph">
                                        <p class="invalid-message" id="careers_mailto_error"></p>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="upload_file">
                                            <img src="assets/img/thumbnail.svg" alt="img-thumbnail" class="w-50 thumbnailImg" id="thumbnailImg">
                                            <img src="" alt="img-selected" id="displayImg">
                                            <input type="file" class="file_upload d-none" name="careers_img" accept="image/*" onchange="showImg(this)" />
                                        </div>
                                        <p class="image-note">optional</p>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <textarea name="careers_content" id="careersContent" placeholder="Put your content here"></textarea>
                                    </div>
                                    <p class="invalid-message" id="careers_content_error"></p>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Status:</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="careers_status">
                                            <option value="0">Disabled</option>
                                            <option value="1">Enabled</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="careers_id" id="careers_id">
                            <input type="hidden" name="images" id="images">
                            <button type="button" class="secondary_btn" id="careersModalCls" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="primary_btn"><i class="bi bi-floppy-fill me-1"></i> Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade delete_modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <i class="bi bi-exclamation-diamond-fill"></i>
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
    </main>



    <?php include "components/logout_modal.php";  ?>
    <?php include "components/footer.php";  ?>

    <script>
        // cards contents
        function cardCareers() {
            let careersData = <?php echo $careers->getCareers(); ?>
        
            let content = "";
            careersData.forEach(item => {
                let status = (item.careers_status == 1) ? "<span class='badge badge-primary'>Enable</span>" : "<span class='badge badge-warning'>Disabled</span>";
                let careerString = htmlspecialchars_decode(item.careers_content).replace("<p>", "").replace("</p>", "");
                let len = 50;
                let trimmedString = careerString.substring(0, len);
                let checkFilteredTrim = (careerString.length <= 50) ? careerString : trimmedString+" ...";

                content += `
                <div class="col d-flex align-items-stretch">
                    <div class="card h-100 w-100">

                        <div class="card-body">
                            <h5 class="card-title">${item.careers_title}</h5>
                            ${status}
                            <div class="card-text">${checkFilteredTrim}</div>
                        </div>

                        <p class="m-0 mail-to">Mail to: <a href="mailto:info@pmc.ph?subject=Web Application for ${item.careers_title}">${item.careers_mailto}</a> </p>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 update_textlink_container">
                                    <a href="#!" class="update_textlink" onclick="updateCareerModal(\'` + item.careers_id + `\', \'` + item.careers_title + `\', \'` + item.careers_subtitle + `\', \'` + item.careers_mailto + `\', \'` + item.careers_content + `\', \'` + item.career_img + `\', \'` + item.careers_status + `\')"><i class="bi bi-pencil-square"></i> Update</a>
                                </div>

                                <div class="col-sm-12 col-md-6 delete_textlink_container">
                                    <a href="#!" class="delete_textlink" onclick="deletCareer(\'` + item.careers_id + `\')"><i class="bi bi-trash-fill"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            });

            content += `
            <div class="col d-flex align-items-stretch">
                <div class="card h-100 w-100 card-dashed">
                    <div class="card-body" id="addCareers">
                        <div class="iconplus_container">
                            <i class="bi bi-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            `;
            document.getElementById("cardContents").innerHTML = content;
            

            document.querySelector("#addCareers").addEventListener("click", () => {
                $(".careers_modal").modal("show");

                document.getElementById("careersForm").setAttribute("action", "controller/controller.careers.php?mode=addCareers");
                document.getElementById("careersForm").setAttribute("method", "post");
                document.querySelector(".modal-title").innerHTML = "<i class='bi bi-briefcase-fill'></i> Create New <span style='color: #8ec646;'> Career </span>";
                let fileInput = document.querySelectorAll(".upload_file");
                
                fileInput[0].addEventListener("click", () => {
                    document.querySelector(".file_upload").click();
                });
            });
        }
    </script>

    <script src="assets/js/careers.js"></script>
</body>

</html>