<?php include 'components/header.php'; ?>

<body>
    <?php include 'components/navbar.php'; ?>

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Drivers</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Download</li>
                        <li>Drivers</li>
                    </ol>
                </div>
            </div>
        </section>

        <section id="download" class="download">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                       <div class="card shadow">
                            <div class="thumbnail">
                                <div class="icon">
                                    <i class="bi bi-folder"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-text">Drivers</h6>
                                <h5 class="card-title">Driver for Zebra LP2824</h5>
                                <p>Version: 7.3.4</p>
                                <p>Requirements: Windows 10 or higher, 512mb of Ram</p>
                                <div class="mt-4">
                                    <a href="assets/pdf/Zebra_LP2824.zip" class="download"><i class="bi bi-download me-1"></i> Download</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="contact" class="contact contact-link">
            <div class="container position-relative">
                <h6 data-aos="fade-right" data-aos-delay="100">Contact Us</h6>
                <a href="contact.php">
                    <h3 class="display-6 fw-semibold" data-aos="fade-right" data-aos-delay="200">We love hearing from you <i class="bi bi-arrow-right" id="arrow-right"></i></h3>
                </a>

                <div class="blop"></div>
            </div>
        </section>
    </main>

    <?php include 'components/footer.php'; ?>
</body>

</html>