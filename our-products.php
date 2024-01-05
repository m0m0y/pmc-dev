<?php include 'components/header.php'; ?>

<body>
    <?php include 'components/navbar.php'; ?>

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Products</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Our Products</li>
                    </ol>
                </div>
            </div>
        </section>

        <section id="our-products" class="our-products">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 mt-4 mt-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                       <div class="card shadow">
                            <div class="card-body">
                                <div class="thumbnail">
                                    <img src="https://pmc.ph/app/static/ico.png" alt="pmc-logo" class="pmc-logo">
                                </div>
                                <h6 class="card-text">Products</h6>
                                <h5 class="card-title">Institutional Site</h5>
                                <p>Are you working for a hospital or a medical center and would like to view or request bulk quotations of our products? Visit our institutional site.</p>
                                <div class="mt-4">
                                    <a href="assets/pdf/Zebra_LP2824.zip" class="products-btn"><i class="bi bi-eye me-1"></i> View Products</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4 mt-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="150">
                       <div class="card shadow">
                            <div class="card-body">
                                <div class="thumbnail">
                                    <img src="https://pmc.ph/app/static/tms.png" alt="tms-logo" class="tms-logo">
                                </div>
                                <h6 class="card-text">Products</h6>
                                <h5 class="card-title">Shop Online</h5>
                                <p>A division of Progressive Medical Corporation. Shop and buy high-quality medical products online for your personal homecare use.</p>
                                <div class="mt-4">
                                    <a href="assets/pdf/Zebra_LP2824.zip" class="products-btn"><i class="bi bi-basket me-1"></i> Shop Online</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4 mt-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                       <div class="card shadow">
                            <div class="card-body">
                                <h6 class="card-text">Products</h6>
                                <h5 class="card-title">Be our local distributor</h5>
                                <p>Interested to be a distributor of our products? Be our local distributor!</p>
                                <div class="mt-4">
                                    <a href="contact.php" class="products-btn"><i class="bi bi-envelope me-1"></i> Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <?php include 'components/footer.php'; ?>
</body>

</html>