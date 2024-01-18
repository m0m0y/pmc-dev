<?php

class mailTemplate {
    public function emailContent($name, $contact, $email, $message) {
      $content = '
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>CleanSpace - Contact Us</title>
        </head>
    
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
            font-size: 16px;
            line-height: 20px;
            font-family: Georgia, Arial, sans-serif;
          }
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
    
        <body style="background-color:#F4F4F4;padding:20px;">
          <center>
            <table class="container600" cellpadding="0" cellspacing="0" border="0" width="100%" style="width:calc(100%);max-width:calc(600px);margin: 0 auto; border: 1px solid #00000024;border-radius: 2px;">
              <tr>
                <td width="100%" style="text-align: left;">
                  <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                      <tr>
                          <td style="background-color:#FFFFFF;color:#000000;padding:30px;">
                              <img alt="PMC Logo" src="https://pmc.ph/app/static/image/logo.png" width="130" style="display: block; margin: auto" />
                          </td>
                      </tr>
                  </table>

                  <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                      <tr>
                          <td style="padding:20px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                                <thead>
                                <tr>
                                    <th scope="col" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;text-align:left;">Name:</th>
                                    <th scope="col" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;text-align:left;">'.$name.'</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Email:</td>
                                    <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">'.$email.'</td>
                                </tr>
                                <tr>
                                    <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Phone:</td>
                                    <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">'.$contact.'</td>
                                </tr>
                                <tr>
                                    <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Message:</td>
                                    <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">'.$message.'</td>
                                </tr>
                                </tbody>
                            </table>
                          </td>
                      </tr>
                  </table>
    
                  <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                    <tr> 
                      <td width="100%" style="color:#000;padding:2px;">
                        <p style="font-size:12px;line-height:20px;font-family: Arial,sans-serif;text-align:center;">© Progressive Medical Corporation 2022</p>
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