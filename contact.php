<?php 
include 'components/header.php'; 
include 'controller/captcha.php';

$random_strings = new RandomStrings();
$captcha = $random_strings->captcha();
?>

<body>
    <?php include 'components/navbar.php'; ?>

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Contact Us</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>
            </div>
        </section>

        <section id="contact" class="contact contact-page">
            <div class="container">

                <div class="message">
                    <h2 class="text-center">Send Us Email Directly</h2>
                    <p class="text-center">We love hearing from you</p>
                </div>
              
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
                        <form action="controller/controller.email.php" method="post" class="php-email-form shadow" id="contactForm">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Full Name" onkeyup="txtvalidator(this)">
                                        <label>Your Full Name</label>
                                    </div>
                                    <p class="invalid-message" id="name-error"></p>
                                </div>

                               
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact Number" onkeyup="txtvalidator(this)">
                                        <label>Contact Number</label>
                                    </div>
                                    <p class="invalid-message" id="contact-error"></p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" onkeyup="txtvalidator(this)">
                                        <label>Email Address</label>
                                    </div>
                                    <p class="invalid-message" id="email-error"></p>
                                </div>

                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="Confirm your email" onkeyup="txtvalidator(this)">
                                        <label>Confirm your email</label>
                                    </div>
                                    <p class="invalid-message" id="confirm_email-error"></p>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" onkeyup="txtvalidator(this)">
                                    <label>Subject</label>
                                </div>
                                <p class="invalid-message" id="subject-error"></p>
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="message" rows="5" onkeyup="txtvalidator(this)"></textarea>
                                    <label>Message</label>
                                </div>
                                <p class="invalid-message" id="message-error"></p>
                            </div>

                            <div class="form-group mt-3">
                                <p class="text-secondary fs-6">Please type this <span class="fw-semibold" id="captcha_ref"><?= $captcha; ?></span> to proceed</p>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="captcha" id="captcha" onkeyup="txtvalidator(this)">
                                    <label>Captcha</label>
                                </div>
                                <p class="invalid-message" id="captcha-error"></p>
                            </div>

                            <div class="text-center mt-4"><button type="submit"><i class="bi bi-send me-1"></i> Send Message</button></div>
                            
                        </form>
                    </div>

                </div>

            </div>
        </section>

        <section id="products" class="products product-link">
            <div class="container position-relative">
                <h6 data-aos="fade-right" data-aos-delay="100">Products</h6>
                <a href="#!">
                    <h3 class="display-6 fw-semibold" data-aos="fade-right" data-aos-delay="200">Browse Our Products <i class="bi bi-arrow-right" id="arrow-right"></i></h3>
                </a>
                <div class="blop"></div>
            </div>
        </section>
    
    </main>

    <script src="assets/js/contact.js"></script>

    <?php include 'components/footer.php'; ?>

</body>

</html>