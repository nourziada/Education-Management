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
                                النماذج التي تمت الموافقة عليها
                            @elseif($type == 2)
                                النماذج بإنتظار الموافقة
                            @elseif($type == 3)
                                النماذج المحذوفة
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
                                                النماذج التي تمت الموافقة عليها
                                            @elseif($type == 2)
                                                النماذج بإنتظار الموافقة
                                            @elseif($type == 3)
                                                النماذج المحذوفة
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
                                        <th>#</th>
                                        <th>اسم المستخدم</th>
                                        <th>نوع الخطر</th>
                                        <th>اسم الخطر</th>
                                        <th>درجة ومستوى الخطورة</th>
                                        <th>الحالة</th>
                                        <th>الإجراءات</th>
                                        <th>التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php $count = 1; @endphp
                                    @forelse($projects as $project)

                                        @php $user =  \App\User::find($project->user_id); @endphp

                                        <tr>
                                            <td>{{ $count++ }}</td>

                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $project->type }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->level }}</td>


                                            <td data-field="Status" class="m-datatable__cell">
                                                @if($project->is_confirmed == 1)


                                                    @if($project->is_deleted == 0)
                                                        <span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">فعال</span></span>
                                                    @elseif($project->is_deleted == 1)
                                                        <span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">محذوف</span></span>
                                                    @endif

                                                @elseif($project->is_confirmed == 0)

                                                    @if($project->status == 1)
                                                        <span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">بإنتظار الموافقة على الإضافة</span></span>
                                                    @elseif($project->status == 2)
                                                        <span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">بإنتظار الموافقة على التعديل</span></span>
                                                    @elseif($project->status == 3)
                                                        <span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">بإنتظار الموافقة على الحذف</span></span>
                                                    @endif
                                                @endif

                                            </td>

                                            <td>

                                                <div class="dropdown ">
                                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        @if($project->is_confirmed == 0)
                                                            <a class="dropdown-item" href="{{ route('admin.risks.accept',$project->id) }}">
                                                                <i class="la la-check-circle"></i>الموافقة
                                                            </a>
                                                        @endif


                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <a href="{{ route('admin.risks.details',$project->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>

                                        </tr>


                                    @empty

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