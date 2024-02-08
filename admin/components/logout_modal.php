<div class="modal fade logout_modal" id="staticBackdrop">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="bi bi-question-diamond-fill"></i>
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

<script>
    function triggerLogoutModal() {
        $(".logout_modal").modal("show");
        $(".message_body").text("Are you sure to logout?");
        $(".proceed_btn").click(function(){ window.location.replace("logout.php"); })
    }
</script>