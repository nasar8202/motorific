
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
              <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt="" width="300" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">thank you for registrating as a dealer with motorific </h1>
                    <p>we are checking your information and revert back to you if we require any further information</p>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Name : {{ $data['name'] }}</p>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Email : {{ $data['email'] }}</p>

                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="" style="color:#ee4c50;text-decoration:underline;">Motorofic</a></p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <span
                            >© <?php echo date("Y"); ?>
                            Motorific Online Ltd, All rights reserved. Company number 14710738 Motorific Online Ltd is registered in England & Wales. Trading Address: 55 Armory way London SW18 1JZ. <br />
                        
                          </span>
                        </td>
                        
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
         
        </table>
      </td>
    </tr>
  </table>
</body>
</html>

