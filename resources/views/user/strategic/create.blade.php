@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">اضافة خطة استراتيجية جديدة</h3>
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
                                            اضافة خطة استراتيجية جديدة
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('strategic.store')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">
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
                                        <label for="initiatives">المبادرات</label>
                                        <select class="form-control m-input" id="initiatives" name="initiatives" required>
                                            @forelse($initiatives as $ini)
                                                <option value="{{ $ini->id }}">{{ $ini->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="target">المستهدفون</label>
                                        <input type="text" class="form-control m-input m-input--square" name="target" id="target"  placeholder="قم بتعبئة المستهدفون" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="measurement">مؤشر قياس الأداء</label>
                                        <select class="form-control m-input" id="measurement" name="measurement" required>
                                            @forelse($measurements as $meas)
                                                <option value="{{ $meas->id }}">{{ $meas->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>



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
        $("#strategic_goal").change(function () {
            var strategic_goal_id = document.getElementById("strategic_goal").value;
            var initiatives = $('#initiatives').empty();
            var measurements = $('#measurement').empty();
            $.ajax
            ({
                type: "get",
                url: "/system-dashboard/get-strategic-initiatives-menu/" + strategic_goal_id,
                cache: false,
                success: function (html) {
                    $.each(html, function (i, v) {

                        $('<option value="' + v.id + '">' + v.name + '</option>').appendTo(initiatives);

                    });

                }
            });

            $.ajax
            ({
                type: "get",
                url: "/system-dashboard/get-strategic-measurement-menu/" + strategic_goal_id,
                cache: false,
                success: function (html) {
                    $.each(html, function (i, v) {

                        $('<option value="' + v.id + '">' + v.name + '</option>').appendTo(measurements);

                    });

                }
            });
        });
    </script>
    {{-- End Menu Ajax--}}

    @endpush


@stop