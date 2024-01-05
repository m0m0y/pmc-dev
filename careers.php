<?php include 'components/header.php'; ?>

<body>
    <?php include 'components/navbar.php'; ?>

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Careers</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Careers</li>
                    </ol>
                </div>
            </div>
        </section>

        <section id="careers" class="careers">
            <div class="container">

                <div class="section-title">
                    <h2>Opportunities</h2>
                    <p>Open Careers</p>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show fs-5" data-bs-toggle="tab" href="#tab-1">Professional Sales Specialist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5" data-bs-toggle="tab" href="#tab-2">Customer Care Officer</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="col-lg-9 mt-4 mt-lg-0" data-aos="fade-in">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3 class="text-body-secondary">Professional Sales Specialist (Medical Representative)</h3>
                                        <ul>
                                            <li><i class="ri-checkbox-circle-fill"></i> Implements and executes management approved quota.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Makes a regular coverage of assigned hospitals to promote the use of the products to physicians, nurses, technicians and other key personnel.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Submits product samples to customer and secures result of evaluation.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Conducts follow-ups to secure first order of items being installed.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Ensure re-orders of all items installed.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Gets the customer recognize their need for the products in their professional practice.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Learns the product usage and needs of customers.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Handles customer inquiries, complaints, and other needs with complete satisfaction.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Builds rapport with the customers.</li>
                                        </ul>

                                        <a href="mailto:info@pmc.ph?subject=Web Application for Customer Care Officer" class="apply-btn">Apply <i class="bi bi-arrow-right-circle ms-1"></i></a>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 position-relative">
                                        <img src="assets/img/features-5.png" alt="professional-sales-specialist" class="img-fluid">
                                    </div>
                                    
                                    <div class="blop"></div>
                                    <div class="blop-bg"></div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3 class="text-body-secondary">Customer Care Officer</h3>
                                        <ul>
                                            <li><i class="ri-checkbox-circle-fill"></i> Ensures immediate processing of sales order upon receipt from Sales & Marketing Department.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Checks and verifies carefully the items ordered as to item specification and item code.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Immediate confirmations to Sales & Marketing Department on the availability of stocks ordered.</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Monitors client on stock availability and next delivery</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Ensures processing of Sales Invoice of confirmed Picking Slips and ensures preparation of Packing</li>
                                            <li><i class="ri-checkbox-circle-fill"></i> Slips of invoiced orders for warehouse personnel to initiate packing of items.</li>
                                        </ul>

                                        <a href="mailto:info@pmc.ph?subject=Web Application for Customer Care Officer" class="apply-btn">Apply <i class="bi bi-arrow-right-circle ms-1"></i></a>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 position-relative">
                                        <img src="assets/img/features-2.png" alt="customer-care-officer" class="img-fluid">
                                    </div>

                                    <div class="blop"></div>
                                    <div class="blop-bg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="blog" class="blog blog-link">
            <div class="container position-relative">
                <h6 data-aos="fade-right" data-aos-delay="100">News and Events</h6>
                <a href="news-and-events.php">
                    <h3 class="display-6 fw-semibold" data-aos="fade-right" data-aos-delay="200">Check our News and Events <i class="bi bi-arrow-right" id="arrow-right"></i></h3>
                </a>

                <div class="blop"></div>
            </div>
        </section>

    </main>

    <?php include 'components/footer.php'; ?>
</body>

</html>