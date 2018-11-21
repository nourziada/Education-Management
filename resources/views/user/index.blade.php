@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">لوحة التحكم</h3>
                    </div>

                </div>

                @if(Auth::user()->status != 1)
                    <div role="alert" class="alert alert-danger" role="alert">
                        <strong></strong> عذراً ، ولكن حسابك غير موثق حتى الآن من قبل مدير النظام ، يرجى الانتظار الى حين توثيق حسابك من خلال مدير النظام
                    </div>
                @endif
            </div>



            <!-- END: Subheader -->
            <div class="m-content">
                <div class="row">
                    <div class="col-xl-12">

                        <!--begin:: Widgets/Activity-->
                        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light
                         m-portlet--rounded-force">
                            <div class="m-portlet__head" style="margin-bottom: 25px;">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text m--font-light">
                                            إحصائيات
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">
                                <div class="m-widget17">

                                    <div class="m-widget17__stats">
                                        <div class="m-widget17__items m-widget17__items-col1">
                                            <div class="m-widget17__item" style="box-shadow: 1px 1px 1px 1px #086855;">
														<span class="m-widget17__icon">
															<i class="flaticon-doc m--font-brand"></i>
														</span>
                                                <span class="m-widget17__subtitle">
															الخطط الإستراتيجية المضافة
														</span>
                                                <span class="m-widget17__desc">
															15 خطة استراتيجية
														</span>
                                            </div>
                                            <div class="m-widget17__item" style="box-shadow: 1px 1px 1px 1px #086855;">
														<span class="m-widget17__icon">
															<i class="flaticon-paper-plane m--font-info"></i>
														</span>
                                                <span class="m-widget17__subtitle">
															الخطط التشغيلية المضافة
														</span>
                                                <span class="m-widget17__desc">
															72 خطة تشغيلية
														</span>
                                            </div>
                                        </div>
                                        <div class="m-widget17__items m-widget17__items-col2">
                                            <div class="m-widget17__item" style="box-shadow: 1px 1px 1px 1px #086855;">
														<span class="m-widget17__icon">
															<i class="flaticon-pie-chart m--font-success"></i>
														</span>
                                                <span class="m-widget17__subtitle">
															نماذج SWAT
														</span>
                                                <span class="m-widget17__desc">
															72 نموذج
														</span>
                                            </div>
                                            <div class="m-widget17__item " style="box-shadow: 1px 1px 1px 1px #086855;">
														<span class="m-widget17__icon">
															<i class="flaticon-time m--font-danger"></i>
														</span>
                                                <span class="m-widget17__subtitle">
															نماذج إدارة المخاطر
														</span>
                                                <span class="m-widget17__desc">
															72 نموذج ادارة مخاطر
														</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end:: Widgets/Activity-->
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop