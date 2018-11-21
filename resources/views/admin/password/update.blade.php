@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @if(Auth::user()->admin == 1)
            @include('includes.menu-admin')
        @else
            @include('includes.menu-management')
        @endif
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">تغيير كلمة المرور</h3>
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
                                            تغيير كلمة المرور
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('update.password')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group">
                                        <label for="exampleInputEmail1">كلمة المرور القديمة</label>
                                        <input type="text" class="form-control m-input m-input--square" name="old_password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="كلمة المرور القديمة" required>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="exampleInputEmail1">كلمة المرور الجديدة</label>
                                        <input type="text" class="form-control m-input m-input--square" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل كلمة المرور الجديدة" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="exampleInputEmail1">تأكيد كلمة المرور الجديدة</label>
                                        <input type="text" class="form-control m-input m-input--square" name="password_confirmation" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أعد كتابة كلمة المرور الجديدة" required>
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