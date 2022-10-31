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

    <title>Motorific- @yield('title')</title>

</head>

<body>
<main>
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
