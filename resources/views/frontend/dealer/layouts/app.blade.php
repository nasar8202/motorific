<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('frontend/seller/assets/image/M-Logo.png') }}" type="image/x-icon" defer>
    
    <!-- FONTAWESOME -->
    {{-- <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/fontawesome/all.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <script src="https://kit.fontawesome.com/e770fec82c.js" crossorigin="anonymous"></script> --}}

    <!-- BOOTSTRAP-5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CUSTOM-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/dealers/assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/dealers/assets/css/slick-theme.css') }}">
    <!-- RESPONSIVE-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/responsive.css') }}">


    <!-- CUSTOM-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/dealers/assets/css/style.css') }}">
    <!-- RESPONSIVE-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/dealers/assets/css/responsive.css') }}">


    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Motorific- @yield('title')</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Dragable Css -->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Css -->
    <style type="text/css">
        /*Background color*/
        #grad1 {
            padding-top: 100px;
            padding-bottom: 100px;
            border-bottom: 1px solid #e3e3e3;
            margin-bottom: 100px;
        }

        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E;
        }

        #msform input,
        #msform textarea,
        #msform select {
            padding: 0px 15px 0px 15px;
            border: 1px solid #ccc;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: poppins;
            font-size: 16px;
            letter-spacing: 1px;
            border-radius: 50px;
            height: 52px;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border-bottom: 2px solid #05eab5;
            outline-width: 0;
        }

        /*Blue Buttons*/
        #msform .action-button {
            width: auto;
            background: #05eab5;
            font-weight: bold;
            color: white;
            border: 0 none;
            cursor: pointer;
            padding: 10px 25px;
            margin: 10px 5px;
            border-radius: 50px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #05eab5;
        }

        /*Previous Buttons*/
        #msform .action-button-previous {
            width: auto;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            cursor: pointer;
            padding: 10px 25px;
            margin: 10px 5px;
            border-radius: 50px;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
        }

        /*Dropdown List Exp Date*/
        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px;
        }

        select.list-dt:focus {
            border-bottom: 2px solid #05eab5;
        }

        /*The background card*/
        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative;
        }

        /*FieldSet headings*/
        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
            padding-bottom: 10px;
            border-bottom: 2px solid #05eab5;
            display: inline-block;
            margin-bottom: 30px;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
        }

        #progressbar .active {
            color: #000000;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 33.33%;
            float: left;
            position: relative;
        }

        /*Icons in the ProgressBar*/
        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023";
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007";
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d";
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c";
        }

        /*ProgressBar before any progress*/
        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #05eab5;
        }

        /*Imaged Radio Buttons*/
        .radio-group {
            position: relative;
            margin-bottom: 25px;
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px;
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
        }

        /*Fit image in bootstrap div*/
        .fit-image {
            width: 100%;
            object-fit: cover;
        }

        #msform fieldset .form-card label {
            color: #363a50;
            font-weight: 500;
            text-transform: capitalize;
            position: relative;
            /* position: absolute; */
            padding-left: 12px;
            padding-bottom: 6px;
        }

        #msform .form-group.radio-group input {
            width: auto;
            display: none;
        }

        #msform .form-group.radio-group input+span {
            position: relative;
            padding-left: 30px;
        }

        #msform .form-group.radio-group input+span:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border: 2px solid #05eab5;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        #msform .form-group.radio-group input+span a {
            color: #05eab5;
            text-decoration: none;
        }

        #msform .form-group.radio-group input+span:after {
            position: absolute;
            left: 5px;
            top: 50%;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #05eab5;
            content: '';
            transform: translateY(-50%);
            opacity: 0;
            transition: all .3s linear 0s;
        }

        #msform fieldset .form-card label span {
            position: relative;
        }

        #msform .form-group.radio-group input:checked+span:after {
            opacity: 1;
        }

        .insideRadio {
            margin-top: 10px;
        }

        .insideRadio label {
            display: block;
            margin-bottom: 10px;
        }

        .absolutelabel {
            position: relative;
            flex: 0 0 calc(50% - 15px);
        }

        .absolutelabel label {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        #msform fieldset .form-card .absolutelabel>label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            width: 70px;
            background: #05eab5;
            height: 52px;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        #msform .absolutelabel input {
            margin-top: 24px;
            margin-bottom: 24px;
            padding-left: 80px;
        }

        .form-group.twoInOneLine>label {
            width: 100%;
            flex: 0 0 100%;
            margin-bottom: -14px;
        }

        .form-group.twoInOneLine {
            display: flex;
            flex-flow: wrap;
            align-items: center;
            justify-content: center;
        }

        .form-group.twoInOneLine>span {
            flex: 0 0 30px;
            text-align: center;
        }

        span.select2.select2-container {
            min-width: 100%;
            padding: 0px 15px 0px 15px;
            border: 1px solid #ccc;
            margin-bottom: 25px;
            margin-top: 2px;
            box-sizing: border-box;
            font-family: poppins;
            font-size: 16px;
            letter-spacing: 1px;
            border-radius: 50px;
            height: 52px;
        }

        span.select2.select2-container span.selection {
            width: 100%;
            height: 52px;
        }

        .select2-container .select2-selection--single {
            height: 52px;
            border: 0;
            background: transparent;
            line-height: 52px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 52px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            right: 15px;
            right: 1px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-top: 10px;
            border-left: 10px;
            border: solid black;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
        }

        .select2-container {
            min-width: 400px;
        }

        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option:before {
            content: "";
            display: inline-block;
            position: relative;
            height: 20px;
            width: 20px;
            border: 2px solid #e9e9e9;
            border-radius: 4px;
            background-color: #fff;
            margin-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option[aria-selected=true]:before {
            font-family: fontAwesome;
            content: "\f00c";
            color: #fff;
            background-color: #05eab5;
            border: 0;
            display: inline-block;
            padding-left: 3px;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #fff;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #eaeaeb;
            color: #272727;
        }

        .select2-container--default .select2-selection--multiple {
            margin-bottom: 10px;
        }

        .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-radius: 4px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #05eab5;
            border-width: 2px;
        }

        .select2-container--default .select2-selection--multiple {
            border-width: 2px;
        }

        .select2-container--open .select2-dropdown--below {

            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

        }

        .select2-selection .select2-selection--multiple:after {
            content: 'hhghgh';
        }

        /* select with icons badges single*/
        .select-icon .select2-selection__placeholder .badge {
            display: none;
        }

        .select-icon .placeholder {
            display: none;
        }

        .select-icon .select2-results__option:before,
        .select-icon .select2-results__option[aria-selected=true]:before {
            display: none !important;
            /* content: "" !important; */
        }

        .select-icon .select2-search--dropdown {
            display: none;
        }

        #msform .select2-container--default .select2-search--inline .select2-search__field {
            height: 52px;
            border: 0;
            background: transparent;
            line-height: 45px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            height: 52px;
            border: 0;
            background: transparent;
            padding: 0;
        }

        span.select2.select2-container {
            padding: 0;
        }

        .select2-container--default .select2-selection--multiple {
            background: transparent;
            border: 0;
        }

        textarea.select2-search__field {
            height: 0;
        }

        .select2-container .select2-selection--multiple .select2-selection__rendered {
            position: absolute;
            top: 8px;
            left: 10px;
            margin: 0;
        }

        select.js-select2.companyType+span {
            display: none;
        }

        button.btn-qa {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            color: #fff;
            background: #202543;
            border: none;
            outline: none;
            width: 100%;
            padding: 10px 20px;
            text-align: left;
        }

        button.btn-qa span:last-child {
            transform: rotate(0deg);
        }

        button.btn-qa:not(.collapsed) span:last-child {
            transform: rotate(180deg);
        }
    </style>
    <!--jQuery UI-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KJ4758N');</script>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJ4758N"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T31HYRPFV9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-T31HYRPFV9');
</script>
<body>
    <main>
        <!-- HEADER -->
        <style>
            a.disabled {
                pointer-events: none;
                cursor: default;
                opacity: .6;
                }
                .logo-text a{
                    text-decoration: none;
                    color: white
                }
        </style>
        <header class="header">
            <!--<h2 class="logo-text">motorific</h2>-->
            <div class="container-1400 position-relative">
                <div class="row header-nav-row align-items-center">
                    <div class="col-lg-2 d-lg-block d-none">
                        @if(Auth::check())
                        <h2 class="logoMain"><a  href="{{route('dealer.newDashboard')}}" class="d-block">motorific</a></h2>
                        @else
                        <h2 class="logoMain"><a  href="{{route('myLogin')}}" class="d-block">motorific</a></h2>
                        @endif
                    </div>
                    <div class="col-lg-7 desktop-header">
                        <div class="header-nav dflex-gap10">
                            @if(\Request::route()->getName() == 'dealer.newDashboard' || \Request::route()->getName() == 'dealer.dashboard' || \Request::route()->getName() == 'howItWorks' || \Request::route()->getName() == 'pricing' || \Request::route()->getName() == 'onlyCars' || \Request::route()->getName() == 'onlyVans' || \Request::route()->getName() == 'vehicle.vehicleDetail' || \Request::route()->getName() == 'vehicle.liveSell' || \Request::route()->getName() == 'buyItNow' || \Request::route()->getName() == 'dealerToDealer' || \Request::route()->getName() == 'myProfile'|| \Request::route()->getName() == 'dealersVehicleDetail' || \Request::route()->getName() == 'dealer.BidsAndOffers' || \Request::route()->getName() == 'bids.ActiveBiddedVehicle' || \Request::route()->getName() == 'bids.UnderBiddedOfferVehicle' || \Request::route()->getName() == 'bids.DidnotWinBiddedVehicle' || \Request::route()->getName() == 'dealer.PurchasesVehicle' || \Request::route()->getName() == 'bids.CompletedBiddedVehicle' || \Request::route()->getName() == 'bids.CancelledBiddedOfferVehicle' || \Request::route()->getName() == 'dealer.addVehicleToSellFromDealer' || \Request::route()->getName() == 'dealer.mediaCondition' || \Request::route()->getName() == 'dealer.vehicleAndDetails' || \Request::route()->getName() == 'dealer.vehicleListing' || \Request::route()->getName() == 'CompletedRequestedVehicle' || \Request::route()->getName() == 'CancelRequestedVehicle' || \Request::route()->getName() == 'myVehicles' || \Request::route()->getName() == 'orderOnMyVehicle'  || \Request::route()->getName() == 'sellerDetails' || \Request::route()->getName() == 'ownerDealerRequestedDetails' || \Request::route()->getName() == 'sellerRequestedDetails' || \Request::route()->getName() == 'dealer.vehicleAndDetailsPost')
                            <nav>
                                <ul>
                                    <li>
                                        <a  class="{{ Request::route()->getName() == 'dealer.dashboard'  ? 'active' : ''}}" href="{{route('dealer.dashboard')}}">
                                            Browse vehicles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('howItWorks')}}" class="{{ Request::route()->getName() == 'howItWorks'  ? 'active' : ''}}">
                                                How it works
                                        </a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a class="" href="javascript:void(0)">-->
                                    <!--            Reviews-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    <li>
                                        <a  href="{{route('pricing')}}" class="{{ Request::route()->getName() == 'pricing'  ? 'active' : ''}}">
                                                Pricing
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3 desktop-header user">
                        <div class="header-btns dealer">
                            <!--<button class="btn-mts" > Sign In </button>-->
                            <!--<button class="btn-mts"> Contact Us </button>-->

                            @guest

                            <button class="btn-mts header-btn "><a href="{{ route('signup') }}">Sign Up</a></button>
                            <button class="btn-mts header-btn "><a href="{{ route('DealerLogin') }}">Sign In</a></button>
                            @else

                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('bids.ActiveBiddedVehicle') }}">
                                    {{ __('Bids & offers') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('CompletedRequestedVehicle') }}">
                                    {{ __('Purchases') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('dealer.addVehicleToSellFromDealer') }}">
                                    {{ __('Add Vehicle To Sell') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('myVehicles') }}">
                                    {{ __('My Vehicles') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('myProfile') }}">
                                    {{ __('Edit Profile') }}
                                </a>
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
                        </div>
                    </div>
                </div>
                    <div class="col-12 mob-header">
                        

                        @if(Auth::check())
                        <h3><a  href="{{route('dealer.newDashboard')}}" class="d-block">motorific</a></h3>
                        @else
                        <h2 class="logoMain"><a  href="{{route('myLogin')}}" class="d-block">motorific</a></h2>
                        @endif

                        <div class="mob-header-nav dealer align-items-center">
                        @guest
                            <div class="userBtns">
                                <a href="{{ route('signup') }}">Sign Up</a>
                                <a href="{{ route('DealerLogin') }}">Sign In</a>
                            </div>
                            @else
                            
                            <button class="btn-icon toglleBtn">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                            @endguest
                        </div>
                    </div>
            </div>
            {{-- @dd(Request::route()->getName()) --}}
            @if(\Request::route()->getName() == 'dealer.addVehicleToSellFromDealer' || \Request::route()->getName() == 'dealer.mediaCondition' || \Request::route()->getName() == 'dealer.vehicleAndDetails' || \Request::route()->getName() == 'dealer.vehicleListing')

            <div class="container-1200">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="header-submenu d-flex">
                            <li>
                                <a href="{{ route('dealer.addVehicleToSellFromDealer') }}" class="{{ Request::route()->getName() == 'dealer.addVehicleToSellFromDealer'  ? 'active' : 'disabled'}}">
                                        Vehicle Lookup
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dealer.mediaCondition') }}" class="{{ Request::route()->getName() == 'dealer.mediaCondition'  ? 'active' : 'disabled' }} ">
                                        Media & Condition
                                </a>
                            </li>
                            <li>
                                <a  href="{{ route('dealer.vehicleListing') }}" class="{{ Request::route()->getName() == 'dealer.vehicleListing'  ? 'active' : 'disabled' }} ">
                                        Listing Details
                                </a>
                            </li>
                            <li>
                                <a  href="{{ route('dealer.vehicleAndDetails') }}" class="{{ Request::route()->getName() == 'dealer.vehicleAndDetails'  ? 'active' : 'disabled' }} ">
                                        Vehicle & Details
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </header>

        @yield('section')

        
        <!-- FOOTER -->
<footer class="footer-sec">
    <div class="container-1151">
        <div class="footer-wraper">
            <a href="{{route('dealer.newDashboard')}}" class="footer-logo">
                <img src="{{ URL::asset('frontend/seller/assets/image/logo.png')}}">
            </a>
            <ul class="footer-social">
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/Motorific-100480046330830"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/motorific_1/"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
            <div class="footer-links-wraper">
                <a href="{{route('index')}}" class="prim-btn">Motorific for sellers</a>
                <ul class="footer-links">
                    <li><a href="{{route('aboutUs')}}">About us</a></li>
                    <li><a href="{{route('GetInTouchSellerForm')}}">Contact us</a></li>
                    <li><a href="{{route('careers')}}">Careers</a></li>
                    <!--<li><a href="#">Terms</a></li>-->
                    <p class="cpyright-txt">© Motorific Online Ltd. <?php echo date("Y"); ?></h4></p>
                </ul>
            </div>
        </div>
    </div>
</footer>
        <!--<section class="sec-8">-->
        <!--        <div class="container-1151">-->
        <!--            <div class="main-footer">-->
        <!--                <div class="footer-sub about">-->
        <!--                    <h5>About</h5>-->
        <!--                    <ul>-->
        <!--                        <li>-->
                                    
        <!--                            <a href="{{route('aboutUs')}}">About us</a>-->
        <!--                        </li>-->
        <!--                        <li><a href="{{ route('dealer.newDashboard') }}">For Dealers </a></li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('GetInTouchSellerForm')}}">Contact us</a>-->
        <!--                        </li>-->
        <!--                        <a href="{{route('help')}}">-->
        <!--                            <li>Help</li>-->
        <!--                        </a>-->
        <!--                        <li href="#">-->
        <!--                            <a href="{{route('careers')}}">Careers</a>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--                <div class="footer-sub product">-->
        <!--                    <h5>Product</h5>-->
        <!--                    <ul>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('sellMyCar')}}">Sell my car</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('CarValueTracker')}}">Car Value Tracker</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('CarBuyer')}}">Car buyers</a>-->
        <!--                        </li>-->
                                <!--<li>-->
                                <!--    <a href="">Cash for cars</a>-->
                                <!--</li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('SellMyCarOnFinance')}}">Sell My Car On Finance</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('CarValuation')}}">Car Valuation</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('whoWillBuyMyCar')}}">Who will buy my car?</a>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--                <div class="footer-sub product-2">-->
        <!--                    <ul>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('CarBuyingSites')}}">Car buying sites</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('sellToADealer')}}">Sell to a dealer</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="{{route('sellMyElectricCars')}}">Sell my electric car</a>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--                <div class="footer-sub contact">-->
        <!--                    <div>-->
        <!--                        <h5>Whatsapp</h5>-->
        <!--                        <p><a href="https://api.whatsapp.com/send?phone=+447593839364">+44 7593 839364</a></p>-->
        <!--                    </div>-->
        <!--                    <div>-->
        <!--                        <h5>Customer Support </h5>-->
        <!--                        <p><a href="tel:+447593839364"> +44 7593 839364 </a></p>-->
        <!--                    </div>-->
        <!--                    <div>-->
        <!--                        <h5>Email</h5>-->
        <!--                        <p><a href="mailto:info@motorific.co.uk"> info@motorific.co.uk </a></p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="footer-sub contact-2">-->
        <!--                <a href="{{ route('index') }}"> <img src="{{ URL::asset('frontend/seller/assets/image/logo.png')}}" alt=""></a>-->
        <!--                    <div class="d-flex mt-4 mb-4">-->
        <!--                        <a href="#">-->
        <!--                            <div class="footer-icon-bg"><i class="fa-brands fa-twitter"></i></div>-->
        <!--                        </a>-->
        <!--                        <a href="https://www.facebook.com/Motorific-100480046330830">-->
        <!--                            <div class="footer-icon-bg"><i class="fa-brands fa-facebook-f"></i></div>-->
        <!--                        </a>-->
        <!--                        <a href="https://www.instagram.com/motorific_1/">-->
        <!--                            <div class="footer-icon-bg"><i class="fa-brands fa-instagram"></i></div>-->
        <!--                        </a>-->
        <!--                    </div>-->
        <!--                    <h4>© Motorific Online Ltd. <?php echo date("Y"); ?></h4>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </section>-->


    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="{{ URL::asset('backend/admin/assets/vendors/fontawesome/all.min.js') }}"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"
        integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('child-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('frontend/seller/assets/script.js') }}"></script>
    <script src="{{ URL::asset('frontend/dealers/assets/js/slick.min.js') }}"></script>

    <!--Macth Height Js-->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js'
        crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->

    <!--<scipt src="{{ URL::asset('frontend/dealers/assets/js/jquery.steps.min.js') }}"></scipt>-->
    <!-- Jquery Dragable -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- CUSTOM-JS -->
    <script type="text/javascript" src="{{ URL::asset('frontend/dealers/assets/js/custom.js') }}"></script>

    <!-- Step Form -->
    <script type="text/javascript">
        $(document).ready(function() {

            // Select 2
            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "Placeholder",
                allowHtml: true,
                allowClear: true,
                tags: true
            });



            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function() {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function() {
                return false;
            })



            // Form Condition
            $('#allMakes').on('change', function() {
                if ($(this).is(':checked')) {
                    $('select.js-select2.companyType + span').css('display', 'none');
                }
            });
            $('#specificMakes').on('change', function() {
                if ($(this).is(':checked')) {
                    $('select.js-select2.companyType + span').css('display', 'block');
                }
            });
        });
    </script>
    <!--Filter Product-->
    <script type="text/javascript">
        // Price Slider
        var $range = $(".js-range-slider"),
            $from = $(".from"),
            $to = $(".to"),
            range,
            min = $range.data('min'),
            max = $range.data('max'),
            from,
            to;

        var updateValues = function() {
            $from.prop("value", from);
            $to.prop("value", to);
        };

        $range.ionRangeSlider({
            onChange: function(data) {
                from = data.from;
                to = data.to;
                updateValues();
            }
        });

        range = $range.data("ionRangeSlider");
        var updateRange = function() {
            range.update({
                from: from,
                to: to
            });
        };

        $from.on("input", function() {
            from = +$(this).prop("value");
            if (from < min) {
                from = min;
            }
            if (from > to) {
                from = to;
            }
            updateValues();
            updateRange();
        });

        $to.on("input", function() {
            to = +$(this).prop("value");
            if (to > max) {
                to = max;
            }
            if (to < from) {
                to = from;
            }
            updateValues();
            updateRange();
        });

        // Single Select
        $('.selectSingle select').select2();
        $('.topRightFilter select').select2();
    </script>
    <!--Slider-->
    <script>
        $('.sliderImgVehicleDetail').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        // Timer
        function makeTimer() {

            //var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
            var endTime = new Date("7 November 2022 09:43:00 UTC+05:00");
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#counter").html(hours + ":" + minutes + ":" + seconds);
            // $("#word").html('');
            $("#word").html('Begins');
            // $("#minutes").html(minutes);
            // $("#seconds").html(seconds);

        }

        setInterval(function() {
            makeTimer();
        }, 1000);
    </script>
    <!--jQuery UI-->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--<script src="{{ URL::asset('frontend/dealers/assets/js/sticky.jquery.js') }}"></script>-->
    <script src="{{ URL::asset('frontend/dealers/assets/js/scrollWithPage.min.js') }}"></script>
    <!--Drag JS-->
    <script>
        $('.selectedFilesTn').sortable({

            stop: function(evt, ui) {
                var totalDivs = $(this).find('div.image-box').length;
                var num = 1;
                $(this).find('div.image-box').each(function() {
                    $(this).attr('data-id', '');
                    $(this).attr('data-id', 'num_' + num++ + '');
                });
                let first_img_src = $('.selectedFilesTn-exterior .image-box[data-id="num_1"] img').attr('src')
                $('#selected-first-img-qa').attr('src',first_img_src);

            }
        });
        
    </script>

    <script>
    
    // Sticky Box
    $(document).ready(function() {
    var width = $(window).width();
    if(width>991){
        $(function(){

          $("#vehBox").scrollWithPage(".productPageTn");

        });
      }
    });
    
    </script>

</body>

</html>
