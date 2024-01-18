<?php
class WarrantyTemplate {
    public function warrantyContent($name, $contact, $email, $address, $product_item, $user_age, $purchase_from, $item_price, $purchase_date, $serial, $aware_in, $influence_by, $rate, $satisfaction) {
        $content = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PMC - Contact Us</title>
            <style>
                html,
                body,
                table,
                tbody,
                tr,
                td,
                div,
                p,
                ul,
                ol,
                li,
                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    margin: 0;
                    padding: 0;
                }
                body {
                    margin: 0;
                    padding: 0;
                    font-size: 0;
                    line-height: 0;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                }
                table {
                    border-spacing: 0;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                }
                table td {
                    border-collapse: collapse;
                }
                .ExternalClass {
                    width: 100%;
                }
                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                    line-height: 100%;
                }
                /* Outermost container in Outlook.com */
                .ReadMsgBody {
                    width: 100%;
                }
                img {
                    -ms-interpolation-mode: bicubic;
                }
                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    font-family: Arial;
                }
                h1 {
                    font-size: 28px;
                    line-height: 32px;
                    padding-top: 10px;
                    padding-bottom: 24px;
                }
                h2 {
                    font-size: 24px;
                    line-height: 28px;
                    padding-top: 10px;
                    padding-bottom: 20px;
                }
                h3 {
                    font-size: 20px;
                    line-height: 24px;
                    padding-top: 10px;
                    padding-bottom: 16px;
                }
                p {
                    font-size: 14px;
                    line-height: 20px;
                    font-family: Georgia, Arial, sans-serif;
                }
                </style>
                <style>
                    
                .container600 {
                    width: 600px;
                    max-width: 100%;
                }
                @media all and (max-width: 599px) {
                    .container600 {
                        width: 100% !important;
                    }
                }
            </style>
        </head>
        <body style="background-color:#F4F4F4;">
            <center>
                <table class="container600" cellpadding="0" cellspacing="0" border="0" width="100%" style="width:calc(100%);max-width:calc(440px);margin: 0 auto;">
                    <tr>
                        <td width="100%" style="text-align: left;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                                <tr>
                                    <td style="background-color:#FFFFFF;color:#000000;padding:15px 25px;">
                                        <img alt="Progressive Medical Corporation" src="http://pmc.ph/assets/logo.png" width="150" style="display: block; margin: auto" />
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                                <tr>
                                    <td style="padding:0% 20px;background-color:#F8F7F0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                                            <thead>
                                            <tr>
                                                <td scope="col" style="color: #666; padding:15px; font-family: Arial,sans-serif; font-size: 18px; line-height:20px;text-align: center;"><b>Warranty Registration</b></td>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td scope="col" style="color: #666; padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;"><b>Customer Information</b></td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" style="color: #666; padding:5px; font-family: Arial,sans-serif; font-size: 14px; line-height:20px;">
                                                        <b>Customer Name</b><br>
                                                        '. $name .'<br><br>
                                                        <b>Mobile / Phone</b><br>
                                                        '. $contact .'<br><br>
                                                        <b>Email Address</b><br>
                                                        '. $email .'<br><br>
                                                        <b>Customer Address</b><br>
                                                        '. $address .'<br><br>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td scope="col" style="color: #666; padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;line-height:30px;"><b>Product Information</b></td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" style="color: #666; padding:5px; font-family: Arial,sans-serif; font-size: 14px; line-height:20px;">
                                                        <b>Product / Item</b><br>
                                                        '. $product_item .'<br><br>
                                                        <b>End user age bracker</b><br>
                                                        '. $user_age .'<br><br>
                                                        <b>Purchase from</b><br>
                                                        '. $purchase_from .'<br><br>
                                                        <b>Purchase price</b><br>
                                                        &#8369; '. number_format($item_price, 2, '.', ',') .'<br><br>
                                                        <b>Purchase date</b><br>
                                                        '. $purchase_date .'<br><br>
                                                        <b>Serial number</b><br>
                                                        '. $serial .'<br><br>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td scope="col" style="color: #666; padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;line-height:30px;"><b>Quick Survey</b></td>
                                                </tr>

                                                <tr>
                                                    <td valign="middle" style="color: #666; padding:5px; font-family: Arial,sans-serif; font-size: 14px; line-height:20px;">
                                                        <b>How did you first become aware of PMC Products?</b><br>
                                                        '. $aware_in .'<br><br>
                                                        <b>What factor influenced you to purchase products from us?</b><br>
                                                        '. $influence_by .'<br><br>
                                                        <b>How would you rate the packaging of our products ?</b><br>
                                                        '. $rate .'<br><br>
                                                        <b>Overall, how satisfied are you with the products and services that we provide?</b><br>
                                                        '. $satisfaction .'<br><br>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                                <tr>
                                    <td width="100%" style="min-width:100%;background-color:#00276c;color:#FFFFFF;padding:24px;">
                                        <p style="font-size:12px;line-height:20px;font-family:Arial,sans-serif;text-align:center;">Progressive Medical Corporation</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </body>
        </html>
        ';
        return $content;
    }
}

?>