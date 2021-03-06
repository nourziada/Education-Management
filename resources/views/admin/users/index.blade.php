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
                            @if($type == 1)
                                الأعضاء بإنتظار الموافقة
                            @elseif($type == 2)
                                الأعضاء الموافق عليهم
                            @elseif($type == 3)
                                الأعضاء المرفوضين
                            @endif
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
                                            @if($type == 1)
                                                الأعضاء بإنتظار الموافقة
                                            @elseif($type == 2)
                                                الأعضاء الموافق عليهم
                                            @elseif($type == 3)
                                                الأعضاء المرفوضين
                                            @endif
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
                                        <th>نوع الحساب</th>
                                        <th>اسم المستخدم</th>
                                        <th>الاسم / اسم المدرسة</th>
                                        <th>البريد الالكتروني</th>
                                        <th>رقم الجوال</th>
                                        <th>الأجراء</th>
                                        <th>التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php $count = 1; @endphp
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                @if($user->account_type == 1)
                                                    إدارة - قسم
                                                @elseif($user->account_type == 2)
                                                    باحث تربوي
                                                @elseif($user->account_type == 3)
                                                    مدرسة
                                                @endif
                                            </td>

                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>

                                            <td>

                                                <div class="dropdown ">
                                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        @if($user->status == 0 || $user->status == 2)
                                                        <a class="dropdown-item" href="{{ route('admin.users.action',[1,$user->id]) }}">
                                                            <i class="la la-check-circle"></i> قبول المستخدم
                                                        </a>
                                                        @endif

                                                        @if($user->status == 1)
                                                        <a class="dropdown-item" href="{{ route('admin.users.action',[2,$user->id]) }}">
                                                            <i class="la la-close"></i> رفض العضوية
                                                        </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.users.details',$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
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