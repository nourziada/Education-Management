@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">اضافة نموذج إدارة مخاطر</h3>
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
                                            اضافة نموذج إدارة مخاطر
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('risks-forms.store')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group">
                                        <label for="type">نوع الخطر</label>
                                        <select class="form-control m-input" id="type" name="type" required>
                                            <option value="صحية">صحية</option>
                                            <option value="فكرية">فكرية</option>
                                            <option value="الأمن والسلامة">الأمن والسلامة</option>
                                            <option value="مهنية">مهنية</option>
                                            <option value="تعليمية">تعليمية</option>
                                            <option value="تقنية">تقنية</option>
                                        </select>
                                    </div>


                                    <div class="form-group m-form__group" >
                                        <label for="name">اسم الخطر</label>
                                        <input type="text" class="form-control m-input m-input--square" name="name" id="name"  placeholder="أدخل اسم الخطر  " required>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="description">وصف الخطر المحتمل</label>
                                        <textarea class="form-control m-input m-input--square" name="description" placeholder="أدخل وصف الخطر المحتمل" required></textarea>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="level">درجة ومستوى الخطورة</label>
                                        <select class="form-control m-input" id="level" name="level" required>
                                            <option value="عالي جداً">عالي جداً</option>
                                            <option value="عال">عال</option>
                                            <option value="متوسط">متوسط</option>
                                            <option value="منخفض">منخفض</option>
                                            <option value="نادر">نادر</option>
                                        </select>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="protection">عناصر الوقاية من الخطر</label>
                                        <textarea class="form-control m-input m-input--square" name="protection" placeholder="أدخل عناصر الوقاية من الخطر " required></textarea>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="effect">تأثير الخطر حال وقوعه</label>
                                        <select class="form-control m-input" id="effect" name="effect" required>
                                            <option value="عالي جداً">عالي جداً</option>
                                            <option value="عال">عال</option>
                                            <option value="متوسط">متوسط</option>
                                            <option value="منخفض">منخفض</option>
                                            <option value="نادر">نادر</option>
                                        </select>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="responsible">الجهة المسؤولة عن إجراءات منع الخطر</label>
                                        <textarea class="form-control m-input m-input--square" name="responsible" placeholder="أدخل الجهة المسؤولة عن إجراءات منع الخطر   " required></textarea>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="treatment">عناصر معالجة وانهاء الخطر</label>
                                        <textarea class="form-control m-input m-input--square" name="treatment" placeholder="أدخل عناصر معالجة وانهاء الخطر   " required></textarea>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="end">الجهة المسؤولة عن إجراءات انهاء الخطر</label>
                                        <textarea class="form-control m-input m-input--square" name="end" placeholder="أدخل الجهة المسؤولة عن إجراءات انهاء الخطر  " required></textarea>
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
