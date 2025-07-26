<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Login Page">
    <meta name="keywords" content="login, admin, template">
    <meta name="author" content="You">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('temp-admin') }}/app-assets/images/logo/logo-dpm.png">


    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/vendors/css/forms/toggle/switchery.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/components.min.css">

    <!-- Page CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/pages/login-register.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/fonts/feather/style.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/assets/css/style.css">
</head>

<body class="vertical-layout vertical-menu 1-column bg-full-screen-image blank-page"
    data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">

    <div class="app-content content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('temp-admin') }}/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/js/core/app-menu.min.js"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/js/core/app.min.js"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/js/scripts/forms/form-login-register.min.js"></script>
</body>
</html>
