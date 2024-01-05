<?php 
$page = $_SERVER["REQUEST_URI"];
$value = explode("/", $page);
?>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <img src="https://pmc.ph/app/static/image/logo.png" alt="" className="img-fluid"/>
        </div>

        <nav id="navbar" class="navbar">
        <ul>
            <li><a href="index.php" class="<?= ($value[2] == "index.php") ? 'active' : '' ?>">Home</a></li>

            <li class="dropdown"><a href="#" <?= ($value[2] == "news-and-events.php" || $value[2] == "about.php") ? 'active' : '' ?>><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="about.php" class="<?= ($value[2] == "about.php") ? 'active' : '' ?>">About Us</a></li>
                <li><a href="news-and-events.php" class="<?= ($value[2] == "news-and-events.php") ? 'active' : '' ?>">News And Events</a></li>
            </ul>
            </li>
            <li><a href="careers.php" class="<?= ($value[2] == "careers.php") ? 'active' : '' ?>">Careers</a></li>
            <li><a href="warranty.php" class="<?= ($value[2] == "warranty.php") ? 'active' : '' ?>">Warranty</a></li>
            <li class="dropdown"><a href="#" <?= ($value[2] == "drivers.php" || $value[2] == "brochures-catalogs.php") ? 'active' : '' ?>><span>Download</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="brochures-catalogs.php" class="<?= ($value[2] == "brochures-catalogs.php") ? 'active' : '' ?>">Brochures & Catalogs</a></li>
                    <li><a href="drivers.php" class="<?= ($value[2] == "drivers.php") ? 'active' : '' ?>">Downloads</a></li>
                </ul>
            </li>
            <li><a href="contact.php" class="<?= ($value[2] == "contact.php") ? 'active' : '' ?>">Contact</a></li>
            <li><a href="our-products.php" class="getstarted <?= ($value[2] == "contact.php") ? 'active' : '' ?>">Request Quote</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>