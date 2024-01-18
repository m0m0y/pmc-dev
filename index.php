<?php 
include 'components/header.php'; 
include 'controller/captcha.php';

$random_strings = new RandomStrings();
$captcha = $random_strings->captcha();
?>

<body>
    <?php include 'components/navbar.php'; ?>

    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url()">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown" data-aos="zoom-out"><span>Bringing World-class </span> Healthcare Products to the Filipinos</h2>
                            <p class="animate__animated animate__fadeInUp fs-5" data-aos="zoom-out" data-aos-delay="100">The First ISO-9001:2015 certified Healthcare Products Distribution Company in the Philippines.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <main id="main">
        <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-6 mb-3 mb-md-0">
                        <div class="section-title mb-4">
                            <h2>About</h2>
                            <p>Who we are</p>
                        </div>
                        <h4 class="fs-2 fw-light text-secondary" data-aos="fade-up" data-aos-delay="100">Established in 1982, Progressive Medical Corporation is a company based in the Philippines, dedicated to providing Filipinos with healthcare products of the highest standard.</h4>
                    </div>
                    
                    <div class="col-lg-6 pt-lg-0" data-aos="fade-up" data-aos-delay="250">
                        <p>
                            Progressive Medical Corporation is the first ISO-9001:2015 certified Healthcare Products Distribution Company in the Philippines. Today, Progressive Medical Corporation is an industry leader in importing and exporting medical, surgical, laboratory, and scientific products, providing service to approximately 6,000 customers throughout the Philippines and overseas.
                        </p>
                        
                        <p class="fst-italic">
                            Our vision is to be the industry leader in providing customers with world-class healthcare products.
                        </p>

                        <p>
                            We want to effectively address the needs of major medical and healthcare industries and practices, including hospitals, medical  clinics, healthcare centres and professionals, pharmacies, laboratories, and other institutions focused on the chain of care. We also cater to different schools, universities, industrial, and government units.
                        </p>

                        <p>
                            At Progressive Medical Corporation, we are determined to grow together with our customers by providing them with the best value and cost-effective medical and healthcare products.
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <section class="counts">
            <div class="container text-white">

                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
                        <h2 class="fw-semibold border-start ps-3 mb-3">Progressive Medical Corporation</h2>
                        <p>The First ISO-9001:2015 certified Healthcare Products Distribution Company in the Philippines.</p>
                    </div>
                
                    <div class="col-md-6" data-aos="fade-left">
                        <div class="row">
                            <div class="col-md-4 col text-center">
                                <h2 class="number">6257</h2>
                                <p class="type">Customer</p>
                            </div>
                            <div class="col-md-4 col text-center">
                                <h2 class="number">5124</h2>
                                <p class="type">Products</p>
                            </div>
                            <div class="col-md-4 col text-center">
                                <h2 class="number">10</h2>
                                <p class="type">Branches</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section id="clients" class="clients section-bg">
            <div class="container">

                <h2 class="display-6 text-center" data-aos="zoom-out">Trusted by leading hospitals Nationwide</h2>
                <p data-aos="zoom-out" data-aos-delay="200">We address the needs of major medical and healthcare industries and practices, including hospitals, medical clinics, healthcare centres and professionals, pharmacies, laboratories, and other institutions focused on the chain of care.</p>

                <div class="row">

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="300">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="400">
                        <img src="assets/img/clients/client-4.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="500">
                        <img src="assets/img/clients/client-5.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="600">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="700">
                        <img src="assets/img/clients/client-7.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="800">
                        <img src="assets/img/clients/client-8.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="900">
                        <img src="assets/img/clients/client-9.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="1000">
                        <img src="assets/img/clients/client-10.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="1100">
                        <img src="assets/img/clients/client-11.png" class="img-fluid" alt="client-logo" />
                    </div>

                    <div class="col-md-4 col-lg-2 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="1200">
                        <img src="assets/img/clients/client-12.png" class="img-fluid" alt="client-logo" />
                    </div>

                </div>

            </div>
        </section>

        <section id="services" class="services"> 
            <div class="container">

                <div class="row g-4">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <i class="bi bi-building"></i>
                            <h4>100% Filipino Owned and Managed Company</h4>
                            <p>We take pride in serving the Philippines and prioritizing the medical needs of Filipinos.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <i class="bi bi-award"></i>
                            <h4>Quality Assured</h4>
                            <p>We are the first certified healthcare products distribution company in the Philippines. Under the ISO certification, we offer products that are guaranteed to be of the highest quality.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch"data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                        <i class="bi bi-graph-down"></i>
                        <h4>Less cost, more value</h4>
                        <p>Higher quality does not always mean higher prices. We offer competitive prices to ensure our customers receive more value than what they have paid for.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch"data-aos="zoom-in" data-aos-delay="400">
                        <div class="icon-box">
                        <i class="bi bi-tree"></i>
                        <h4>Environmental Responsibility</h4>
                        <p>We care about the world we live in. All of our packaging is made of recyclable materials.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch"data-aos="zoom-in" data-aos-delay="500">
                        <div class="icon-box">
                        <i class="bi bi-brightness-high"></i>
                        <h4>We are commited</h4>
                        <p>We care about our partners. Reach out to our customer support and we will address your concerns with utmost attention and care.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch"data-aos="zoom-in" data-aos-delay="600">
                        <div class="icon-box">
                        <i class="bi bi-database-gear"></i>
                        <h4>A system that works</h4>
                        <p>With a wide distribution channel and efficient infrastructure throughout the Philippines, we are able to ensure that our customers receive their orders anywhere in the Philippines.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="homeblog" class="homeblog">
            <div class="container">

                <div class="col-lg-6">
                    <div class="section-title mb-4">
                        <h2>News and Events</h2>
                        <p>News and Events</p>
                    </div>
                </div>

                <div class="row g-2 g-lg-3">
                    <div class="col-md-12 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <article class="entry mb-md-5 mb-lg-0 mb-xl-0">
                            <div class="entry-img mb-4">
                                <img src="https://pmc.ph/app/static/image/pmc%20(1).jpg" alt="celebrating-golden-milestone" class="img-fluid">
                            </div>

                            <h2 class="fs-4 fw-bold mb-2 p-0">
                                <a href="#">Celebrating Golden Milestone</a>
                            </h2>

                            <div class="entry-meta mb-3">
                                <i class="bi bi-clock"></i> <a href="#" class="text-muted d-print-inline-block lh-1"><time datetime="2020-01-01">June 30, July 1 & 2, 2023</time></a>
                            </div>

                            <div class="lh-base">
                                <p>
                                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                                Et eveniet enim... <a href="#" class="text-decoration-underline">Read More</a>
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-12 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <article class="entry mb-md-5 mb-lg-0 mb-xl-0">
                            <div class="entry-img mb-4">
                                <img src="https://pmc.ph/app/static/image/6.jpg" alt="2022-top-madrid-protocol" class="img-fluid">
                            </div>

                            <h2 class="fs-4 fw-bold mb-2 p-0">
                                <a href="#">2022 Top Madrid Protocol Filer</a>
                            </h2>

                            <div class="entry-meta mb-3">
                                <i class="bi bi-clock"></i> <a href="#" class="text-muted d-print-inline-block lh-1"><time datetime="2020-01-01">May 04,2023</time></a>
                            </div>

                            <div class="lh-base">
                                <p>
                                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                                Et eveniet enim... <a href="#" class="text-decoration-underline">Read More</a>
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-12 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <article class="entry mb-md-5 mb-lg-0 mb-xl-0">
                            <div class="entry-img mb-4">
                                <img src="https://pmc.ph/app/static/image/8.jpg" alt="28th-annual-convention" class="img-fluid">
                            </div>

                            <h2 class="fs-4 fw-bold mb-2 p-0">
                                <a href="#">28th Annual Convention</a>
                            </h2>

                            <div class="entry-meta mb-3">
                                <i class="bi bi-clock"></i> <a href="#" class="text-muted d-print-inline-block lh-1 fs-6"><time datetime="2020-01-01">May 26,2023</time></a>
                            </div>

                            <div class="lh-base">
                                <p>
                                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta... <a href="#" class="text-decoration-underline">Read More</a>
                                </p>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </section>

        <section id="contact" class="contact contact-section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 my-lg-auto">
                        <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>200 C. Raymundo Avenue Caniogan, Pasig City 1606 Philippines</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@pmc.ph</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+63 (2) 8656 6888 / +63 (969) 3156888</p>
                        </div>

                        </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form action="controller/controller.email" method="post" class="php-email-form shadow" id="contactForm">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Full Name">
                                        <label>Your Full Name</label>
                                    </div>
                                    <p class="invalid-message" id="name-error"></p>
                                </div>

                            
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="contact" id="contact_number" placeholder="Contact Number">
                                        <label>Contact Number</label>
                                    </div>
                                    <p class="invalid-message" id="contact-error"></p>
                                </div>
                            </div>

                            <div class="row mt-0 mt-md-3">
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                        <label>Email Address</label>
                                    </div>
                                    <p class="invalid-message" id="email-error"></p>
                                </div>

                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="Confirm your email">
                                        <label>Confirm your email</label>
                                    </div>
                                    <p class="invalid-message" id="confirm_email-error"></p>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    <label>Subject</label>
                                </div>
                                <p class="invalid-message" id="subject-error"></p>
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="message" rows="4" cols="50"></textarea>
                                    <label>Message</label>
                                </div>
                                <p class="invalid-message" id="message-error"></p>
                            </div>

                            <div class="form-group mt-3">
                                <p class="text-secondary fs-6">Please type this <span class="fw-semibold" id="captcha_ref"><?= $captcha; ?></span> to proceed</p>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="captcha" id="captcha">
                                    <label>Captcha</label>
                                </div>
                                <p class="invalid-message" id="captcha-error"></p>
                            </div>

                            <div class="text-center mt-3"><button type="submit"><i class="bi bi-send me-1"></i> Send Message</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <script src="assets/js/contact.js"></script>

    <?php include 'components/footer.php'; ?>
</body>

</html>