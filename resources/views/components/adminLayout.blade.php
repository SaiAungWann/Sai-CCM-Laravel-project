<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Dashboard</title>
    {{-- href="{{ asset('access/css/bootstrap.min.css')}} --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    {{-- <link rel="stylesheet" href="css/fontawesome.min.css"> --}}
    <link rel="stylesheet" href="{{asset('access/css/admin-fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    {{-- <link rel="stylesheet" href="css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('access/css/admin-bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    {{-- <link rel="stylesheet" href="css/templatemo-style.css"> --}}
    <link rel="stylesheet" href="{{asset('access/css/admin-templatemo-style.css')}}">
    <link rel="stylesheet" href="{{asset('access/css/admin-dropdown.min.css')}}">
    <link rel="stylesheet" href="{{asset('access/css/style.css')}}">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        {{-- navbar --}}
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.html">
                    <h1 class="tm-site-title mb-0">Admin Profile</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/dashBoard">
                                {{-- <i class="fa fa-tachometer-alt"></i> --}}
                                {{-- {{img('accesss/img/dashboard_customize.svg', 20, 20)}} --}}
                               <span>
                                    <img src="{{asset('access/img/dashboard_customize.svg')}}" alt="">
                                </span>
                                Dashboard
                                @if (request()->path() == 'http://127.0.0.1:8000/admin/dashBoard')
                                <span class="sr-only">(current)</span>      
                                @endif
                            </a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/ordersList">
                            {{-- <i class="fas fa-shopping-cart"></i> --}}
                            <span><img src="{{asset('access/img/orders.svg')}}" alt=""></span>
                                Orders
                                @if (request()->path() == 'http://127.0.0.1:8000/admin/ordersList')
                                <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>                      
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                 <img src="{{asset('access/img/shopping_cart.svg')}}" alt="">
                                <span>
                                    Products <img src="{{asset('access/img/arrow_drop_down.svg')}}" alt="">
                                </span>

                                @if (request()->path() == 'http://127.0.0.1:8000/admin/products')
                                <span class="sr-only">(current)</span>      
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/admin/products">Products</a>
                                <a class="dropdown-item" href="/admin/categories">Category</a>
                                <a class="dropdown-item" href="/admin/brands"> Brand</a>
                           </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                 <i class="far fa-user"></i>
                                <span>
                                    Accounts <img src="{{asset('access/img/arrow_drop_down.svg')}}" alt="">
                                </span>
                                
                                @if (request()->path() == 'http://127.0.0.1:8000/admin/settings')
                                <span class="sr-only">(current)</span>      
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">User Accounts</a>
                                <a class="dropdown-item" href="#">Admin Accounts</a>
                           </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('access/img/settings.svg')}}" alt="">
                                <span>
                                    Settings <img src="{{asset('access/img/arrow_drop_down.svg')}}" alt="">
                                </span>
                                @if (request()->path() == 'http://127.0.0.1:8000/admin/settings')
                                <span class="sr-only">(current)</span>      
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="/admin/account">
                                <i class="far fa-user"></i>
                                Log Out
                                @if (request()->path() == 'http://127.0.0.1:8000/admin/account')
                                <span class="sr-only">(current)</span>      
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        {{-- navbar --}}

        {{-- content --}}
        {{$slot}}
        {{-- content --}}

        {{-- footer --}}
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved. 
                    
                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
        {{-- footer --}}
    </div>

    {{-- 	<script src="{{asset('./access/js/jquery.min.js')}}"></script> --}}
    <script src="{{asset('./access/js/admin-jquery-3.3.1.min.js')}}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{asset('./access/js/admin-moment.min.js')}}"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{asset('./access/js/admin-Chart.min.js')}}"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{asset('./access/js/admin-bootstrap.min.js')}}"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="{{asset('./access/js/admin-tooplate-scripts.js')}}"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

<script src="{{asset('./access/js/admin-jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('./access/js/admin-moment.min.js')}}"></script>
<script src="{{asset('./access/js/admin-Chart.min.js')}}"></script>
<script src="{{asset('./access/js/admin-bootstrap.min.js')}}"></script>
<script src="{{asset('./access/js/admin-img.js')}}"></script>

</html>