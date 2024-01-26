<aside class="sidenav">
    <h4 class="greeting_msg"><span class="welcome_txt fs-5">Welcome,</span><br> <?= $useraccount; ?></h4>
    <a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer me-1"></i> Dashboard</a>
    <a class="nav-link" href="pages.php"><i class="bi bi-folder-plus me-1"></i> Pages</a>
    <a class="nav-link" href="#"><i class="bi bi-send-fill me-1"></i> Careers</a>
    <a class="nav-link" href="add_user.php"><i class="bi bi-person-fill-add me-1"></i> Register User</a>
    <a class="nav-link" target="_blank" href="http://localhost/pmc-dev/"><i class="bi bi-eye-fill"></i> View Website</a>

    <div class="logout_btn">
        <a class="nav-link" href="#" onclick="triggerLogoutModal()"><i class="bi bi-box-arrow-right me-1"></i> Logout</a>
    </div>
</aside>