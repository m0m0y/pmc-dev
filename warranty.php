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
                    <h2>Warranty Form</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Warranty</li>
                    </ol>
                </div>
            </div>
        </section>


        <section id="warranty-form" class="warranty-form">
            <div class="container">

                <form action="controller/controller.warranty.php" method="post" id="warrant-form">
                    <div class="mb-5 pb-md-5">
                        <h3 class="fw-semibold mb-3 mb-md-4">Contact Information</h3>

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-4 mb-4">

                            <div class="col">
                                <label>Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Complete Name" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="name-error"></p>
                            </div>

                            <div class="col">
                                <label>Mobile / Phone Number</label>
                                <input type="number" name="contact" id="contact" class="form-control" placeholder="09xx xxx xxxx" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="contact-error"></p>
                            </div>

                            <div class="col">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="example@email.com" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="email-error"></p>
                            </div>

                            <div class="col">
                                <label>Confirm Email</label>
                                <input type="email" name="confirm_email" id="confirm_email" class="form-control" placeholder="example@email.com" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="confirm_email-error"></p>
                            </div>

                        </div>

                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 mb-4">
                            <div class="col">
                                <label>Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Type Complete Address" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="address-error"></p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5 pb-md-5">
                        <h3 class="fw-semibold mb-3 mb-md-4">Product Information</h3>

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-4 mb-4">

                            <div class="col">
                                <label class="mb-2 mb-md-0">Product / Item</label>
                                <select class="form-select" name="product_item" id="product_item">
                                    <option value="" selected>--- Select product here ---</option>
                                    <option value="CleanSpace2 Power System">CleanSpace2 Power System</option>
                                    <option value="CleanSpace HALO Power Unit">CleanSpace HALO Power Unit</option>
                                </select>
                                <p class="invalid-message" id="product_item-error"></p>
                            </div>

                            <div class="col">
                                <label class="mb-2 mb-md-0">End user's age bracket</label>
                                <select class="form-select" name="user_age" id="user_age">
                                    <option value="0-2 years old">0-2 years old</option>
                                    <option value="3-12 years old">3-12 years old</option>
                                    <option value="13-20 years old">13-20 years old</option>
                                    <option value="21-39 years old">21-39 years old</option>
                                    <option value="40-59 years old">40-59 years old</option>
                                    <option value="60 years old">60 years old</option>
                                </select>
                            </div>

                        </div>

                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 mb-4">
                            <div class="col">
                                <label class="mb-2 mb-md-0">Purchase From</label>
                                <input type="text" name="purchase_from" id="purchase_from" class="form-control" placeholder="Website / Store etc." onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="purchase_from-error"></p>
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 mb-4">
                            <div class="col">
                                <label class="mb-2 mb-md-0">Purchase Price in Peso</label>
                                <input type="number" name="item_price" id="item_price" class="form-control" placeholder="Product Price" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="item_price-error"></p>
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 mb-4">
                            <div class="col">
                                <label class="mb-2 mb-md-0">Purchase Date</label>
                                <input type="date" name="purchase_date" id="purchase_date" class="form-control" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="purchase_date-error"></p>
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 mb-4">
                            <div class="col">
                                <label class="mb-2 mb-md-0">Purchase Serial Number</label>
                                <input type="number" name="serial" id="serial" class="form-control" placeholder="Serial Number" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="serial-error"></p>
                            </div>
                        </div>

                    </div>

                    <div class="mb-4">
                        <h3 class="fw-semibold mb-3 mb-md-4">Purchase Details</h3>

                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-4">

                            <div class="col">
                                <label class="mb-2 mb-md-0">How did you first become aware of PMC Products?</label>
                                <select class="form-select" name="aware_in" id="aware_in">
                                    <option value="Website">Website</option>
                                    <option value="Mall / Store">Mall / Store</option>
                                    <option value="Friend / Relative">Friend / Relative</option>
                                    <option value="Magazine / Newspaper">Magazine / Newspaper</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="mb-2 mb-md-0">What Factor(s) Influenced you to purchase Products from us?</label>
                                <select class="form-select" name="influence_by" id="influence_by">
                                    <option value="Flyers">Flyers</option>
                                    <option value="Brochures">Brochures</option>
                                    <option value="Internet">Internet</option>
                                    <option value="Low price / On Sale">Low price / On Sale</option>
                                    <option value="Bonus Item">Bonus Item</option>
                                    <option value="Style Appearance">Style Appearance</option>
                                    <option value="Previous Consumer">Previous Consumer of PMC Products</option>
                                    <option value="careers of our Product">careers of our Product</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="mb-2 mb-md-0">How would you rate the packaging of our products ?</label>
                                <select class="form-select" name="rate" id="rate">
                                    <option value="Good">Good</option>
                                    <option value="Poor">Poor</option>
                                </select>
                            </div>

                            <div class="col mb-3">
                                <label class="mb-2 mb-md-0">Overall, how satisfied are you with the products and services that we provide ?</label>
                                <select class="form-select" name="satisfaction" id="satisfaction">
                                    <option value="Very Satisfied">Very Satisfied</option>
                                    <option value="Satisfied">Satisfied</option>
                                    <option value="Not Satisfied">Not Satisfied</option>
                                </select>
                            </div>

                            <div class="col">
                                <p class="text-secondary fs-6">Please type this <span class="fw-semibold" id="captcha_ref"><?= $captcha; ?></span> to proceed</p>

                                <label>Captcha</label>
                                <input type="text" name="captcha" id="captcha" class="form-control" onkeyup="txtvalidator(this)">
                                <p class="invalid-message" id="captcha-error"></p>
                            </div>

                        </div>
                    </div>

                    <div class="mb-md-5"><button type="submit" class="form-button">Register Warranty</button></div>
                </form>

            </div>
        </section>
        
    </main>
    
    <script src="assets/js/warranty.js"></script>

    <?php include 'components/footer.php'; ?>

</body>

</html>
