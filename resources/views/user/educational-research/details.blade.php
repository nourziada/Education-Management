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
                            تفاصيل نموذج البحث التربوي
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
                                            تفاصيل نموذج البحث التربوي
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="m-timeline-3 delegate-information">
                                    <div class="m-timeline-3__items">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('report.research.plan',$data->id) }}" class="btn btn-primary btn-block" style="color: #fff;">تصدير البيانات الى ملف Word </a>
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
                                                        اسم الباحث الرباعي    :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                   {{ $data->name }}
                                                </span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                 <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                      رقم السجل المدني   :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->id_number }}
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
                                                        جهة العمل  :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                          {{ $data->work }}
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
                                                            رقم الجوال  :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            {{ $data->mobile }}
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
                                                        البريد الالكتروني :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->email }}
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
                                                            المؤهل الحالي :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->qualification }}
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
                                                        الجامعة :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                          {{ $data->uni }}
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
                                                            الكلية :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            {{ $data->college }}
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
                                                        التخصص :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->specialization }}
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
                                                        عنوان البحث  :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                          {{ $data->search_title }}
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
                                                            الهدف من البحث :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            {{ $data->search_goal }}
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
                                                        تاريخ التطبيق :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->chapter_date }}
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
                                                            المستهدفون :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->targets }}
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
                                                        الجهة المشرفة  :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                          {{ $data->authority }}
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
                                                            عنوان الجهة :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            {{ $data->authority_address }}
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
                                                        الجهة المستفيدة :
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
                                                            اداة البحث  :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->search_tool }}
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
                                                        (المرفقات) ادوات البحث - استبانة  :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            <a href="{{ asset('/uploads/' . $data->search_tools) }}">أضغط هنا للمعاينة</a>
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
                                                            (المرفقات) خطاب الموافقة على إجراء البحث :
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            <a href="{{ asset('/uploads/' . $data->search_tools) }}">أضغط هنا للمعاينة</a>
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
                                                        اسم المستخدم :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            @php $user =  \App\User::find($data->user_id); @endphp
                                                            {{ $user->user_name }}
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