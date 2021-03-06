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
                            تقرير احصائي للوحة التحكم
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
                                            تقرير احصائي للوحة التحكم
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                    <form class="m-form m-form--fit m--margin-bottom-20" action="{{ route('admin.send.statistics') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="row m--margin-bottom-20">

                                            <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                                                <label>الإدارة:</label>
                                                <select class="form-control m-input" data-col-index="2" id="management" name="management">
                                                    @php $managments = \App\Management::get(); @endphp

                                                        <option value="0">الكل</option>
                                                    @forelse($managments as $manag)
                                                        <option value="{{ $manag->id }}">{{ $manag->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                                                <label>الأقسام:</label>
                                                <select class="form-control m-input" data-col-index="2" id="department" name="department">
                                                    @php $departments = \App\Department::where('management_id',$managments[0]->id)->get(); @endphp
                                                        <option value="0">الكل</option>
                                                    @forelse($departments as $dep)
                                                        <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="col-lg-6 m--margin-bottom-10-tablet-and-mobile">
                                                <label>نوع التقرير:</label>
                                                <select class="form-control m-input" data-col-index="2" name="report_type">
                                                    <option value="1">عدد البرامج المدخلة</option>
                                                    <option value="2">عدد الخطط الاستراتيجية المدخلة</option>
                                                    <option value="3">التكلفة الاجمالية للبرامج المدخلة</option>
                                                    <option value="4">عدد إدارة المخاطر المدخلة</option>
                                                    <option value="5">عدد البحوث التربوية المدخلة</option>

                                                </select>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button class="btn btn-brand m-btn m-btn--icon" type="submit" id="m_search">
												<span>
													<i class="la la-search"></i>
													<span>فلترة البيانات</span>
												</span>
                                                </button>
                                            </div>
                                        </div>


                                        <div class="m-separator m-separator--md m-separator--dashed"></div>
                                    </form>


                                <table class="table table-striped- table-bordered table-hover table-checkable"
                                       id="m_table_1">
                                    <thead>


                                    <tr>
                                        <th>#</th>
                                        <th>الادارة</th>
                                        <th>القسم</th>
                                        <th>نوعية التقرير</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                        <tr>





                                        </tr>




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

        {{-- Code for Get the Departments When the Managment Change --}}
        <script>
            $(document).ready(function() {
                $("#management").change(function () {
                    var management_id = document.getElementById("management").value;
                    var department = $('#department').empty();
                    $.ajax
                    ({
                        type: "get",
                        url: "/get-departments-by-id/" + management_id,
                        cache: false,
                        success: function (html) {
                            $("#department").append(new Option("الكل", "0"));
                            $.each(html, function (i, v) {
                                // console.log(v.id);
                                $('<option value="' + v.id + '">' + v.name + '</option>').appendTo(department);

                            });
                        }
                    });
                });

            });
        </script>

        {{-- End Code Get Sub Categories Ajax --}}

    @endpush
@stop