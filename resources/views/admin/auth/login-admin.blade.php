<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<!-- Mirrored from demos.themeselection.com/chameleon-admin-template/html/ltr/vertical-menu-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Nov 2024 13:27:56 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Login - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title>
    <link rel="apple-touch-icon" href="{{ asset('temp-admin') }}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://demos.themeselection.com/chameleon-admin-template/app-assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/core/colors/palette-switch.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('temp-admin') }}/app-assets/css/pages/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('temp-admin') }}/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column bg-full-screen-image blank-page blank-page"
    data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="flexbox-container" style="min-height: 100vh;">
                    <div class="container">
                        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                            <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0 text-center">
                                        <img src="{{ asset('temp-admin') }}/app-assets/images/logo/logo.png" alt="branding logo" class="mb-1" style="max-height: 60px;">
                                        <h2 style="font-size: clamp(1.25rem, 5vw, 1.75rem); font-weight: 600;">Member Login</h2>
                                    </div>

                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form-horizontal" action="{{ route('admin.login.submit') }}" method="POST">
                                                @csrf
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control round" name="username" placeholder="Your Username" required>
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" class="form-control round" name="password" placeholder="Enter Password" required>
                                                    <div class="form-control-position">
                                                        <i class="ft-lock"></i>
                                                    </div>
                                                </fieldset>

                                                <div class="form-group row">
                                                    <div class="col-md-6 col-12 text-center text-sm-left">
                                                        <!-- Optional content -->
                                                    </div>
                                                    <div class="col-md-6 col-12 text-center text-sm-right">
                                                        <a href="recover-password.html" class="card-link">Forgot Password?</a>
                                                    </div>
                                                </div>

                                                <div class="form-group text-center">
                                                    <button type="submit"
                                                        class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12">
                                                        Login
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2">
                                            <span>OR Sign Up Using</span>
                                        </p>

                                        <div class="text-center">
                                            <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-facebook"><span class="ft-facebook"></span></a>
                                            <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-twitter"><span class="ft-twitter"></span></a>
                                            <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-instagram"><span class="ft-instagram"></span></a>
                                        </div>

                                        <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                                            <span>Don't have an account?
                                                <a href="register.html" class="card-link">Sign Up</a>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
</body>

<!-- END: Body-->

<!-- Mirrored from demos.themeselection.com/chameleon-admin-template/html/ltr/vertical-menu-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Nov 2024 13:27:57 GMT -->

</html>
