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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>Motorific- @yield('title')</title>

</head>

<body onload="move()">
    <div id="myProgress">
        <div class="loader-img">
            <img src="{{ URL::asset('frontend/seller/assets/image/loaderimg.png') }}">
        </div>
      <div id="myBar">
          <span id="bar"></span>
          <span id="bar-txt">0%</span>
      </div>
    </div>
    
    <script>
        var i = 0;
        
        function move() {
          if (i == 0) {
            i = 1;
            var loadedPage = document.getElementById("loadedPage");
            var progessMain = document.getElementById("myProgress");
            var elem = document.getElementById("bar");
            var barTxt = document.getElementById("bar-txt");
            loadedPage.style.transform = "none";
            var width = 0;
            var id = setInterval(frame, 25);
            function frame() {
              if (width >= 100) {
                progessMain.style.opacity =0.5;
                progessMain.style.display ="none";
                clearInterval(id);
                i = 0;
                // loadedPage.classList.remove("overflow-hidden");
                loadedPage.style.display = "block";
              } else {
                width++;
                // loadedPage.classList.add("overflow-hidden");
                elem.style.width = width + "%";
                barTxt.innerHTML = width + "%";
              }
            }
          }
        }
        
    </script>
    
    
<main id="loadedPage">
    <!-- HEADER -->
    {{-- @include('frontend.seller.partials.header') --}}

    @yield('section')

    <!-- FOOTER -->

    @include('frontend.seller.partials.footer')

</main>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('frontend/seller/assets/script.js') }}"></script>
    
    @stack('child-scripts')
</body>

</html>

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
