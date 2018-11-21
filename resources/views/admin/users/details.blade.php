@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-admin')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            تفاصيل العضوية
                        </h3>
                    </div>

                </div>
            </div>

            <!-- END: Content -->
            <div class="m-content">
                <div class="row">
                    <div class="col-12">
                        <div class="m-portlet m-portlet--full-height ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            تفاصيل عضوية : {{ $user->name }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="m-timeline-3 delegate-information">
                                    <div class="m-timeline-3__items">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                 <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        الاسم / اسم المدرسة:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $user->name }}
                                                </span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--warning">
                                                    <div class="m-timeline-3__item-desc">
                                                 <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        نوعية الحساب:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            @if($user->account_type == 1)
                                                                إدارة - قسم
                                                            @elseif($user->account_type == 2)
                                                                باحث تربوي
                                                            @elseif($user->account_type == 3)
                                                                مدرسة
                                                            @endif
                                                </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                    <div class="m-timeline-3__item-desc">
                                                <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        اسم المستخدم:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $user->user_name }}
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--success">
                                                    <div class="m-timeline-3__item-desc">
                                                    <span class="m-timeline-3__item-user-name">
                                                        <span
                                                                class="m-link m-link--metal m-timeline-3__item-link">
                                                            الإدارة
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            @if($user->management == 1)
                                                                الإدارات المرتبطة
                                                            @elseif($user->management == 2)
                                                                الموارد البشرية
                                                            @elseif($user->management == 3)
                                                                الشؤون المالية والادارية
                                                            @elseif($user->management == 4)
                                                                شؤون المباني
                                                            @elseif($user->management == 5)
                                                                الشؤون المدرسية
                                                            @elseif($user->management == 6)
                                                                الشؤون التعليمية - بنين
                                                            @elseif($user->management == 7)
                                                                الشؤون التعليمية - بنات
                                                            @endif
                                                    </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        القسم:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            @if($user->management == 1)

                                                                @if($user->department == 1)
                                                                    التخطيط والتطوير
                                                                @elseif($user->department == 2)
                                                                    تقنية المعلومات
                                                                @elseif($user->department == 3)
                                                                    الجودة الشاملة
                                                                @elseif($user->department == 4)
                                                                    الأمانة
                                                                @elseif($user->department == 5)
                                                                    الإعلام التربوي
                                                                @elseif($user->department == 6)
                                                                    العلاقات العامة
                                                                @elseif($user->department == 7)
                                                                    المراجعة الداخلية
                                                                @elseif($user->department == 8)
                                                                    المتابعة
                                                                @elseif($user->department == 9)
                                                                    الشؤون القانونية
                                                                @elseif($user->department == 10)
                                                                    القضايا
                                                                @elseif($user->department == 11)
                                                                    الأمن والسلامة
                                                                @elseif($user->department == 12)
                                                                    الشراكة المجتمعية
                                                                @elseif($user->department == 13)
                                                                    مركز التميز
                                                                @elseif($user->department == 14)
                                                                    مكتب وفاء
                                                                @endif



                                                            @elseif($user->management == 2)

                                                                @if($user->department == 1)
                                                                    تطوير الموارد البشرية
                                                                @elseif($user->department == 2)
                                                                    إدارة العمليات
                                                                @elseif($user->department == 3)
                                                                    إدارة التواصل الداخلي
                                                                @endif


                                                            @elseif($user->management == 3)

                                                                @if($user->department == 1)
                                                                    الشؤون المالية
                                                                @elseif($user->department == 2)
                                                                    الميزانية
                                                                @elseif($user->department == 3)
                                                                    المستودعات
                                                                @elseif($user->department == 4)
                                                                    المشتريات
                                                                @elseif($user->department == 5)
                                                                    الخدمات العامة
                                                                @elseif($user->department == 6)
                                                                    مراقبة المخزون
                                                                @elseif($user->department == 7)
                                                                    الاتصالات الإدارية
                                                                @endif



                                                            @elseif($user->management == 4)

                                                                @if($user->department == 1)
                                                                    التشغيل والصيانة
                                                                @elseif($user->department == 2)
                                                                    الإشراف والتنفيذ
                                                                @elseif($user->department == 3)
                                                                    الأراضي والبرمجة
                                                                @elseif($user->department == 4)
                                                                    الدراسات والتصاميم
                                                                @endif


                                                            @elseif($user->management == 5)


                                                                @if($user->department == 1)
                                                                    التخطيط المدرسي
                                                                @elseif($user->department == 2)
                                                                    التجهيزات المدرسية
                                                                @elseif($user->department == 3)
                                                                    خدمات الطلاب
                                                                @endif


                                                            @elseif($user->management == 6)


                                                                @if($user->department == 1)
                                                                    مكتب التعليم بتنومة
                                                                @elseif($user->department == 2)
                                                                    مكتب التعليم ببني عمرو
                                                                @elseif($user->department == 3)
                                                                    الإشراف التربوي
                                                                @elseif($user->department == 4)
                                                                    التدريب والابتعاث
                                                                @elseif($user->department == 5)
                                                                    الموهوبين
                                                                @elseif($user->department == 6)
                                                                    التربية الخاصة
                                                                @elseif($user->department == 7)
                                                                    التوجيه والإرشاد
                                                                @elseif($user->department == 8)
                                                                    التوعية الإسلامية
                                                                @elseif($user->department == 9)
                                                                    الاختبارات والقبول
                                                                @elseif($user->department == 10)
                                                                    النشاط الطلابي
                                                                @elseif($user->department == 11)
                                                                    تعليم الكبار
                                                                @elseif($user->department == 12)
                                                                    وحدة شراكة المدرسة مع الأسرة والمجتمع
                                                                @endif



                                                            @elseif($user->management == 7)


                                                                @if($user->department == 1)
                                                                    الإشراف التربوي
                                                                @elseif($user->department == 2)
                                                                    التدريب والابتعاث
                                                                @elseif($user->department == 3)
                                                                    الموهوبات
                                                                @elseif($user->department == 4)
                                                                    التربية الخاصة
                                                                @elseif($user->department == 5)
                                                                    التوجيه والإرشاد
                                                                @elseif($user->department == 6)
                                                                    التوعية الإسلامية
                                                                @elseif($user->department == 7)
                                                                    الاختبارات والقبول
                                                                @elseif($user->department == 8)
                                                                    نشاط الطالبات
                                                                @elseif($user->department == 9)
                                                                    تعليم الكبيرات
                                                                @elseif($user->department == 10)
                                                                    وحدة شراكة المدرسة مع الأسرة والمجتمع
                                                                @elseif($user->department == 11)
                                                                    رياض الأطفال
                                                                @endif



                                                            @endif
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--warning">
                                                    <div class="m-timeline-3__item-desc">
                                                    <span class="m-timeline-3__item-user-name">
                                                        <span
                                                                class="m-link m-link--metal m-timeline-3__item-link">
                                                            الصفة :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        {{ $user->sefa }}
                                                    </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                    <div class="m-timeline-3__item-desc">
                                                <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        رقم الجوال:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $user->mobile }}
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--success">
                                                    <div class="m-timeline-3__item-desc">
                                                    <span class="m-timeline-3__item-user-name">
                                                        <span
                                                                class="m-link m-link--metal m-timeline-3__item-link">
                                                            رقم هاتف العمل :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        {{ $user->phone }}
                                                    </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        بريد راسل:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $user->mail }}
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--warning">
                                                    <div class="m-timeline-3__item-desc">
                                                    <span class="m-timeline-3__item-user-name">
                                                        <span
                                                                class="m-link m-link--metal m-timeline-3__item-link">
                                                            السجل المدني :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        {{ $user->civil_registry }}
                                                    </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


@stop