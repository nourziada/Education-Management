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
                            الأقسام
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
                                            الأقسام
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="col-xl-4 order-1 order-xl-2 m--align-left">
                                    <a href="{{ route('department-menus.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill button-add-custom">
												<span>
													<i class="la la-send"></i>
													<span>اضافة قسم جديد</span>
												</span>
                                    </a>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                                <table class="table table-striped- table-bordered table-hover table-checkable"
                                       id="m_table_1">
                                    <thead>


                                    <tr>
                                        <th>#</th>
                                        <th>اسم القسم</th>
                                        <th>اسم الادارة التابع له</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php $count = 1; @endphp
                                    @forelse($datas as $data)

                                        <tr>
                                            <td>{{ $count++ }}</td>

                                            <td>{{ $data->name }}</td>
                                            <td>{{ \App\Management::find($data->management_id)->name }}</td>


                                            <td>

                                                <div class="dropdown ">
                                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item" href="{{ route('department-menus.edit',$data->id) }}">
                                                            <i class="la la-check-circle"></i> تعديل القسم
                                                        </a>

                                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#deleteModal{{ $data->id }}">
                                                            <i class="la la-close"></i> حذف القسم
                                                        </a>


                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                        <div id="deleteModal{{ $data->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">حذف !</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>هل أنت متأكد من قيامك بالحذف بشكل نهائي ؟</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('department-menus.destroy',$data->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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