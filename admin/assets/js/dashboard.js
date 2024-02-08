$(document).ready(function(){
    if ($("#preloader")) {
        window.addEventListener("load", () => {
            $("#preloader").remove();
        });
    }
});