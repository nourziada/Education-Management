@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-admin')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">اضافة مبادرة جديدة</h3>
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
                                            اضافة مبادرة جديدة
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('initiatives-menus.store')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="m-portlet__body">



                                    <div class="form-group m-form__group">
                                        <label for="exampleInputEmail1">المبادرة</label>
                                        <input type="text" class="form-control m-input m-input--square" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="أدخل المبادرة" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="exampleSelect1">الهدف الاستراتيجي الذي تتبع له هذه المبادرة</label>
                                        <select class="form-control m-input" id="exampleSelect1" name="strategic_goals_id">

                                            @forelse($stratigices as $str)
                                            <option value="{{ $str->id }}">{{ $str->name }}</option>
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