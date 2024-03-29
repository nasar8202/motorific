<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Forget Password</title> --}}
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
            max-width: 75vw;
            margin: 0 auto;
        }
        /* Header  */
        header.header {
            padding: 15px 0;
            text-align: center;
            background: #7977a2;
        }

        header.header .logo a {
            font-size: 30px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
        }

        header.header .logo {
            margin: 0;
        }

        /* End */

        /* Main Content */
        .cont-main {
            max-width: 50vw;
            margin: 0 auto;
            text-align: center;
        }

        .main-content {
            padding: 65px 0;
        }

        .congt-box h3 {
            margin-bottom: 20px;
            font-size: 26px;
        }

        /* End */

        /* Footer */
        footer.footer {
            padding: 15px 0;
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


        /* End */

        /* Responsive */
        @media(max-width:991px){
            .cont-main {
                max-width: 70vw;
            }
            .congt-box h3 {
                font-size: 20px;
            }

            .congt-msg {
                font-size: 14px;
            }

            .price {
                font-size: 26px;
                margin: 24px auto;
            }

            .accept-msg {
                font-size: 14px;
            }

            .prim-btn {
                font-size: 14px;
            }

            .tos-box {
                padding: 30px 20px;
            }

            .tos-box h2 {
                font-size: 18px;
            }

            .tos-box p {
                font-size: 14px;
            }
            .icon {
                font-size: 55px;
            }
        }

        @media(max-width:767px){
            .congt-box h3 {
                font-size: 18px;
            }

            .congt-msg {
                font-size: 12px;
            }

            .price {
                font-size: 20px;
                margin: 20px auto;
            }

            .accept-msg {
                font-size: 12px;
            }

            .prim-btn {
                font-size: 13px;
            }

            .tos-box h2 {
                font-size: 16px;
            }

            .tos-box p {
                font-size: 12px;
            }

            .main-content {
                padding: 40px 0;
            }

            .footer-addr p {
                font-size: 12px;
            }

            .footer-addr ul li a {
                font-size: 12px;
            }

            .container {
                max-width: 90vw;
            }

            .footer-social {
                gap: 15px;
            }

            .footer-social li a {
                width: 35px;
                height: 35px;
                border-width: 2px;
            }
            .icon {
                font-size: 45px;
            }


        }

        @media(max-width:575px){
            .cont-main {
                max-width: 85vw;
            }
            header.header .logo a {
                font-size: 24px;
            }

            header.header {
                padding: 12px 0;
            }

            .main-content {
                padding: 30px 0 40px;
            }

        }

        /* End */
    </style>
    <!-- End -->
</head>
<body>
    <main>
        <header class="header">
            <div class="container">
                <h2 class="logo"><a href="{{route('index')}}">motorific</a></h2>
            </div>
        </header>

        <div class="main-content">
            <div class="container">
                <div class="cont-main">
                    <div class="congt-box forget-pass">
                        <div class="icon">
                            <i class="fas fa-unlock-alt"></i>
                        </div>
                        <h3>Forget Password Email</h3>
                        <p class="congt-msg"> You can reset password from below link</p>
                        <a href="{{ route('reset.password.get', $token) }}" class="prim-btn green-btn">RESET PASSWORD</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="footer-wraper">
                    <div class="footer-addr">
                        <p>
                            <?php echo date("Y"); ?>
                            Motorific Online Ltd, All rights reserved. Company number 14710738 Motorific Online Ltd is registered in England & Wales. Trading Address: 55 Armory way London SW18 1JZ.<br />
                            
                        </p>
                        <ul>
                            <li><a href="{{route('index')}}">www.motorific.co.uk</a></li>
                            <li><a href="mailto:info@motorific.co.uk">info@motorific.co.uk</a></li>
                        </ul>
                    </div>
                    {{-- <ul class="footer-social">
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    </ul> --}}
                </div>
            </div>
        </footer>
    </main>    
</body>
</html>