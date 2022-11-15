<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/e770fec82c.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP-5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CUSTOM-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/style.css') }}">
    <!-- RESPONSIVE-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/seller/assets/responsive.css') }}">
    
    
    <!-- CUSTOM-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/dealers/assets/css/style.css') }}">
    <!-- RESPONSIVE-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/dealers/assets/css/responsive.css') }}">
    
    
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Motorific- @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
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

        #msform input, #msform textarea,#msform select {
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

        #msform input:focus, #msform textarea:focus {
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

        #msform .action-button:hover, #msform .action-button:focus {
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

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
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
        #progressbar li.active:before, #progressbar li.active:after {
            background: #05eab5;
        }

        /*Imaged Radio Buttons*/
        .radio-group {
            position: relative;
            margin-bottom: 25px;
        }

        .radio {
            display:inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor:pointer;
            margin: 8px 2px;
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
        }

        /*Fit image in bootstrap div*/
        .fit-image{
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

        #msform .form-group.radio-group input + span {
            position: relative;
            padding-left: 30px;
        }

        #msform .form-group.radio-group input + span:before {
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

        #msform .form-group.radio-group input + span a {
            color: #05eab5;
            text-decoration: none;
        }

        #msform .form-group.radio-group input + span:after {position: absolute;left: 5px;top: 50%;width: 10px;height: 10px;border-radius: 50%;background: #05eab5;content: '';transform: translateY(-50%);opacity: 0;transition: all .3s linear 0s;}

        #msform fieldset .form-card label span {
            position: relative;
        }

        #msform .form-group.radio-group input:checked + span:after {
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

        #msform fieldset .form-card  .absolutelabel > label {
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

        .form-group.twoInOneLine > label {
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

        .form-group.twoInOneLine > span {
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
          font-family:fontAwesome;
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
            box-shadow: 0 0 10px rgba(0,0,0,0.5);

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
        .select-icon  .select2-search--dropdown {
            display: none;
        }
        #msform .select2-container--default .select2-search--inline .select2-search__field {height: 52px;border: 0;background: transparent;line-height: 45px;}

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            height: 52px;
            border: 0;
            background: transparent;
            padding: 0;
        }

        span.select2.select2-container {
            padding: 0;
        }
        .select2-container--default .select2-selection--multiple{
            background: transparent;
            border: 0;
        }
        textarea.select2-search__field {height: 0;}
        .select2-container .select2-selection--multiple .select2-selection__rendered {
            position: absolute;
            top: 8px;
            left: 10px;
            margin: 0;
        }
        select.js-select2.companyType + span {
            display: none;
        }
    </style>

</head>

<body>
<main>
    <!-- HEADER -->
    @include('frontend.dealer.partials.header')

    @yield('section')

    <!-- FOOTER -->

    @include('frontend.dealer.partials.footer')

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stack('child-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('frontend/seller/assets/script.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <!-- Step Form -->
     <script type="text/javascript">

        $(document).ready(function(){

            // Select 2
            $(".js-select2").select2({
                closeOnSelect : false,
                placeholder : "Placeholder",
                allowHtml: true,
                allowClear: true,
                tags: true
            });


            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function(){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $(".previous").click(function(){

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function(){
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function(){
                return false;
            })



            // Form Condition
            $('#allMakes').on('change', function(){
                if ($(this).is(':checked')){
                    $('select.js-select2.companyType + span').css('display','none');
                }
            });
            $('#specificMakes').on('change', function(){
                if ($(this).is(':checked')){
                    $('select.js-select2.companyType + span').css('display','block');
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

        var updateValues = function () {
            $from.prop("value", from);
            $to.prop("value", to);
        };

        $range.ionRangeSlider({
            onChange: function (data) {
              from = data.from;
              to = data.to;
              updateValues();
            }
        });

        range = $range.data("ionRangeSlider");
        var updateRange = function () {
            range.update({
                from: from,
                to: to
            });
        };

        $from.on("input", function () {
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

        $to.on("input", function () {
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
          prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
          nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
          responsive: [
            {
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
            var endTime = new Date("7 November 2022 20:40:00 UTC+05:00");			
                endTime = (Date.parse(endTime) / 1000);

                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400); 
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") { hours = "0" + hours; }
                if (minutes < "10") { minutes = "0" + minutes; }
                if (seconds < "10") { seconds = "0" + seconds; }

                $("#days").html(days + "<span> Days</span>");
                $("#hours").html(hours + "<span> Hours</span>");
                $("#minutes").html(minutes + "<span> Minutes</span>");
                $("#seconds").html(seconds + "<span> Seconds</span>");		

        }

        setInterval(function() { makeTimer(); }, 1000);


    </script>
</body>

</html>
