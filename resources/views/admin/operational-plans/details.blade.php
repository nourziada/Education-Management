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
                            تفاصيل الخطة التشغيلية
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
                                            تفاصيل الخطة التشغيلية
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="m-timeline-3 delegate-information">
                                    <div class="m-timeline-3__items">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('report.operational.plan',$data->id) }}" class="btn btn-primary btn-block" style="color: #fff;">تصدير البيانات الى ملف Word </a>
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
                                                        الخطة التشغيلية :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->plane_type }}
                                                </span>

                                                    </div>
                                                </div>
                                            </div>

                                            @if($data->plane_type == 'مدرسة')
                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                 <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        اسم المدرسة :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->school_name }}
                                                </span>

                                                    </div>
                                                </div>
                                            </div>
                                            @endif

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
                                                            مؤشرات الأداء الاستراتيجية :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            @php $meas = \App\Measurement::find($data->strategic_indicators); @endphp

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
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                        عنوان المبادرة الوزارية المرتبطة:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            @php $associated_title = \App\MinisterialInitiatives::find($data->associated_title); @endphp

                                                            @if($associated_title != null)
                                                                {{ $associated_title->name }}
                                                            @else
                                                                -
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
                                                            الأهداف التفصيلية :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        {{ $data->detailed_objectives }}
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
                                                        مؤشرات الأداء التفصيلية:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->detailed_indicators }}
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
                                                            عنوان المبادرة الاستراتيجية للإدارة المرتبطة :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        @php $initiative_title = \App\StrategicInitiatives::find($data->initiative_title); @endphp

                                                            @if($initiative_title != null)
                                                                {{ $initiative_title->name }}
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
                                                        اسم البرنامج:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->plane_title }}
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
                                                            المتطلبات :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        {{ $data->requirements }}
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
                                                        المستهدفون:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->targeted }}
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
                                                        زمن التنفيذ (من) ميلادي:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->ad_execution_time_from }}
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
                                                            زمن التنفيذ (الى) ميلادي :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        {{ $data->ad_execution_time_to }}
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
                                                        مكان التنفيذ:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->place }}
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
                                                            جهات التنفيذ الرئيسية :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                         {{ $data->main_implementing }}

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
                                                        جهات التنفيذ المساندة:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->sub_implementing }}
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
                                                            التكلفة :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                        {{ $data->cost }}
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
                                                        رقم المبادرة الوزارية المتأثرة:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->ministerial_number }}
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
                                                            رقم المؤشر الاستراتيجي المتأثر :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                         {{ $data->strategic_number }}

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
                                                        رقم المؤشر التفصيلي المتأثر:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->detailed_number }}
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