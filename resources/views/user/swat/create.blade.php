@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">اضافة نموذج swat جديد</h3>
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
                                            اضافة نموذج swat جديد
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('swat.store')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group">
                                        <label for="operational_plan_id">اسم الخطة التشغيلية المدخلة</label>
                                        <select class="form-control m-input" id="operational_plan_id" name="operational_plan_id" required>
                                            @forelse($operationals as $op)
                                                <option value="{{ $op->id }}">{{ $op->plane_title }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>




                                    <div class="form-group m-form__group">
                                        <label for="strong">نقاط القوة</label>
                                        <textarea class="form-control m-input m-input--square" name="strong" placeholder="أدخل نقاط القوة " required></textarea>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="week">نقاط الضعف</label>
                                        <textarea class="form-control m-input m-input--square" name="week" placeholder="أدخل نقاط الضعف " required></textarea>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="opportunities">الفرص</label>
                                        <textarea class="form-control m-input m-input--square" name="opportunities" placeholder="أدخل الفرص " required></textarea>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="threats">التهديدات</label>
                                        <textarea class="form-control m-input m-input--square" name="threats" placeholder="أدخل التهديدات " required></textarea>
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




@stop
