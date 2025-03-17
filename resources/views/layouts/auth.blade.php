<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SChoolPro - Login </title>
    <meta name="description" content="">
    <meta name="keywords" content="Naturally Care, Health Tips, Healthy Remedies">
    <meta name="author" content="Hareesh">
    <!-- App favicon -->
    <link rel="shortcut icon" href="backend/images/favicon.png">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('backend/css/icons.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="backend/css/plugins.css"> -->
    <link rel="stylesheet" rel="preload" href="{{ asset('backend/css/app.min.css') }}">

</head>

<body>

    


    @yield('content')




    <!-- JavaScript -->
    <script src="{{ asset('backend/js/vendors.js') }}"></script>
    <!-- <script src="{{ asset('backend/js/plugins.js') }}"></script> -->
    <script src="{{ asset('backend/js/app.js') }}"></script>

</body>

</html>