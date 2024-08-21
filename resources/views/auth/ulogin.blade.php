<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BOOKING</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/css/pages/login/classic/login-65883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/base/light5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/menu/light5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/brand/dark5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/dark5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/" />
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<div class="d-flex flex-column flex-root">
    <div class="login login-6 login-signin-on login-signin-on d-flex flex-column-fluid" id="kt_login">
        <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center" style="background-image: url({{ asset('assets/dummy/pngegg (1).png') }});">
            <div class="d-flex w-100 flex-center p-15">
                <div class="login-wrapper">
                    <div class="text-dark-75">
                        <h1 class="mb-3 mt-12 font-weight-bold">WELCOME TO BOOKING</h1>
                        <a href="#">
                            <img src="{{ asset('assets/dummy/pngegg.png') }}" class="max-h-300px" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="login-divider">
                <div></div>
            </div>
            <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">
                <div class="login-wrapper">
                    <div class="login-signin">
                        <div class="text-center mb-10 mb-lg-20">
                            <h2 class="font-weight-bold">Sign In</h2>
                            <p class="text-muted font-weight-bold">Enter your Email and Password</p>
                        </div>
                        <form class="form text-left" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group py-2 m-0">
                                <label class="form-label" for="email">Email <b class="text-danger">*</b></label>
                                <input class="form-control" id="email" placeholder="Enter Email ..." type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            </div>
                            <div class="form-group py-2 m-0">
                                <label class="form-label" for="password">Password <b class="text-danger">*</b></label>
                                <input class="form-control" id="password" placeholder="********" type="password" name="password" required autocomplete="current-password" />
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted font-weight-bold">
                                        <input type="checkbox" name="remember" />
                                        <span></span>Remember me</label>
                                </div>
                                <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary font-weight-bold">Forget Password ?</a>
                            </div>
                            <div class="text-center mt-15">
                                <button type="submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/plugins/global/plugins.bundle5883.js?v=7.2.9') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle5883.js?v=7.2.9') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle5883.js?v=7.2.9') }}"></script>
<script src="{{ asset('assets/js/pages/custom/login/login-general5883.js?v=7.2.9') }}"></script>
</body>

</html>


