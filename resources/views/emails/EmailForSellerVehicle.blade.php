<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Registration Complete</title> -->
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
        .container{
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }
        /* Header  */
        header.header {
            padding: 15px 0;
            text-align: center;
            background: #fff;
        }

        header.header .logo a {
            font-size: 30px;
            font-weight: 700;
            color: black;
            text-decoration: none;
        }

        header.header .title-name  {
            font-size: 30px;
            font-weight: 700;
            color: #7977a2;
            text-decoration: none;
        }

        header.header .logo {
            margin: 0;
        }

        /* End */

        /* Main Content */
        .cont-main {
            max-width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .main-content {
            padding: 8% 0;
        }

        .congt-box h3 {
            margin-bottom: 20px;
            font-size: 26px;
        }

        /* End */

        /* Footer */
        footer.footer {
            padding: 15px;
            background: #7977a2;
        }

        .footer-wraper {
            display: flex;
            justify-content: space-between;
        }

        .footer-addr p {
            font-size: 14px;
            color: #fff;
        }

        .footer-addr ul {
            list-style: none;
        }

        .footer-addr ul li a {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
        }

        .footer-social {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .footer-social li a {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #ffffff;
            border-radius: 50%;
            font-size: 14px;
            border: 3px solid #ffffff;
            transition: all .3s ease-in;
            opacity: .4;
        }

        .footer-social li a:hover {
            opacity: 1;
            background: #fff;
            color: #7977a2;
        }
        .price {
            font-size: 30px;
            padding: 4px 40px;
            max-width: fit-content;
            margin: 30px auto;
            background: #05eab5;
        }

        .accept-msg {
            font-weight: 600;
            max-width: 580px;
            margin: 0 auto;
        }

        .prim-btn {
            font-weight: 600;
            padding: 8px 30px;
            background: #7977a2;
            display: inline-block;
            text-decoration: none;
            color: #fff;
            margin: 30px 0;
        }

        .prim-btn span {
            margin-left: 8px;
            transition: all .3s ease-in;
        }
        .prim-btn:hover span {
            margin-left: 0;
        }
        .tos-box h2 {
            margin-bottom: 15px;
            font-size: 20px;
        }
        .tos-box {
            max-width: 600px;
            background: #05eab559;
            margin: 0 auto;
            padding: 40px 20px;
            border-radius: 12px;
        }
        .icon {
            font-size: 70px;
            color: #05eab5;
        }
        .green-btn {
            background: #05eab5;
            color: #000;
            font-weight: 700;
        }
        .forget-pass h3 {
            margin-bottom: 8px;
        }

        .forget-pass .green-btn {
            margin-top: 20px;
        }
        ul.site-links {
            list-style: none;
            margin-top: 15px;
        }

        ul.site-links li a {
            text-decoration: none;
            color: #000;
        }
        .unsub .prim-btn {
            margin-bottom: 0;
        }
        .cont-main.unsub {
            text-align: left;
        }

        ul.reg-detail {
            list-style: none;
        }

        ul.reg-detail li span {
            font-weight: 700;
            margin-right: 15px;
            width: 80px;
            display: inline-block;
        }

        ul.reg-detail li {
            margin-bottom: 0;
            border: 1px solid;
            padding: 5px;
        }

        .cont-main.unsub h4 {
            margin-top: 15px;
        }

        .veh-detail .congt-box {
            display: block;
            align-items: center;
            justify-content: space-between;
            max-width: 85%;
            flex-wrap: wrap;
            margin: 0 auto;
        }

        .veh-detail .congt-box .veh-img {
            width: 100%;
            max-width: 20vw;
            height: 12vw;
        }

        .veh-detail .congt-box .veh-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .veh-text {
            max-width: 100%;
            margin-top: 15px;
        }

        .veh-text h5 {
            font-weight: 700;
            font-size: 18px;
            color: #7977a2;
            margin: 0;
            margin-bottom: 10px;
        }

        .veh-text p {
            font-size: 15px;
            margin: .95vw 0;
        }

        .veh-text h6 {
            font-size: 16px;
        }
        .veh-text a.prim-btn {
            padding: 6px 11px;
            font-size: 14px;
        }

        .unsub.veh-detail .prim-btn {
            margin-left: auto;
            margin-right: auto;
            display: block;
            max-width: fit-content;
        }

        /* End */

        

        /* End */
    </style>
    <!-- End -->
</head>
<body>
    <main>
        <header class="header veh-dt">
            <div class="container">
                <h2 class="logo"><a href="{{route('index')}}">motorific</a></h2>
                <br>
                <h3 class="title-name">Hi {{ ucwords($vehicle_details['name']) }}!</h3>
                <p>Your Vehicle details have been  successfully recieved for valuation</p>
                 <!-- <p>team to  review</p>  -->
                <h3 class="title-name">Car Details</h3>
            </div>
        </header>

        <div class="main-content">
            <div class="container">
                <div class="cont-main  unsub veh-detail">
                    
                    <div class="congt-box">
                        
                        <ul class="reg-detail">
                            <li><span>Model:</span> {{ $vehicle_details['vehicle_name'] }} </li>
                            <li><span>Reg:</span> {{ strtoupper($vehicle_details['vehicle_registration']) }}</li>
                            <li><span>Mileage:</span>{{ $vehicle_details['vehicle_mileage'] }}</li>
                            <li><span>Car Age:</span> {{ $vehicle_details['age'] }} </li>
                            <li><span>Color:</span>{{ $vehicle_details['colour'] }}</li>
                        </ul>
                        
                        <div class="veh-text">
                            <h5>The Next Step?</h5>
                            <p>Your valuation is being worked on by Motorific experts valuation team.
                                The tools we use as industry experts will ensure you receive the best, genuine price for your car in today's market.</p>
                            <h6>Want your valuation sooner?</h6>
                            <a href="tel:447593839364" class="prim-btn green-btn">Give us a call: +44 7593 839364</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="footer-wraper">
                    <div class="footer-addr">
                        <p>©
                            <?php echo date("Y"); ?>
                            Motorific Online Ltd, All rights reserved. Company number 14710738 Motorific Online Ltd is registered in England & Wales. Trading Address: 55 Armory way London SW18 1JZ.<br />
                            
                        </p>
                        <ul>
                            <li><a href="{{route('index')}}">www.motorific.co.uk</a></li>
                            <li><a href="mailto:info@motorific.co.uk">info@motorific.co.uk</a></li>
                        </ul>
                    </div>
                     <!-- <ul class="footer-social">
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>  -->
                </div>
            </div>
        </footer>
    </main>    
</body>
</html>