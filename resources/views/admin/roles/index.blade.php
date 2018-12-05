@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-admin')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            المستخدمين المسؤولين عن النظام وصلاحياتهم
                        </h3>
                    </div>

                </div>
            </div>

            <!-- END: Content -->
            <div class="m-content">
                <div class="row">
                    <div class="col-12">
                        <div class="m-portlet m-portlet--full-height ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            المستخدمين المسؤولين عن النظام وصلاحياتهم
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <table class="table table-striped- table-bordered table-hover table-checkable"
                                       id="m_table_1">
                                    <thead>


                                    <tr>
                                        <th>رقم.</th>
                                        <th>اسم المستخدم</th>
                                        <th>الصلاحيات</th>
                                        <th>الأجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php $count = 1; @endphp
                                    @forelse($users as $user)

                                        @if($user->email != 'admin@admin.com')
                                            <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $user->user_name }}</td>


                                            <td>
                                                <div class="m-list-timeline">
                                                    <div class="m-list-timeline__items">

                                                        @php $roles = \App\AdminRole::where('user_id',$user->id)->get(); @endphp

                                                        @forelse($roles as $role)
                                                        <div class="m-list-timeline__item">
                                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                                            <span class="m-list-timeline__text">
                                                                @if($role->role_id == 1)
                                                                    الاطلاع على التقارير وطباعتها لجميع الادارات
                                                                @elseif($role->role_id == 2)
                                                                    الإطلاع على التقارير وطباعتها لإدارة
                                                                    @if($role->management_id == 1)
                                                                        الإدارات المرتبطة
                                                                    @elseif($role->management_id == 2)
                                                                        الموارد البشرية
                                                                    @elseif($role->management_id == 3)
                                                                        الشؤون المالية والادارية
                                                                    @elseif($role->management_id == 4)
                                                                        شؤون المباني
                                                                    @elseif($role->management_id == 5)
                                                                        الشؤون المدرسية
                                                                    @elseif($role->management_id == 6)
                                                                        الشؤون التعليمية - بنين
                                                                    @elseif($role->management_id == 7)
                                                                        الشؤون التعليمية - بنات
                                                                    @endif

                                                                @elseif($role->role_id == 3)
                                                                    @if($role->management_id == 0)
                                                                        حذف و قبول التقارير جميع الادارات
                                                                    @else
                                                                        حذف او قبول التقارير لإدارة
                                                                        @if($role->management_id == 1)
                                                                            الإدارات المرتبطة
                                                                        @elseif($role->management_id == 2)
                                                                            الموارد البشرية
                                                                        @elseif($role->management_id == 3)
                                                                            الشؤون المالية والادارية
                                                                        @elseif($role->management_id == 4)
                                                                            شؤون المباني
                                                                        @elseif($role->management_id == 5)
                                                                            الشؤون المدرسية
                                                                        @elseif($role->management_id == 6)
                                                                            الشؤون التعليمية - بنين
                                                                        @elseif($role->management_id == 7)
                                                                            الشؤون التعليمية - بنات
                                                                        @endif
                                                                    @endif

                                                                @elseif($role->role_id == 4)
                                                                    إنشاء مستخدمين وصلاحياتهم
                                                                @elseif($role->role_id == 5)
                                                                    الاطلاع وقبول طلبات تقارير البحوث التربوية
                                                                @elseif($role->role_id == 6)
                                                                    تفعيل المستخدمين المسجلين في الموقع
                                                                @endif
                                                            </span>
                                                        </div>

                                                        @empty
                                                        @endforelse

                                                    </div>
                                                </div>
                                            </td>


                                            <td>

                                                <div class="dropdown ">
                                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#deleteModal{{ $user->id }}">
                                                            <i class="la la-close"></i> حذف العضوية
                                                        </a>

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                            <div id="deleteModal{{ $user->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">حذف !</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>هل أنت متأكد من قيامك بالحذف ؟</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('roles.destroy',$user->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit" class="btn btn-danger">حذف</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                        @empty
                                            لا يوجد أعضاء
                                        @endforelse



                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    @push('js')

        <script src="{{ asset('dashboard/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script>
            var DatatablesBasicHeaders = function () {

                var initTable1 = function () {
                    var table = $('#m_table_1');

                    // begin first table
                    table.DataTable({
                        responsive: true,

                    });
                };

                return {

                    //main function to initiate the module
                    init: function () {
                        initTable1();
                    },

                };

            }();

            jQuery(document).ready(function () {
                DatatablesBasicHeaders.init();
            });
        </script>

    @endpush
@stop