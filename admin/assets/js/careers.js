window.addEventListener("load", () => {
    document.getElementById("preloader").remove();
});

document.addEventListener("DOMContentLoaded", function () {
    cardCareers()
})

// CK Editor
let appEditor;
ClassicEditor
    .create( document.querySelector( '#careersContent' ), {
        toolbar: [ 'heading', 'bold', 'italic', 'bulletedList', 'numberedList', ]
    })
    .then(editor => {
        appEditor = editor;
    })
    .catch( error => {
        console.error( error );
    });


// replace HTML entities with their respective characters
function htmlspecialchars_decode(string) {
    return string.replace(/&amp;/g, '&').replace(/&quot;/g, '"').replace(/&#039;/g, "'").replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace("h1", "p").replace("h2", "p").replace("h3", "p").replace("h4", "p").replace("h5", "p");
}

// show image
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

// hide image 
function hideShowImage() {
    document.querySelector(".upload_file").style.padding = "";
    document.getElementById("displayImg").style.display = "none";
    document.getElementById("displayImg").setAttribute("src", "");

    document.getElementById("thumbnailImg").style.display = "";
} 

// update cards contents
function updateCareerModal(careers_id, careers_title, careers_subtitle, careers_mailto, careers_content, career_img, careers_status) {
    $(".careers_modal").modal("show");

    // change attributes for update function
    document.getElementById("careersForm").setAttribute("action", "controller/controller.careers.php?mode=updateCareers");
    document.getElementById("careersForm").setAttribute("method", "post");
    document.querySelector(".modal-title").innerHTML = "<i class='bi bi-pencil-square'></i> Update <span style='color: #8ec646;'> Career </span>";
    let fileInput = document.querySelector(".upload_file");
    
    fileInput.addEventListener("click", () => {
        document.querySelector(".file_upload").click();
    });

    let inputValue = document.getElementsByTagName("input");
    let selectValue = document.getElementsByTagName("select");
    let careersData = [careers_title, careers_subtitle, careers_mailto];

    for (let i = 0; i < inputValue.length && i < careersData.length; i++) {
        inputValue[i].value = careersData[i];
    }
   
    // put values inside input types
    document.getElementById("careers_id").value = careers_id;
    document.getElementById("images").value = career_img;
    appEditor.setData(careers_content);
    selectValue.careers_status.value = careers_status;

    // displaying image
    if(career_img!="n/a") {
        document.querySelector(".upload_file").style.padding = 0;
        document.getElementById("thumbnailImg").style.display = "none";
        document.getElementById("displayImg").style.display = "block";
        document.getElementById("displayImg").setAttribute("src", "http://localhost/pmc-dev/admin/assets/img/careers/"+career_img);
        return
    }

    // hide if there's no image in data
    document.querySelector(".upload_file").style.padding = "";
    document.getElementById("thumbnailImg").style.display = "";
}

// submit forms
document.querySelector("#careersForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    let inputValue = document.getElementsByTagName("input");
    let textareaValue = document.getElementsByTagName("textarea");
    let invalidMessage = document.querySelectorAll(".invalid-message");
    
    // display invalid message
    (inputValue.careers_title.value === "") ? invalidMessage[0].innerText = "This field is required!" : invalidMessage[0].innerText = "";
    (inputValue.careers_mailto.value === "") ? invalidMessage[1].innerText = "This field is required!" : invalidMessage[1].innerText = "";
    (textareaValue.careers_content.value === "") ? invalidMessage[2].innerText = "Put some content here!" : invalidMessage[2].innerText = "";

    // check required fields
    if (inputValue.careers_title.value !== "" && inputValue.careers_mailto.value !== "" && textareaValue.careers_content.value !== "") { 
        let addModalMessageAlert = document.getElementById("messageAlert");

        // get attributes of form
        let action = document.getElementById("careersForm").getAttribute("action");
        let method = document.getElementById("careersForm").getAttribute("method");
        let formData = new FormData(document.getElementById("careersForm"));

        try {
            const response = await fetch(action, {
                method: method,
                body: formData
            });
            const result = await response.json();

            if(result.status <= 4) {
                $("#messageAlert").html("<p class='alert_message'>"+ result.message +"<button type='button' class='btn-close float-end'></button></p>").fadeIn("slow");
                document.querySelector(".btn-close").onclick = () => {
                    $("#messageAlert").fadeOut("slow");
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

            // for insert function alert message
            if(result.status == 1) {
                addModalMessageAlert.classList.remove("warning_alert_msg", "danger_alert_msg");
                addModalMessageAlert.classList.add("success_alert_msg");

                document.getElementById("careersForm").reset();
                hideShowImage();
                appEditor.setData('');
                document.getElementById("careersModalCls").addEventListener("click", function() {
                    location.reload("careers.php");
                });
                return;
            }

            // for update function alert message
            if(result.status == 4) {
                addModalMessageAlert.classList.remove("warning_alert_msg", "danger_alert_msg");
                addModalMessageAlert.classList.add("success_alert_msg");

                document.getElementById("careersModalCls").addEventListener("click", function() {
                    location.reload("careers.php");
                });
                return;
            }

        }
        catch(e) {
            console.error(e.message);
        }
    }
});

// triggered modal close
document.querySelector("#careersModalCls").addEventListener("click", function() {
    // clear all data function in form
    let invalidMessage = document.querySelectorAll(".invalid-message");
    document.getElementById("messageAlert").style.display = "none";
    document.getElementById("messageAlert").classList.remove("warning_alert_msg", "success_alert_msg", "danger_alert_msg");

    // hide all error messages in form
    invalidMessage[0].innerText = "";
    invalidMessage[1].innerText = "";
    invalidMessage[2].innerText = "";
    document.getElementById("careersForm").reset();
    hideShowImage()
    appEditor.setData('');
});

// delete function
function deletCareer(careers_id) {
    const apiUrl = "http://localhost/pmc-dev/admin/controller/controller.careers.php?mode=deleteCareer&careers_id="+careers_id;

    $(".delete_modal").modal("show");

    document.querySelector(".message_body").innerText = "Are you sure to delete this item?";
    document.querySelector(".proceed_btn").addEventListener("click", async () => {
        try {
            const response = await fetch(apiUrl, {
                    method: 'post',
                }
            );
            const result = await response.json();
            
            if(result.status == 1) {
                $('.delete_modal').modal('hide');
                location.reload("careers.php");
            }

        }
        catch(e) {
            console.error(e.message);
        }
    });
}