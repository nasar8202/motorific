<!DOCTYPE html>
<html lang="en">

<head>
    <?php $currentUrl = url()->full();?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="Uhn45gp6a7f2vzRBJ3kAYDPiA1mgia0KtWeC9jvz5vU" />
    <link rel="canonical" href="<?php echo $currentUrl?>" defer>
    <link rel="icon" href="{{ URL::asset('frontend/seller/assets/image/M-Logo.png') }}" type="image/x-icon" defer>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/e770fec82c.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP-5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Slick Css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" >
    <!--Slick Css End-->
    <!-- CUSTOM-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/custom.css') }}">
    <!-- RESPONSIVE-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/responsive-new.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <title>Motorific- @yield('title')</title>
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="9b7b3e4b-5288-4bfc-b8c6-a9f4aee2d92a" data-blockingmode="auto" type="text/javascript"></script>
    <script id="CookieDeclaration" src="https://consent.cookiebot.com/9b7b3e4b-5288-4bfc-b8c6-a9f4aee2d92a/cd.js" type="text/javascript" async></script>

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KJ4758N');</script>

            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJ4758N"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- Google tag (gtag.js) -->
            <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-T31HYRPFV9"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-T31HYRPFV9');
            </script> -->

           <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-C2YY4GLBSW"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-C2YY4GLBSW');
            </script>
</head>



<body>
<!--<body onload="move()" id="contentBody">-->
    <div id="myProgress">
        <div class="loader-img">
            <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}">
        </div>
    </div>
    
    
    
<main id="loadedPage">
    <!-- HEADER -->
    
    <header class="@yield('headerClass')">
        <div class="@yield('ContainerHeader')">
            <div class="logo-navlinks d-flex align-items-center">
                <a href="{{ route('index') }}"><img src="@yield('logoMain')" alt=""></a>
                <ul class="navlinks mb-0 align-items-center @yield('headerUlClass') ">
                    <a href="{{ route('sellMyCar') }}">
                        <li>Sell My Car</li>
                    </a>
                    <a href="{{ route('howItWorksforSeller') }}">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('reviews') }}">
                        <li>Reviews</li>
                    </a>
                    {{-- <a href="#">
                        <li>Help</li>
                    </a> --}}
                    @auth

                    @endauth

                    @guest
                        <div class="dropdown">
                            <span>More</span>
                            <div class="dropdown-content">

                                <a href="{{ route('dealer.newDashboard')  }}" target="_blank">For Dealers</a>
                            </div>
                        </div>
                    @endguest
                </ul>
            </div>

            <div class="head-btns  justify-content-between">
                @guest
                    <button>
                       <a href="{{ route('myLogin') }}"> 
                           Sign In
                        </a>
                    </button>
                    @if (Route::has('register'))
                        <button>
                           <a href="{{ route('registration') }}"> 
                            Sign Up
                            </a>
                        </button>
                    @endif
                @else
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('acceptedVehicles') }}">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>

                @endguest

                <button>
                    <a onclick="window.location='{{ url('/get-in-touch') }}'">
                        Contact Us
                    </a>
                </button>
            </div>
            <div class="menu">
                <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="navi">
                    <ul>
                        <li class="logoMob">
                            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}"
                            alt=""></a>
                        </li>
                        <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                        <li>
                            <a href="{{ route('howItWorksforSeller') }}">How It Works</a>
                        </li>
                        <li>
                            <a href="{{ route('reviews') }}">Reviews</a>
                        </li>
                     
                          
                        {{-- <li>
                            <a href="#">Help</a>
                        </li> --}}
                          <li>
                            <a onclick="window.location='{{ url('/get-in-touch') }}'">Contact Us</a>
                        </li>
                        @guest
                        <li><a href="{{ route('myLogin') }}">Sign In</a></li>
                        
                            <li><a href="{{ route('registration') }}">Sign Up</a></li>
                            
                            @endguest
                        @if(Auth::check())
                        <button id="navbarDropdown" class="nav-link dropdown-toggle userPro-btn" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </button>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('acceptedVehicles') }}">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                    @endif
                        @guest
                            <li> <a href="{{ route('dealer.newDashboard')  }}" target="_blank">For Dealers</a>

                            </li>
                        @endguest
                    </ul>
                </div>
        </div>
            </div>
        </div>
    </header>

    @yield('section')

    <!-- FOOTER -->

    
    <!-- FOOTER -->

    <section class="footer-sec">
        <div class="container-1151">
            <div class="main-footer">
                <div class="footer-sub about">
                    <h5>About</h5>
                    <ul>
                        <li>
                            
                            <a href="{{route('aboutUs')}}">About us</a>
                        </li>
                        <li><a href="{{ route('dealer.newDashboard') }}">For Dealers </a></li>
                        <li>
                            <a href="{{route('GetInTouchSellerForm')}}">Contact us</a>
                        </li>
                        <a href="{{route('help')}}">
                            <li>Help</li>
                        </a>
                        <li href="#">
                            <a href="{{route('careers')}}">Careers</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-sub product">
                    <h5>Product</h5>
                    <ul>
                        <li>
                            <a href="{{route('sellMyCar')}}">Sell my car</a>
                        </li>
                        <li>
                            <a href="{{route('CarValueTracker')}}">Car Value Tracker</a>
                        </li>
                        <li>
                            <a href="{{route('CarBuyer')}}">Car buyers</a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="">Cash for cars</a>-->
                        <!--</li>-->
                        <li>
                            <a href="{{route('SellMyCarOnFinance')}}">Sell My Car On Finance</a>
                        </li>
                        <li>
                            <a href="{{route('CarValuation')}}">Car Valuation</a>
                        </li>
                        <li>
                            <a href="{{route('whoWillBuyMyCar')}}">Who will buy my car?</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-sub product-2">
                    <ul>
                        <li>
                            <a href="{{route('CarBuyingSites')}}">Car buying sites</a>
                        </li>
                        <li>
                            <a href="{{route('sellToADealer')}}">Sell to a dealer</a>
                        </li>
                        <li>
                            <a href="{{route('sellMyElectricCars')}}">Sell my electric car</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-sub contact">
                    <div>
                        <h5>Whatsapp</h5>
                        <p><a href="https://api.whatsapp.com/send?phone=+447593839364">+44 7593 839364</a></p>
                    </div>
                    <div>
                        <h5>Customer Support </h5>
                        <p><a href="tel:+447593839364"> +44 7593 839364 </a></p>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <p><a href="mailto:info@motorific.co.uk"> info@motorific.co.uk </a></p>
                    </div>
                </div>
                <div class="footer-sub contact-2">
                <a href="{{ route('index') }}"> <img src="{{ URL::asset('frontend/seller/assets/image/logo.png')}}" alt=""></a>
                    <!--<div class="d-flex mt-4 mb-4">-->
                    <!--    <a href="#">-->
                    <!--        <div class="footer-icon-bg"><i class="fa-brands fa-twitter"></i></div>-->
                    <!--    </a>-->
                    <!--    <a href="https://www.facebook.com/Motorific-100480046330830">-->
                    <!--        <div class="footer-icon-bg"><i class="fa-brands fa-facebook-f"></i></div>-->
                    <!--    </a>-->
                    <!--    <a href="https://www.instagram.com/motorific_1/">-->
                    <!--        <div class="footer-icon-bg"><i class="fa-brands fa-instagram"></i></div>-->
                    <!--    </a>-->
                    <!--</div>-->
                    <ul class="footer-social my-3">
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/Motorific-100480046330830"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/motorific_1/"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                    <h4>© Motorific Online Ltd. <?php echo date("Y"); ?></h4>
                </div>
            </div>
        </div>
    </section>


</main>

    <!--<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>-->
    <script src="{{ URL::asset('frontend/seller/assets/jquery-3.6.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Slick Js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!--End-->
    
    <script src="{{ URL::asset('frontend/seller/assets/script.js') }}"></script>
    
    @stack('child-scripts')
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js" > </script>
<script>
     @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
        @endif
</script>
