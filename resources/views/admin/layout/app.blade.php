<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<!-- Mirrored from demos.themeselection.com/chameleon-admin-template/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Nov 2024 13:26:23 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code." />
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard" />
    <meta name="author" content="ThemeSelect" />
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('temp-admin') }}/app-assets/images/logo/logo-dpm.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://demos.themeselection.com/chameleon-admin-temp-admin/app-assets/images/ico/favicon.ico" />
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet" />

    <style>
        :root {
            --primary-blue: #2563eb;
            --secondary-blue: #3b82f6;
            --accent-yellow: #fbbf24;
            --light-yellow: #fef3c7;
            --text-dark: #1f2937;
            --bg-light: #f8fafc;
        }

        body {
            background: linear-gradient(135deg, var(--bg-light) 0%, #e2e8f0 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.15);
        }

        .welcome-card {
            background: linear-gradient(135deg, var(--accent-yellow) 0%, #f59e0b 100%);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(251, 191, 36, 0.2);
            border: none;
            overflow: hidden;
            position: relative;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .stats-card {
            background: white;
            border-radius: 16px;
            border: none;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-yellow));
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .icon-blue {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
        }

        .icon-yellow {
            background: linear-gradient(135deg, var(--accent-yellow), #f59e0b);
            color: white;
        }

        .icon-gradient {
            background: linear-gradient(135deg, #8b5cf6, #a855f7);
            color: white;
        }

        .icon-green {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .icon-orange {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
        }

        .icon-pink {
            background: linear-gradient(135deg, #ec4899, #db2777);
            color: white;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 10px 0 5px 0;
            line-height: 1;
        }

        .stats-label {
            color: #6b7280;
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 0;
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .fade-in:nth-child(1) {
            animation-delay: 0.1s;
        }

        .fade-in:nth-child(2) {
            animation-delay: 0.2s;
        }

        .fade-in:nth-child(3) {
            animation-delay: 0.3s;
        }

        .fade-in:nth-child(4) {
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            color: var(--text-dark);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            position: relative;
            padding-left: 20px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 30px;
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-yellow));
            border-radius: 2px;
        }

        .sidebar {
            background: white;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.05);
            height: calc(100vh - 76px);
            position: fixed;
            left: 0;
            top: 76px;
            width: 250px;
            z-index: 1000;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
            margin: 0;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #6b7280;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background: linear-gradient(135deg, var(--light-yellow), rgba(251, 191, 36, 0.1));
            color: var(--primary-blue);
            border-right: 4px solid var(--accent-yellow);
        }

        .sidebar-menu li a i {
            margin-right: 12px;
            width: 20px;
        }

        .content-area {
            margin-left: 250px;
            padding: 30px;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .content-area {
                margin-left: 0;
            }

            .stats-number {
                font-size: 2rem;
            }
        }
    </style>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/vendors/css/forms/toggle/switchery.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/plugins/forms/switch.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/core/colors/palette-switch.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/vendors/css/charts/chartist.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/vendors/css/charts/chartist-plugin-tooltip.css" />
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/bootstrap-extended.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/colors.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/components.min.css" />
    <!-- END: Theme CSS-->

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/pages/chat-application.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/pages/dashboard-analytics.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/pages/project.min.css" />
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('temo-admin') }}/assets/css/style.css" />
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">
    {{-- header --}}
    @include('admin.partials.header')
    {{-- end header --}}

    @include('admin.partials.sidebar')

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->
    @stack('scripts')


    <!-- BEGIN: Customizer-->
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block">
        <a class="customizer-close" href="#"><i data-feather="x font-medium-3"></i></a><a
            class="customizer-toggle bg-primary box-shadow-3" href="#" id="customizer-toggle-setting"><i
                data-feather="settings font-medium-3 spinner white"></i></a>
        <div class="customizer-content p-2">
            <h5 class="mt-1 mb-1 text-bold-500">Navbar Color Options</h5>
            <div class="navbar-color-options clearfix">
                <div class="gradient-colors mb-1 clearfix">
                    <div class="bg-gradient-x-purple-blue navbar-color-option" data-bg="bg-gradient-x-purple-blue"
                        title="bg-gradient-x-purple-blue"></div>
                    <div class="bg-gradient-x-purple-red navbar-color-option" data-bg="bg-gradient-x-purple-red"
                        title="bg-gradient-x-purple-red"></div>
                    <div class="bg-gradient-x-blue-green navbar-color-option" data-bg="bg-gradient-x-blue-green"
                        title="bg-gradient-x-blue-green"></div>
                    <div class="bg-gradient-x-orange-yellow navbar-color-option" data-bg="bg-gradient-x-orange-yellow"
                        title="bg-gradient-x-orange-yellow"></div>
                    <div class="bg-gradient-x-blue-cyan navbar-color-option" data-bg="bg-gradient-x-blue-cyan"
                        title="bg-gradient-x-blue-cyan"></div>
                    <div class="bg-gradient-x-red-pink navbar-color-option" data-bg="bg-gradient-x-red-pink"
                        title="bg-gradient-x-red-pink"></div>
                </div>
                <div class="solid-colors clearfix">
                    <div class="bg-primary navbar-color-option" data-bg="bg-primary" title="primary"></div>
                    <div class="bg-success navbar-color-option" data-bg="bg-success" title="success"></div>
                    <div class="bg-info navbar-color-option" data-bg="bg-info" title="info"></div>
                    <div class="bg-warning navbar-color-option" data-bg="bg-warning" title="warning"></div>
                    <div class="bg-danger navbar-color-option" data-bg="bg-danger" title="danger"></div>
                    <div class="bg-blue navbar-color-option" data-bg="bg-blue" title="blue"></div>
                </div>
            </div>

            <hr />

            <h5 class="my-1 text-bold-500">Layout Options</h5>
            <div class="row">
                <div class="col-12">
                    <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                        <input type="radio" class="custom-control-input bg-primary" name="layouts"
                            id="default-layout" checked />
                        <label class="custom-control-label" for="default-layout">Default</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                        <input type="radio" class="custom-control-input bg-primary" name="layouts"
                            id="fixed-layout" />
                        <label class="custom-control-label" for="fixed-layout">Fixed</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                        <input type="radio" class="custom-control-input bg-primary" name="layouts"
                            id="static-layout" />
                        <label class="custom-control-label" for="static-layout">Static</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio mb-1">
                        <input type="radio" class="custom-control-input bg-primary" name="layouts"
                            id="boxed-layout" />
                        <label class="custom-control-label" for="boxed-layout">Boxed</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-inline-block custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons"
                            id="right-side-icons" />
                        <label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
                    </div>
                </div>
            </div>

            <hr />

            <h5 class="mt-1 mb-1 text-bold-500">Sidebar menu Background</h5>
            <!-- <div class="sidebar-color-options clearfix">
  <div class="bg-black sidebar-color-option" data-sidebar="menu-dark" title="black"></div>
  <div class="bg-white sidebar-color-option" data-sidebar="menu-light" title="white"></div>
 </div> -->
            <div class="row sidebar-color-options ml-0">
                <label for="sidebar-color-option" class="card-title font-medium-2 mr-2">White Mode</label>
                <div class="text-center mb-1">
                    <input type="checkbox" id="sidebar-color-option" class="switchery" data-size="xs" />
                </div>
                <label for="sidebar-color-option" class="card-title font-medium-2 ml-2">Dark Mode</label>
            </div>

            <hr />

            <label for="collapsed-sidebar" class="font-medium-2">Menu Collapse</label>
            <div class="float-right">
                <input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs" />
            </div>

            <hr />

            <!--Sidebar Background Image Starts-->
            <h5 class="mt-1 mb-1 text-bold-500">Sidebar Background Image</h5>
            <div class="cz-bg-image row">
                <div class="col mb-3">
                    <img src="{{ asset('temp-admin') }}/app-assets/images/backgrounds/04.jpg"
                        class="rounded sidiebar-bg-img" width="50" height="100" alt="background image" />
                </div>
                <div class="col mb-3">
                    <img src="{{ asset('temp-admin') }}/app-assets/images/backgrounds/01.jpg"
                        class="rounded sidiebar-bg-img" width="50" height="100" alt="background image" />
                </div>
                <div class="col mb-3">
                    <img src="{{ asset('temp-admin') }}/app-assets/images/backgrounds/02.jpg"
                        class="rounded sidiebar-bg-img" width="50" height="100" alt="background image" />
                </div>
                <div class="col mb-3">
                    <img src="{{ asset('temp-admin') }}/app-assets/images/backgrounds/05.jpg"
                        class="rounded sidiebar-bg-img" width="50" height="100" alt="background image" />
                </div>
            </div>
            <!--Sidebar Background Image Ends-->

            <!--Sidebar BG Image Toggle Starts-->
            <div class="sidebar-image-visibility">
                <div class="row ml-0">
                    <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">Hide Image</label>
                    <div class="text-center mb-1">
                        <input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs"
                            checked />
                    </div>
                    <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">Show Image</label>
                </div>
            </div>
            <!--Sidebar BG Image Toggle Ends-->

            <hr />

            <div class="row mb-2">
                <!-- <div class="col">
   <a href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" class="btn btn-danger btn-block box-shadow-1" target="_blank">Buy Now</a>
  </div> -->
                <div class="col">
                    <a href="https://themeselection.com/" class="btn btn-primary btn-block box-shadow-1"
                        target="_blank">More Themes</a>
                </div>
            </div>
            <div class="text-center">
                <button id="twitter" class="btn btn-social-icon btn-twitter sharrre mr-1">
                    <i class="la la-twitter"></i>
                </button>
                <button id="facebook" class="btn btn-social-icon btn-facebook sharrre mr-1">
                    <i class="la la-facebook"></i>
                </button>
                <button id="google" class="btn btn-social-icon btn-google sharrre">
                    <i class="la la-google"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- End: Customizer-->

    <!-- BEGIN: Footer-->
    @include('admin.partials.footer')
    <!-- END: Footer-->



    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('temp-admin') }}/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('temp-admin') }}/app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('temp-admin') }}/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
        type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('temp-admin') }}/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/js/core/app.min.js" type="text/javascript"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
    <script src="{{ asset('temp-admin') }}/app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    {{-- alert --}}

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('temp-admin') }}/app-assets/js/scripts/pages/dashboard-analytics.min.js" type="text/javascript">
    </script>
    <!-- END: Page JS-->

    {{-- script ikon feather --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    @yield('scripts')
    {{-- script ikon feather --}}

</body>
<!-- END: Body-->

<!-- Mirrored from demos.themeselection.com/chameleon-admin-template/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Nov 2024 13:27:29 GMT -->

</html>
