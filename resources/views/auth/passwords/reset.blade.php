<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>ادارة التخطيط والتنظيم | اعادة تعيين كلمة المرور</title>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                        <img class="img-fluid" src="{{ asset('dashboard/assets/app/media/img/logos/logo1.png') }}">
                    </a>
                </div>
                <div class="m-login__signin">
                    @include('includes.errors')
                    <div class="m-login__head">
                        <h3 class="m-login__title">اعادة تعيين كلمة المرور</h3>
                        <div class="m-login__desc">ادخل كلمة المرور الجديدة لحسابك:</div>
                    </div>
                    <form class="m-login__form m-form" action="{{ route('password.request') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="بريد الكتروني" name="email" id="m_email" autocomplete="off" required>
                        </div>

                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمة المرور الجديدة" name="password" required>
                        </div>

                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="اعادة كلمة المرور" name="password_confirmation">
                        </div>

                        <div class="m-login__form-action">
                            <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">ارسال</button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">الغاء</button>
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


@if(Session::has('success'))
    <script type="text/javascript">
        swal({
            title: "{{ Session::get('success') }}",
            text: "",
            icon: "success"
        });


    </script>
@endif
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>