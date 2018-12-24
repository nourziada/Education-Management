@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">اضافة خطة تشغيلية جديدة</h3>
                    </div>

                </div>
            </div>

            <!-- END: Content -->


            <div class="m-content">
                <div class="row">

                    <div class="col-md-12">

                        <!--begin::Portlet-->
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                        <h3 class="m-portlet__head-text">
                                            اضافة خطة تشغيلية جديدة
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('operational-plans.store')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">

                                    <div class="form-group m-form__group">
                                        <label for="initiatives">الخطة التشغيلية</label>
                                        <select class="form-control m-input" name="plane_type" id="plane_type" required>
                                            <option value="1">إدارة</option>
                                            <option value="2">مدرسة</option>
                                        </select>
                                    </div>

                                    <div class="form-group m-form__group d-none" id="is_school">
                                        <label for="target">اسم المدرسة</label>
                                        <input type="text" class="form-control m-input m-input--square" name="school_name" id="school_name"  placeholder="أدخل اسم المدرسة  ">
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="strategic_goal">الهدف الاستراتيجي</label>
                                        <select class="form-control m-input" id="strategic_goal" name="strategic_goal" required>
                                            @forelse($strategic_goals as $goal)
                                            <option value="{{ $goal->id }}">{{ $goal->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="measurement">مؤشرات الأداء الاستراتيجية</label>
                                        <select class="form-control m-input" id="measurement" name="strategic_indicators" required>
                                            @forelse($measurements as $meas)
                                                <option value="{{ $meas->id }}">{{ $meas->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="associated_title">عنوان المبادرة الوزارية المرتبطة</label>
                                        <select class="form-control m-input" id="associated_title" name="associated_title" required>

                                            @forelse($ministerialInitiatives as $mini)
                                                <option value="{{ $mini->id }}">{{ $mini->name }}</option>
                                            @empty
                                            @endforelse
                                            {{-- Code Here --}}

                                        </select>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="initiative_title">عنوان المبادرة الاستراتيجية للإدارة المرتبطة</label>
                                        <select class="form-control m-input" id="initiative_title" name="initiative_title" required>


                                            {{-- Code Here --}}
                                            @forelse($strategicInitiatives as $sInit)
                                                <option value="{{ $sInit->id }}"> {{ $sInit->name }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="detailed_objectives">الأهداف التفصيلية</label>
                                        <textarea class="form-control m-input m-input--square" name="detailed_objectives" placeholder="أدخل الأهداف التفصيلية " required></textarea>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="detailed_indicators">مؤشرات الأداء التفصيلية</label>
                                        <textarea class="form-control m-input m-input--square" name="detailed_indicators" placeholder="أدخل مؤشرات الأداء التفصيلية " required></textarea>
                                    </div>





                                    <div class="form-group m-form__group">
                                        <label for="plane_title">اسم البرنامج</label>
                                        <input type="text" class="form-control m-input m-input--square" name="plane_title" id="plane_title"  placeholder="أدخل اسم البرنامج  " required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="requirements">المتطلبات</label>
                                        <textarea class="form-control m-input m-input--square" name="requirements" placeholder="أدخل المتطلبات " required></textarea>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="targeted">المستهدفون</label>
                                        <textarea class="form-control m-input m-input--square" name="targeted" placeholder="أدخل المستهدفون " required></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6" >
                                            <div class="form-group m-form__group">
                                                <label for="ad_execution_time_from">زمن التنفيذ : من</label>
                                                <input type="date" class="form-control m-input m-input--square" name="ad_execution_time_from" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-form__group">
                                                <label for="ad_execution_time_to"> الى</label>
                                                <input type="date" class="form-control m-input m-input--square" name="ad_execution_time_to" id="ad_execution_time_to" required>
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    {{--<div class="row">--}}
                                        {{--<div class="col-lg-6" >--}}
                                            {{--<div class="form-group m-form__group">--}}
                                                {{--<label for="hijri_execution_time_from"> زمن التنفيذ (من) هجري</label>--}}
                                                {{--<input type="text" class="form-control m-input m-input--square" name="hijri_execution_time_from" disabled>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-lg-6">--}}
                                            {{--<div class="form-group m-form__group">--}}
                                                {{--<label for="hijri_execution_time_to">زمن التنفيذ (الى) هجري</label>--}}
                                                {{--<input type="text" class="form-control m-input m-input--square" name="hijri_execution_time_to" id="hijri_execution_time_to" disabled>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                    <div class="form-group m-form__group">
                                        <label for="place">مكان التنفيذ</label>
                                        <input type="text" class="form-control m-input m-input--square" name="place" id="place"  placeholder="أدخل مكان التنفيذ  " required>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="main_implementing">جهات التنفيذ الرئيسية</label>
                                        <select class="form-control m-input" id="main_implementing" name="main_implementing" required>


                                            {{-- Code Here --}}
                                            @php $managements = \App\Management::get(); @endphp
                                            @forelse($managements as $manag)
                                                <option value="{{ $manag->name }}">{{ $manag->name }}</option>
                                            @empty
                                            @endforelse


                                        </select>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="sub_implementing">جهات التنفيذ المساندة</label>

                                        <select class="form-control m-input" id="sub_implementing" name="sub_implementing" required>


                                            {{-- Code Here --}}
                                            @php $managements = \App\Management::get(); @endphp
                                            @forelse($managements as $manag)
                                                <option value="{{ $manag->name }}">{{ $manag->name }}</option>
                                            @empty
                                            @endforelse


                                        </select>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="cost">التكلفة</label>
                                        <input type="text" class="form-control m-input m-input--square" name="cost" id="cost"  placeholder="أدخل التكلفة  " required>
                                    </div>


                                    {{--<div class="form-group m-form__group">--}}
                                        {{--<label for="ministerial_number">رقم المبادرة الوزارية المتأثرة</label>--}}
                                        {{--<input type="text" class="form-control m-input m-input--square" name="ministerial_number" id="ministerial_number"  placeholder="أدخل رقم المبادرة الوزارية المتأثرة  " required>--}}
                                    {{--</div>--}}


                                    {{--<div class="form-group m-form__group">--}}
                                        {{--<label for="strategic_number">رقم المؤشر الاستراتيجي المتأثر </label>--}}
                                        {{--<input type="text" class="form-control m-input m-input--square" name="strategic_number" id="strategic_number"  placeholder="أدخل رقم المؤشر الاستراتيجي المتأثر   " required>--}}
                                    {{--</div>--}}


                                    {{--<div class="form-group m-form__group">--}}
                                        {{--<label for="detailed_number">رقم المؤشر التفصيلي المتأثر</label>--}}
                                        {{--<input type="text" class="form-control m-input m-input--square" name="detailed_number" id="detailed_number"  placeholder="أدخل رقم المؤشر التفصيلي المتأثر  " required>--}}
                                    {{--</div>--}}




                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <button type="submit" class="btn btn-success">أرسل</button>
                                        <button type="reset" class="btn btn-secondary">الغاء</button>
                                    </div>
                                </div>
                            </form>

                            <!--end::Form-->
                        </div>

                        <!--end::Portlet-->

                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('js')

    {{-- Code For Get Initiatives And Measurements Menu Ajax--}}
    <script>


        {{-- Code For Show Or Hide School Name--}}
        $("#plane_type").change(function () {
            var val = $(this).val();
            if (val == "2") {
                $("#is_school").removeClass('d-none');
            }
            else if (val == "1") {
                $("#is_school").addClass('d-none');
            }
        });

        {{-- End Code --}}

        {{-- Code for Get the Ministerial Initiatives المبادرات الوزارية عندما يتم تغيير مؤشرات الأداء--}}
        $("#measurement").change(function () {
            var measurement_id = document.getElementById("measurement").value;
            var associated_title = $('#associated_title').empty();
            $.ajax
            ({
                type: "get",
                url: "/system-dashboard/get-ministerial-initiatives-menu/" + measurement_id,
                cache: false,
                success: function (html) {
                    $.each(html, function (i, v) {

                        $('<option value="' + v.id + '">' + v.name + '</option>').appendTo(associated_title);

                    });

                }
            });

        });


        $("#strategic_goal").change(function () {
            var strategic_goal_id = document.getElementById("strategic_goal").value;
            var measurements = $('#measurement').empty();
            var associated_title = $('#associated_title').empty();
            var initiative_title = $('#initiative_title').empty();
            var newMeasurementId;

            // Get the Measurement مؤشرات الاداء and Get Ministerial Initiatives المبادرات الوزارية
            $.ajax
            ({
                type: "get",
                url: "/system-dashboard/get-strategic-measurement-menu/" + strategic_goal_id,
                cache: false,
                success: function (html) {
                    $.each(html, function (i, v) {

                        $('<option value="' + v.id + '">' + v.name + '</option>').appendTo(measurements);

                    });

                    newMeasurementId  =  html[0].id;
                    // Code For get the new Ministerial Initiatives المبادرات الوزارية بناءً على مؤشرات القياس الجديدة
                    $.ajax
                    ({
                        type: "get",
                        url: "/system-dashboard/get-ministerial-initiatives-menu/" + newMeasurementId,
                        cache: false,
                        success: function (html) {
                            $.each(html, function (i, v) {

                                $('<option value="' + v.id + '">' + v.name + '</option>').appendTo(associated_title);

                            });

                        }
                    });

                }
            });


            // Get the Strategic Initiatives المبادرات الادارية
            $.ajax
            ({
                type: "get",
                url: "/system-dashboard/get-strategic-initiatives-managements-menu/" + strategic_goal_id,
                cache: false,
                success: function (html) {
                    $.each(html, function (i, v) {

                        $('<option value="' + v.id + '">' + v.name + '</option>').appendTo(initiative_title);

                    });

                }
            });
        });
    </script>
    {{-- End Menu Ajax--}}

    @endpush


@stop
