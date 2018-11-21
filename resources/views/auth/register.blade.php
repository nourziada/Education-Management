<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>ادارة التخطيط والتنظيم | تسجيل الدخول - الاشتراك</title>
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
                    <div class="m-login__head">
                        <h3 class="m-login__title">تسجيل الدخول</h3>
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
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--light">
                                    <input type="checkbox" name="remember"> تذكرني
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">نسيت كلمة المرور؟</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit"  class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">دخول</button>
                        </div>
                    </form>
                </div>
                <div class="m-login__signup">
                    <div class="m-login__head">
                        <h3 class="m-login__title">تسجيل الاشتراك</h3>
                        <div class="m-login__desc">ادخل معلوماتك كاملة لإتمام عملية التسجيل:</div>
                    </div>
                    <form class="m-login__form m-form" action="{{ route('register') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <select required class="form-control m-input m-input--air m-input--pill" id="acc-type" name="account_type">
                                        <option value="" selected disabled>نوع الحساب</option>
                                        <option value="1">ادارة - قسم</option>
                                        <option value="2">باحث تربوي</option>
                                        <option value="3">مدرسة</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="اسم المستدخم" name="user_name" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6 d-none" id="is-management">
                                <div class="form-group m-form__group">
                                    <select required class="form-control m-input m-input--air m-input--pill" id="management" name="management">
                                        <option value="" selected disabled>الإدارة</option>
                                        <option value="1">الإدارات المرتبطة</option>
                                        <option value="2">الموارد البشرية</option>
                                        <option value="3">الشؤون المالية والادارية</option>
                                        <option value="4">شؤون المباني</option>
                                        <option value="5">الشؤون المدرسية</option>
                                        <option value="6">الشؤون التعليمية - بنين</option>
                                        <option value="7">الشؤون التعليمية - بنات</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none" id="is-section">
                                <div class="form-group m-form__group">
                                    <select required class="form-control m-input m-input--air m-input--pill" id="section" name="department">
                                        <option value="">--اختر ادارة--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" required type="text" placeholder="الأسم رباعي" name="name" id="full-name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <select required class="form-control m-input m-input--air m-input--pill" name="sefa">
                                        <option value="" selected disabled>الصفة</option>
                                        <option value="رئيس قسم"> رئيس قسم</option>
                                        <option value="مدير إدارة"> مدير إدارة</option>
                                        <option value="منسق قسم"> منسق قسم</option>
                                        <option value="قائد مدرسة"> قائد مدرسة</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="email" placeholder="البريد الاكتروني" name="email" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" required placeholder="بريد راسل" name="mail" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" required type="text" placeholder="رقم الجوال" name="mobile" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" required type="text" placeholder="رقم هاتف العمل" name="phone" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="السجل المدني" required name="civil_registry" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="password" placeholder="كلمة المرور" name="password" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="اعادة كلمة المرور" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">تسجيل حساب</button>&nbsp;&nbsp;
                            <button id="m_login_signup_cancel" class="btn m-btn m-btn--pill btn-success m-btn--custom m-btn--air m-login__btn">الغاء</button>
                        </div>
                    </form>
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">نسيت كلمة المرور؟</h3>
                        <div class="m-login__desc">ادخل ايميلك المسجل لتصلك رسالة تفعيل:</div>
                    </div>
                    <form class="m-login__form m-form" action="{{ route('password.email') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="بريد الكتروني" name="email" id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">ارسال</button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">الغاء</button>
                        </div>
                    </form>
                </div>
                <div class="m-login__account">
							<span class="m-login__account-msg">
								لا تملك حساب ؟
							</span>&nbsp;&nbsp;
                    <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">سجل الأن</a>
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

<script>
    $(document).ready(function () {
        $("#management").change(function () {
            var val = $(this).val();
            if (val == "1") {
                $("#section").html("<option value='1'>التخطيط والتطوير</option><option value='2'>تقنية المعلومات</option><option value='3'>الجودة الشاملة</option><option value='4'>الأمانة</option><option value='5'>الإعلام التربوي</option> <option value='6'>العلاقات العامة</option> <option value='7'>المراجعة الداخلية</option> <option value='8'>المتابعة</option> <option value='9'>الشؤون القانونية</option> <option value='10'>القضايا</option> <option value='11'>الأمن والسلامة </option> <option value='12'>الشراكة المجتمعية</option> <option value='13'>مركز التميز </option> <option value='14'>مكتب وفاء </option> ");
            } else if (val == "2") {
                $("#section").html("<option value='1'>تطوير الموارد البشرية </option><option value='2'>إدارة العمليات </option> <option value='3'>إدارة التواصل الداخلي </option>");
            } else if (val == "3") {
                $("#section").html("<option value='1'>الشؤون المالية</option><option value='2'>الميزانية</option> <option value='3'>المستودعات</option> <option value='4'>المشتريات</option> <option value='5'>الخدمات العامة</option> <option value='6'>مراقبة المخزون</option> <option value='7'>الاتصالات الإدارية</option>");
            } else if (val == "4") {
                $("#section").html("<option value='1'>التشغيل والصيانة</option> <option value='2'>الإشراف والتنفيذ</option> <option value='3'>الأراضي والبرمجة</option> <option value='4'>الدراسات والتصاميم</option>");
            }
            else if (val == "5") {
                $("#section").html("<option value='1'>التخطيط المدرسي</option> <option value='2'>التجهيزات المدرسية</option> <option value='3'>خدمات الطلاب</option> ");
            }
            else if (val == "6") {
                $("#section").html("<option value='1'>مكتب التعليم بتنومة</option> <option value='2'>مكتب التعليم ببني عمرو</option> <option value='3'>الإشراف التربوي</option> <option value='4'>التدريب والابتعاث</option> <option value='5'>الموهوبين</option> <option value='6'>التربية الخاصة</option> <option value='7'>التوجيه والإرشاد</option> <option value='8'>التوعية الإسلامية</option> <option value='9'>الاختبارات والقبول</option> <option value='10'>النشاط الطلابي</option> <option value='11'>تعليم الكبار</option> <option value='12'>وحدة شراكة المدرسة مع الأسرة والمجتمع</option> ");
            }
            else if (val == "7") {
                $("#section").html("<option value='1'>الإشراف التربوي</option> <option value='2'>التدريب والابتعاث</option> <option value='3'>الموهوبات</option> <option value='4'>التربية الخاصة</option> <option value='5'>التوجيه والإرشاد</option> <option value='6'>التوعية الإسلامية</option> <option value='7'>الاختبارات والقبول</option> <option value='8'>نشاط الطالبات</option> <option value='9'>تعليم الكبيرات</option> <option value='10'>وحدة شراكة المدرسة مع الأسرة والمجتمع</option> <option value='11'>رياض الأطفال</option> ");
            }

        });
        $("#acc-type").change(function () {
            var val = $(this).val();
            if (val == "1") {
                $("#is-management").removeClass('d-none');
                $("#is-section").removeClass('d-none');
                $("#full-name").removeClass('d-none');
            }
            else if (val == "3") {
                $("#is-management").addClass('d-none');
                $("#is-section").addClass('d-none');
                $("#full-name").attr("placeholder", "اسم المدرسة");
            }
            else {
                $("#is-management").addClass('d-none');
                $("#is-section").addClass('d-none');
                $("#full-name").removeClass('d-none');
            }
        });

    });
</script>

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