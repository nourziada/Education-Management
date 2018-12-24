@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">تحديث بيانات الملف الشخصي</h3>
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
                                            تحديث بيانات الملف الشخصي
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('update.profile')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">

                                    <div class="form-group m-form__group">
                                        <label for="name">الاسم رباعي</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $user->name }}" name="name" id="name"  placeholder="" required>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="email">البريد الالكتروني</label>
                                        <input type="email" class="form-control m-input m-input--square"
                                               value="{{ $user->email }}" name="email" id="email"  placeholder="" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="mobile">رقم الجوال</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $user->mobile }}" name="mobile" id="mobile"  placeholder="" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="phone">رقم هاتف العمل</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $user->phone }}" name="phone" id="phone"  placeholder="" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="civil_registry">السجل المدني</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $user->civil_registry }}" name="civil_registry" id="civil_registry"  placeholder="" required>
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