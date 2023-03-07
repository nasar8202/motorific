<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motorific - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/choices.js/choices.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/fontawesome/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/css/pages/dripicons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{URL::asset('backend/admin/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/simple-datatables/style.css')}}">
    <!--Responsive Css-->
    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/css/responsive.css')}}">



    <link rel="stylesheet" href="{{URL::asset('backend/admin/assets/vendors/chartjs/Chart.min.css')}}">


    <style>
        .fontawesome-icons {
            text-align: center;
        }

        article dl {
            background-color: rgba(0, 0, 0, .02);
            padding: 20px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <div id="app" class="admin_dashboard">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                                <a href="{{ route('admin') }}"><img src="{{URL::asset('frontend/seller/assets/image/logo.png')}}" alt="Logo" srcset=""></a>
                            <!--<a href="index.html"><img src="{{URL::asset('backend/admin/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>-->
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    @include('backend.agents.partials._left_menu')
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
           @yield('secton')
            <footer class="footer_copyright">
                @include('backend.admin.partials._footer')
            </footer>
        </div>
    </div>
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
    <script src="{{URL::asset('backend/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{URL::asset('backend/admin/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{URL::asset('backend/admin/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{URL::asset('backend/admin/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{URL::asset('backend/admin/assets/js/main.js')}}"></script>


    <script src="{{URL::asset('backend/admin/assets/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{URL::asset('backend/admin/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

<script src="{{URL::asset('backend/admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{URL::asset('backend/admin/assets/js/pages/ui-chartjs.js')}}"></script>
<script src="{{URL::asset('backend/admin/assets/vendors/choices.js/choices.min.js')}}"></script>
@stack('child-scripts')
</body>

</html>

