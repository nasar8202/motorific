<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <title>Registration Complete</title>  -->
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Css -->
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;   
        }
        body{
            font-family: 'Poppins', sans-serif;
        }
        main * {
            text-align: left !important;
        }
        </style>
    <!-- End -->
</head>
<body>
    <main style="margin: 0 20px;">
        <table cellpadding="0" cellspacing="0" border="0" width="67%" style="margin: 30px auto 0">
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 0px;">
                        <tr>
                            <td class="logo" style="font-size: 30px; font-weight: 700; text-align: center; ">
                                <a style="color: black; text-decoration: none; " href="{{route('index')}}">motorific</a><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="title-name" style="font-size: 30px; font-weight: 700; color: #7977a2; text-align: center">Hi {{ ucwords($data['name']) }}!</h3>
                                <p style="text-align: center">Your Vehicle details have been successfully received for valuation.</p>
                                <!-- <p>team to review</p> -->
                                <h3 class="title-name" style="font-size: 30px; font-weight: 700; color: #7977a2; text-align: center">Car Details</h3>
                                <div style="text-align: center; margin-top: 20px;">
                                    <img src="../Downloads/webbanner1.png" width="280PX" height="210px" style="object-fit: cover;" alt="Vehicle Image">
                                </div>
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td >
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tr>
                                        <td  style="text-align: center;"><strong>Model:</strong><p style="display: inline-block; margin-left: 10px; font-size: 15px;">{{ $data['vehicle_name'] }}</p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"><strong>Reg:</strong><p style="display: inline-block; margin-left: 10px; font-size: 15px;">{{ strtoupper($data['vehicle_registration']) }} </p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"><strong>Mileage:</strong><p style="display: inline-block; margin-left: 10px; font-size: 15px;">{{ $data['vehicle_mileage'] }} </p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"><strong>Car Age:</strong><p style="display: inline-block; margin-left: 10px; font-size: 15px;"> {{ $data['age'] }} </p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"><strong>Color:</strong><p style="display: inline-block; margin-left: 10px; font-size: 15px;">{{ $data['colour'] }} </p></td>
                                    </tr>
                                </table>
                            </td>
                           
                        </tr>
                        
                        <tr>
                            <br><br>
                            <td colspan="2">
                                <h3 style="font-weight: 700; font-size: 18px; color: #7977a2; margin-top: 30px; text-align: center;">The Next Step:</h3>
                                <p style="font-size: 16px; margin: 10px 0; text-align: center; ">Your valuation is being worked on by Motorific experts valuation team.
                                    The tools we use as industry experts will ensure you receive the best, genuine price for your car in today's market.</p>
                                <h4 style="margin-bottom: 30px; text-align: center;">Want your valuation sooner?</h4>
                                <p style="text-align: center; display: block; margin-right: auto; max-width: fit-content;     padding: 6px 11px;     font-size: 12px; background: #05eab5; color: #000; font-weight: 700;">Give us a call at <a style="color: #000; text-decoration: none" href="tel:447593839364">+44 7593 839364</a>.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
           
        </table>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style=" padding: 15px; background: #7977a2; margin-top: 80px;">
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" border="0" width="90%" style="margin: 0 auto">
                        <tr>
                            <td>
                                <p style="color: #fff; font-size: 14px;">© <?php echo date("Y"); ?> Motorific Online Ltd, All rights reserved. Company number 14710738 Motorific Online Ltd is registered in England & Wales. Trading Address: 55 Armory way London SW18 1JZ.</p>
                                <ul>
                                    <li style="list-style: none;"><a style="font-size: 14px; font-weight: 600; color: #fff;     text-decoration: none;"  href="{{route('index')}}">www.motorific.co.uk</a></li>
                                    <li style="list-style: none;"><a style="font-size: 14px; font-weight: 600; color: #fff;     text-decoration: none;" href="mailto:info@motorific.co.uk">info@motorific.co.uk</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!-- Uncomment if you want to include social media links -->
                                <!-- <ul class="footer-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul> -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </main>    
</body>
</html>