<html>
<head>
    <title>@yield('titel')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ URL::to('main.css') }}" >
    <link rel="stylesheet" href="css\app.css">
    <link rel="stylesheet" href="css\bootstrap-rtl.css">


</head>

<body class="main" >
<div class="container-fluid">
    <div class="row">
       <!-- include('navbar')-->
    </div>
    <div class="row" style="margin-top:100px">
        <div class="col-lg-4">@yield('categories')</div>

        @yield('search')




        @yield('content')


    </div>
</div>



</div><!--end of containee floaid -->
<script src="css\js\app.js"></script>
</body>

</html>