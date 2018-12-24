<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>تخـطـيـطـا.تـك | تسجيل الدخول</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Changa:300,400,500,600,800","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <!--<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />-->

    <link href="{{ asset('dashboard/assets/vendors/base/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />-->

    <link href="{{ asset('dashboard/assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/app/media/img/logos/icon.png') }}" />

</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url({{ asset('dashboard/assets/bg1.jpeg') }});">
        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="{{ route('index') }}">
                        <img class="img-fluid" src="{{ asset('dashboard/assets/app/media/img/logos/logo22.png') }}">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">لوحة تحكم النظام</h3>
                        <h3 class="m-login__title">تسجيل الدخول | مدير النظام</h3>
                    </div>

                    @include('includes.errors')
                    <form class="m-login__form m-form" action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="اسم المستخدم" name="user_name" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة المرور" name="password">
                        </div>

                        <div class="m-login__form-action">
                            <button type="submit"  class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">دخول</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!--begin::Global Theme Bundle -->
<script src="{{ asset('dashboard/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('dashboard/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
<script src="{{ asset('dashboard/assets/snippets/custom/pages/user/login.js') }}" type="text/javascript"></script>


<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
