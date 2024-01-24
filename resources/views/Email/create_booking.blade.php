
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        
        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }
        body,table,td,a {-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;}
        table,td {mso-table-lspace: 0pt;mso-table-rspace: 0pt;}
        table {border-collapse: collapse !important;}
        img {-ms-interpolation-mode: bicubic;}
        img {border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        div[style*="margin: 16px 0;"] {margin: 0 !important;}
        @media screen and (max-width: 480px) {
            .mobile-hide {display: none !important;}
            .mobile-center {text-align: center !important;}
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Booking! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">Hey , {{$name}} </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">Thank you for your booking .</p>
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">Your booking has been placed with Booking ID :  <span style="font-size: 12px; font-weight: 800; line-height: 24px; color: #777777;">{{$bid}}</span> and it will be processed as soon as possible by the admin.</p>

                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">To track booking status : Log-in to your account > select Bookings from Menu > Search booking with id <span style="font-size: 12px; font-weight: 800; line-height: 24px; color: #777777;">{{$bid}}</span> > Click on Booking .
                                        </p>
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">You will get an booking confirmation email from admin soon .
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center">
                                        <img src="{{$logo}}" width="37" height="37" style="display: block; border: 0px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                        <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">{{$app_name}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;"> If you didn't booked a service OR you are not registered using this email address, please ignore this email</a>.</p>
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