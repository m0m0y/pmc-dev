$(document).ready(function(){
    if ($("#preloader")) {
        window.addEventListener("load", () => {
            $("#preloader").remove();
        });
    }
});

function triggerLogoutModal() {
    $(".logout_modal").modal("show");
    $(".message_body").text("Are you sure to logout?");
    $(".proceed_btn").click(function(){ window.location.replace("logout.php"); })
}