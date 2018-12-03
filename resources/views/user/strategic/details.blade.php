@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            تفاصيل الخطة الاستراتيجية
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
                                            تفاصيل الخطة الاستراتيجية
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="m-timeline-3 delegate-information">
                                    <div class="m-timeline-3__items">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('report.strategic.plan',$data->id) }}" class="btn btn-primary btn-block" style="color: #fff;">تصدير البيانات الى ملف Word </a>
                                            </div>

                                            <div class="col-md-6">
                                                <a href="#" class="btn btn-outline-warning btn-block" id="print-window">طباعة التقرير</a>
                                            </div>
                                        </div>


                                        <br>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                 <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        الإدارة :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    @if($data->management == 1)
                                                                الإدارات المرتبطة
                                                            @elseif($data->management == 2)
                                                                الموارد البشرية
                                                            @elseif($data->management == 3)
                                                                الشؤون المالية والادارية
                                                            @elseif($data->management == 4)
                                                                شؤون المباني
                                                            @elseif($data->management == 5)
                                                                الشؤون المدرسية
                                                            @elseif($data->management == 6)
                                                                الشؤون التعليمية - بنين
                                                            @elseif($data->management == 7)
                                                                الشؤون التعليمية - بنات
                                                            @endif
                                                </span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                 <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        القسم :
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

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                    <div class="m-timeline-3__item-desc">
                                                <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        الهدف الاستراتيجي:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            @php $strategic = \App\StrategicGoal::find($data->strategic_goal); @endphp

                                                            @if($strategic != null)
                                                                {{ $strategic->name }}
                                                            @else
                                                                -
                                                            @endif
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
                                                            المبادرات :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            @php $init = \App\Initiative::find($data->initiatives); @endphp

                                                            @if($init != null)
                                                                {{ $init->name }}
                                                            @else
                                                                -
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
                                                        المستهدفون:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->target }}
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
                                                            مؤشر قياس الأداء :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        @php $meas = \App\Measurement::find($data->measurement); @endphp

                                                            @if($meas != null)
                                                                {{ $meas->name }}
                                                            @else
                                                                -
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
                                                        الجهة المسؤولة:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                             @if($data->management == 1)
                                                                الإدارات المرتبطة
                                                            @elseif($data->management == 2)
                                                                الموارد البشرية
                                                            @elseif($data->management == 3)
                                                                الشؤون المالية والادارية
                                                            @elseif($data->management == 4)
                                                                شؤون المباني
                                                            @elseif($data->management == 5)
                                                                الشؤون المدرسية
                                                            @elseif($data->management == 6)
                                                                الشؤون التعليمية - بنين
                                                            @elseif($data->management == 7)
                                                                الشؤون التعليمية - بنات
                                                            @endif
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

    @push('js')
        <script>
            $('#print-window').click(function() {
                window.print();
            });
        </script>
    @endpush


@stop