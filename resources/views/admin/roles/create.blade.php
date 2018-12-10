@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-admin')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">اضافة مستخدم جديد وصلاحياته</h3>
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
                                            اضافة مستخدم جديد وصلاحياته
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            @include('includes.errors')

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('roles.store')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">



                                    <div class="form-group m-form__group">
                                        <label for="user_name">اسم المستخدم</label>
                                        <input type="text" class="form-control m-input m-input--square" name="user_name" id="user_name"  placeholder="قم بإدخال اسم المستخدم" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="password">كلمة المرور</label>
                                        <input type="password" class="form-control m-input m-input--square" name="password" id="password"  placeholder="قم بإدخال كلمة المرور للمستخدم" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                                        <input type="password" class="form-control m-input m-input--square" name="password_confirmation" id="password_confirmation"  placeholder="قم بإعادة ادخال كلمة المرور للمستخدم" required>
                                    </div>



                                    <div class="form-group m-form__group">
                                        <label for="management_id">الإدارة المسؤول عنها</label>
                                        <select class="form-control m-input" id="management_id" name="management_id" required>
                                            <option value="0" selected>جميع الإدارات</option>

                                            @php $managements = \App\Management::get(); @endphp
                                            @forelse($managements as $manag)
                                                <option value="{{ $manag->id }}">{{ $manag->name }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>

                                    <div class="m-form__group form-group">
                                        <label>اختر الصلاحيات المسؤول عنها</label>


                                        <div class="m-checkbox-list">
                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                <input type="checkbox" name="roles[]" value="1"> الاطلاع على التقارير وطباعتها للإدارة المختارة في الاعلى
                                                <span></span>
                                            </label>

                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                <input type="checkbox" name="roles[]" value="2"> حذف و قبول التقارير للإدارة المختارة في الأعلى
                                                <span></span>
                                            </label>


                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                <input type="checkbox" name="roles[]" value="3"> إنشاء مستخدمين وصلاحياتهم
                                                <span></span>
                                            </label>


                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                <input type="checkbox" name="roles[]" value="4"> الاطلاع وقبول طلبات تقارير البحوث التربوية
                                                <span></span>
                                            </label>

                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                <input type="checkbox" name="roles[]" value="5"> تفعيل المستخدمين المسجلين في الموقع
                                                <span></span>
                                            </label>
                                        </div>
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