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
                            @if($type == 1)
                                الخطط التي تمت الموافقة عليها
                            @elseif($type == 2)
                                الخطط بإنتظار الموافقة
                            @elseif($type == 3)
                                الخطط المحذوفة
                            @endif
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
                                            @if($type == 1)
                                                الخطط التي تمت الموافقة عليها
                                            @elseif($type == 2)
                                                الخطط بإنتظار الموافقة
                                            @elseif($type == 3)
                                                الخطط المحذوفة
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <table class="table table-striped- table-bordered table-hover table-checkable"
                                       id="m_table_1">
                                    <thead>


                                    <tr>
                                        <th>#</th>
                                        <th>اسم المستخدم</th>
                                        <th>الإدارة</th>
                                        <th>القسم</th>
                                        <th>الخطة التشغيلية</th>
                                        <th>الهدف الاستراتيجي</th>
                                        <th>مؤشرات الأداء الاستراتيجية</th>
                                        <th>الحالة</th>
                                        <th>الإجراءات</th>
                                        <th>التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php $count = 1; @endphp
                                    @forelse($projects as $project)

                                        @php $user =  \App\User::find($project->user_id); @endphp

                                        <tr>
                                            <td>{{ $count++ }}</td>

                                            <td>{{ $user->user_name }}</td>

                                            <td>
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
                                            </td>

                                            <td>
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
                                            </td>

                                            <td>{{ $project->plane_type }}</td>


                                            <td>
                                                @php $strategic = \App\StrategicGoal::find($project->strategic_goal); @endphp

                                                @if($strategic != null)
                                                    {{ $strategic->name }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td>
                                                @php $meas = \App\Measurement::find($project->strategic_indicators); @endphp

                                                @if($meas != null)
                                                    {{ $meas->name }}
                                                @else
                                                    -
                                                @endif
                                            </td>


                                            <td data-field="Status" class="m-datatable__cell">
                                                @if($project->is_confirmed == 1)


                                                    @if($project->is_deleted == 0)
                                                        <span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">فعال</span></span>
                                                    @elseif($project->is_deleted == 1)
                                                        <span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">محذوف</span></span>
                                                    @endif

                                                @elseif($project->is_confirmed == 0)

                                                    @if($project->status == 1)
                                                        <span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">بإنتظار الموافقة على الإضافة</span></span>
                                                    @elseif($project->status == 2)
                                                        <span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">بإنتظار الموافقة على التعديل</span></span>
                                                    @elseif($project->status == 3)
                                                        <span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">بإنتظار الموافقة على الحذف</span></span>
                                                    @endif
                                                @endif

                                            </td>

                                            <td>

                                                <div class="dropdown ">
                                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        @if($project->is_confirmed == 0)
                                                            <a class="dropdown-item" href="{{ route('admin.operational.plans.accept',$project->id) }}">
                                                                <i class="la la-check-circle"></i>الموافقة
                                                            </a>
                                                        @endif


                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <a href="{{ route('admin.operational.plans.details',$project->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                                                    <i class="far fa-eye"></i>
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

            </div>


        </div>
    </div>

    @push('js')

        <script src="{{ asset('dashboard/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script>
            var DatatablesBasicHeaders = function () {

                var initTable1 = function () {
                    var table = $('#m_table_1');

                    // begin first table
                    table.DataTable({
                        responsive: true,

                    });
                };

                return {

                    //main function to initiate the module
                    init: function () {
                        initTable1();
                    },

                };

            }();

            jQuery(document).ready(function () {
                DatatablesBasicHeaders.init();
            });
        </script>

    @endpush
@stop