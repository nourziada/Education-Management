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
                            تفاصيل نموذج SWAT
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
                                            تفاصيل نموذج SWAT
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="m-timeline-3 delegate-information">
                                    <div class="m-timeline-3__items">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('report.swat.plan',$data->id) }}" class="btn btn-primary btn-block" style="color: #fff;">تصدير البيانات الى ملف Word </a>
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
                                                        اسم الخطة التشغيلية المدخلة  :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                   {{ \App\OperationalPlan::find($data->operational_plan_id)->plane_title }}
                                                </span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="m-timeline-3__item m-timeline-3__item--info">
                                                    <div class="m-timeline-3__item-desc">
                                                 <span class="m-timeline-3__item-user-name">
                                                    <span class="m-link m-link--metal m-timeline-3__item-link">
                                                      نقاط القوة :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                    {{ $data->strong }}
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
                                                        نقاط الضعف :
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                          {{ $data->week }}
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
                                                            الفرص:
                                                        </span>
                                                    </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">
                                                            {{ $data->opportunities }}
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
                                                        التهديدات:
                                                    </span>
                                                </span>
                                                        <br>
                                                        <span class="m-timeline-3__item-text">

                                                            {{ $data->threats }}
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