<!DOCTYPE html>


<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    @if(Auth::user()->admin == 1)
    <title>تخـطـيـطـا.تـك | لوحة تحكم النظام</title>
    @else
    <title>تخـطـيـطـا.تـك | لوحة التحكم</title>
    @endif
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Changa:300,400,500,600,800", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>


    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <!--<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />-->

    <link href="{{ asset('dashboard/assets/vendors/base/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <!--<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />-->

    <link href="{{ asset('dashboard/assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->


    <!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/app/media/img/logos/icon.png') }}"/>

    <link href="{{ asset('dashboard/nour.css') }}" rel="stylesheet" type="text/css"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">

                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            @if(Auth::user()->admin == 1)
                                <a href="{{ route('admin.index') }}" class="m-brand__logo-wrapper">
                            @else
                                <a href="{{ route('dashboard.index') }}" class="m-brand__logo-wrapper">
                            @endif
                                <img alt="" src="{{ asset('dashboard/assets/app/media/img/logos/logo22.png') }}"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">

                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Topbar Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>

                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>

                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                    <!-- BEGIN: Horizontal Menu -->

                    <!-- END: Horizontal Menu -->

                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{ asset('dashboard/assets/app/media/img/users/user4.jpg') }}"
                                                         class="m--img-rounded m--marginless" alt=""/>
												</span>
                                        <span class="m-topbar__username m--hide">Nick</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center"
                                                 style="background: url({{ asset('dashboard/assets/app/media/img/misc/user_profile_bg.jpg') }}); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="{{ asset('dashboard/assets/app/media/img/users/user4.jpg') }}"
                                                             class="m--img-rounded m--marginless" alt=""/>

                                                        <!--
                <span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
                -->
                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name m--font-weight-500">
                                                            @if(Auth::user()->admin == 1)
                                                                مدير النظام
                                                            @else
                                                                {{ Auth::user()->name }}
                                                            @endif
                                                        </span>
                                                        <a href="" class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
                                                            <span class="m-nav__section-text">Section</span>
                                                        </li>
                                                        {{--<li class="m-nav__item">--}}
                                                        {{--<a href="header/profile.html" class="m-nav__link">--}}
                                                        {{--<i class="m-nav__link-icon flaticon-profile-1"></i>--}}
                                                        {{--<span class="m-nav__link-title">--}}
                                                        {{--<span class="m-nav__link-wrap">--}}
                                                        {{--<span class="m-nav__link-text">My Profile</span>--}}
                                                        {{--<span class="m-nav__link-badge"><span--}}
                                                        {{--class="m-badge m-badge--success">2</span></span>--}}
                                                        {{--</span>--}}
                                                        {{--</span>--}}
                                                        {{--</a>--}}
                                                        {{--</li>--}}
                                                        {{--<li class="m-nav__item">--}}
                                                        {{--<a href="header/profile.html" class="m-nav__link">--}}
                                                        {{--<i class="m-nav__link-icon flaticon-share"></i>--}}
                                                        {{--<span class="m-nav__link-text">Activity</span>--}}
                                                        {{--</a>--}}
                                                        {{--</li>--}}
                                                        {{--<li class="m-nav__item">--}}
                                                        {{--<a href="header/profile.html" class="m-nav__link">--}}
                                                        {{--<i class="m-nav__link-icon flaticon-chat-1"></i>--}}
                                                        {{--<span class="m-nav__link-text">Messages</span>--}}
                                                        {{--</a>--}}
                                                        {{--</li>--}}
                                                        {{--<li class="m-nav__separator m-nav__separator--fit">--}}
                                                        {{--</li>--}}
                                                        {{--<li class="m-nav__item">--}}
                                                        {{--<a href="header/profile.html" class="m-nav__link">--}}
                                                        {{--<i class="m-nav__link-icon flaticon-info"></i>--}}
                                                        {{--<span class="m-nav__link-text">FAQ</span>--}}
                                                        {{--</a>--}}
                                                        {{--</li>--}}

                                                        @if(Auth::user()->admin == 1)

                                                        @else
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('show.profile') }}" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">تحديث بيانات الملف الشخصي</span>
                                                                </a>
                                                            </li>
                                                        @endif

                                                        <li class="m-nav__item">
                                                            <a href="{{ route('show.password') }}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                <span class="m-nav__link-text">تغيير كلمة المرور</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit">
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{ route('logout') }}"
                                                               class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"
                                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>

    <!-- END: Header -->

    <!-- begin::Body -->
    @yield('content')

    <!-- end:: Body -->

    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								جميع الحقوق محفوظة لتقنية المعلومات بالنماص

							</span>
                </div>

            </div>
        </div>
    </footer>

    <!-- end::Footer -->
</div>

<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->


<!--begin::Global Theme Bundle -->
<script src="{{ asset('dashboard/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('dashboard/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>


@stack('js')
<!--end::Global Theme Bundle -->

@if(Session::has('success'))
    <script type="text/javascript">
        swal({
            title: '{{ Session::get('success') }}',
            text: "",
            icon: "success"
        });


    </script>
@endif

@if(Session::has('error'))
    <script type="text/javascript">
        swal({
            title: '{{ Session::get('error') }}',
            text: "",
            icon: "error"
        });
    </script>
@endif


<!--begin::Page Scripts -->

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
