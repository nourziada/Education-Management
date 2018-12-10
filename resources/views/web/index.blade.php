<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>ادارة التخطيط والتطوير</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('web/images/icon.png') }}"/>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Changa:400,500,600,700,800" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/plugins-css.css') }}"/>

    <!-- Typography -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/typography.css') }}"/>

    <!-- Shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/shortcodes/shortcodes.css') }}"/>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.css') }}"/>

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/responsive.css') }}"/>

    <!-- Style customizer -->
    <link rel="stylesheet" type="text/css" href="#" data-style="styles"/>
    <!-- Google Tag Manager -->

</head>

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{ asset('web/images/pre-loader/loader-04.svg') }}" alt="">
    </div>

    <!--=================================
     preloader -->

    <!--=================================
     header -->

    <header id="header" class="header default">

        <!--=================================
         mega menu -->

        <div class="menu">
            <!-- menu start -->
            <nav id="menu" class="mega-menu">
                <!-- menu list items container -->
                <section class="menu-list-items">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <!-- menu logo -->
                                <ul class="menu-logo">
                                    <li>
                                        <a href="#"><img id="logo_img" src="{{ asset('web/images/logo2.png') }}" alt="logo">
                                        </a>
                                    </li>
                                </ul>
                                <!-- menu links -->
                                <div class="menu-bar">
                                    <ul class="menu-links">
                                        <li><a href="#">الرئيسية </a>
                                        </li>
                                        <li><a href="#about" >من نحن </a>
                                        </li>
                                        <li><a href="#plan">نماذج الخطة </a>
                                        </li>
                                        <li><a href="#gate">احصائيات البوابة </a>
                                        </li>

                                        @auth

                                            @if(Auth::user()->admin == 1)
                                                <li><a class="button button-border x-small" href="{{ route('admin.index') }}">لوحة التحكم</a> </li>
                                            @elseif(Auth::user()->admin == 2)
                                                <li><a class="button button-border x-small" href="{{ route('dashboard.index') }}">لوحة التحكم</a> </li>
                                            @endif
                                        @else
                                            <li><a class="button button-border x-small" href="{{ route('login') }}">تسجيل الاشتراك</a> </li>
                                            <li><a class="button button-border x-small" href="{{ route('login') }}">تسجيل الدخول </a> </li>
                                        @endauth

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </nav>
            <!-- menu end -->
        </div>
    </header>

    <!--=================================
     header -->

    <!--=================================
     banner -->

    <section class="slider-parallax business-banner bg-overlay-black-80 parallax" data-jarallax='{"speed": 0.6}'
             style="background-image: url({{ asset('web/images/bg/29.jpg') }});">
        <div class="slider-content-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="slider-content text-center">
                            <span class="text-white">الأدارة العامة للتعليم بمحافظة الريحان</span>
                            <h1 class="theme-color text-uppercase">ادارة التخطيط والتطوير</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
     banner -->


    <!--=================================
    about-->

    <section  class=" page-section-pb">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <div class="business-feature-top">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 border-right  d-flex ">
                                <div class="feature-text p-4 align-self-center ">
                                    <div class="feature-info">
                                        <img class="img-fluid" src="{{ asset('web/images/log2.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 border-right d-flex">
                                <div class="feature-text p-4 align-self-center ">
                                    <div class="feature-info">
                                        <img class="img-fluid" src="{{ asset('web/images/log.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4  d-flex">
                                <div class="feature-text p-4 align-self-center ">
                                    <div class="feature-info">
                                        <img class="img-fluid" src="{{ asset('web/images/log3.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    about-->


    <!--=================================
    about -->

    <section id="about" class="page-section-ptb gray-bg">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 col-md-12 text-center">
                    <h2 class="mb-30">من نحن </h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="tab round shadow">
                        <ul class="nav nav-tabs text-center d-block" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a data-scroll-ignore="1" class="nav-link active show" id="home-08-tab" data-toggle="tab" href="#home-08"
                                   role="tab" aria-controls="home-08" aria-selected="true"> <i class="fa fa-eye"
                                                                                               aria-hidden="true"></i>الرؤية</a>
                            </li>
                            <li class="nav-item">
                                <a  data-scroll-ignore="1" class="nav-link" id="profile-08-tab" data-toggle="tab" href="#profile-08" role="tab"
                                    aria-controls="profile-08" aria-selected="false"><i class="fa fa-envelope-o"
                                                                                        aria-hidden="true"></i> الرسالة
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-scroll-ignore="1" class="nav-link" id="portfolio-08-tab" data-toggle="tab" href="#portfolio-08"
                                   role="tab" aria-controls="portfolio-08" aria-selected="false"><i class="fa fa-check"
                                                                                                    aria-hidden="true"></i>
                                    القيم </a>
                            </li>
                            <li class="nav-item">
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="home-08" role="tabpanel"
                                 aria-labelledby="home-08-tab">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                    زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                                    تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع
                                    على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم
                                    الموقع.</p>
                            </div>
                            <div class="tab-pane fade" id="profile-08" role="tabpanel" aria-labelledby="profile-08-tab">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                    زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                                    تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع
                                    على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم
                                    الموقع.</p>
                            </div>
                            <div class="tab-pane fade" id="portfolio-08" role="tabpanel"
                                 aria-labelledby="portfolio-08-tab">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                    زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                                    تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع
                                    على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم
                                    الموقع.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    about -->

    <!--=================================
    about -->

    <section id="plan" class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <h2 class="mb-30 theme-color text-center"> نماذج الخطة </h2>
                    <div class="table-responsive">
                        <table class="table table-1 table-bordered table-striped">
                            <thead>


                            <tr>
                                <th>اسم النموذج</th>
                                <th>تحميل</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($plansModels as $model)
                            <tr>
                                <td>{{ $model->name }}</td>
                                <td>
                                    <a href="{{ asset('uploads/plans_models/' . $model->file) }}" class="down-file">
                                        <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>

                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    about -->

    <section id="gate" class="page-section-ptb gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="mb-30 text-center">احصائيات البوابة </h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="tab tab-vertical nav-border ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php $managments = \App\Management::get(); @endphp

                            @php $count = 0; @endphp
                            @forelse($managments as $manag)
                            <li class="nav-item">
                                <a data-scroll-ignore="1" class="nav-link @if($count == 0) active show @endif" id="{{$manag->id}}-tab" data-toggle="tab" href="#tab{{$manag->id}}"
                                   role="tab" aria-controls="{{$manag->id}}" aria-selected="true">{{ $manag->name }}</a>
                            </li>

                            @php $count++; @endphp
                            @empty
                            @endforelse


                            <li class="mt-2 p-2 text-center d-none d-lg-block project-num">
                                عدد المشاريع الكلي :
                                <span class="d-block"><span id="TotalProjectsSpan"></span>  مشروع</span>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            @php $count = 0; @endphp
                            @php $totalProjects = 0; @endphp
                            @forelse($managments as $manag)
                                <div class="tab-pane fade @if($count == 0) active show @endif" id="tab{{$manag->id}}" role="tabpanel"
                                 aria-labelledby="{{$manag->id}}-tab">
                                <div class="table-responsive">
                                    <table class="table table-1 table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="60%">القسم</th>
                                            <th>عدد المشاريع</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php $departments = \App\Department::where('management_id',$manag->id)->get(); @endphp

                                        @forelse($departments as $dep)
                                        <tr>
                                            <td>{{ $dep->name }}</td>
                                            <td>
                                                @php
                                                    $total = 0;
                                                    $stratigecsPlans = \App\Strategic::where('management',$manag->id)->where('department',$dep->id)->get();
                                                    $operationalPlans = \App\OperationalPlan::where('management',$manag->id)->where('department',$dep->id)->get();

                                                    $total = $stratigecsPlans->count() + $operationalPlans->count();
                                                    $totalProjects = $totalProjects + $total;
                                                @endphp

                                                {{ $total }}
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @php $count++; @endphp
                            @empty
                            @endforelse

                            <input type="hidden" id="totalProjectsValue" value="{{ $totalProjects }}">


                            <div class="mt-2 p-2 text-center d-block d-lg-none project-num">
                                عدد المشاريع الكلي :
                                <span class="d-block">{{ $totalProjects }} مشروع</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--=================================
     footer -->

    <footer class="footer black-bg">
        <div class="container">
            <div class="footer-widget">
                <div class="row">
                    <div class="col-lg-3 footerr-logo">
                        <img class="img-fluid" src="{{ asset('web/images/logo4.png') }}" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="4 text-center">
                            <p class="mt-15">
                                جميع الحقوق محفوظة  <a href="#">لإدارة التعليم </a>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="4 text-center footer-btn">
                            @auth
                                <a class="button button-border small" href="{{ route('login') }}">لوحة تحكم النظام</a>

                            @else
                                <a class="button button-border small" href="{{ route('dashboard.index') }}">لوحة تحكم النظام</a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="social-icons social-border color-hover clearfix mt-lg-0 mt-3"><ul>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--=================================
     footer -->

</div>


<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>أعلى</span></a></div>

<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>

<!-- plugins-jquery -->
<script src="{{ asset('web/js/plugins-jquery.js') }}"></script>
<script src="{{ asset('web/js/smooth-scroll.polyfills.min.js') }}"></script>
<script>
    var scroll = new SmoothScroll('a[href*="#"]',{
        offset: 50,
        ignore: '[data-scroll-ignore]'
    });
</script>
<!-- plugin_path -->
<script>var plugin_path = "{{ asset('web/js/') }}";</script>


<!-- custom -->
<script src="{{ asset('web/js/custom.js') }}"></script>

<script>
    var totalProjectsValue = $('#totalProjectsValue').val();
    $("#TotalProjectsSpan").text(totalProjectsValue);

</script>

</body>

</html>