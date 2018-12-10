@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-admin')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">تعديل بيانات القسم</h3>
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
                                            تعديل بيانات القسم
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('department-menus.update',$data->id)}}" method="POST">

                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="m-portlet__body">



                                    <div class="form-group m-form__group">
                                        <label for="exampleInputEmail1">اسم القسم</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                              value="{{ $data->name }}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل اسم القسم" required>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="management_id">الادارة التي يتبع لها هذا القسم</label>
                                        <select class="form-control m-input" id="management_id" name="management_id" required>
                                            @forelse($managements as $mang)
                                                <option value="{{ $mang->id }}" @if($mang->id == $data->management_id) selected @endif>{{ $mang->name }}</option>
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


@stop