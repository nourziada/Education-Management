@extends('layouts.dashboard')

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('includes.menu-management')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">تعديل بيانات نموذج بحث تربوي</h3>
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
                                            تعديل بيانات نموذج بحث تربوي
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('educational-research.update',$data->id)}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <div class="m-portlet__body">

                                    <div class="form-group m-form__group" >
                                        <label for="name">اسم الباحث رباعي</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->name }}" name="name" id="name"  placeholder="أدخل اسم الباحث رباعي رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="id_number">رقم السجل المدني</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->id_number }}" name="id_number" id="id_number"  placeholder="أدخل رقم السجل المدني رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="work">جهة العمل</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->work }}" name="work" id="work"  placeholder="أدخل جهة العمل رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="mobile">رقم الجوال</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->mobile }}" name="mobile" id="mobile"  placeholder="أدخل رقم الجوال رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="email">البريد الالكتروني</label>
                                        <input type="email" class="form-control m-input m-input--square"
                                               value="{{ $data->email }}" name="email" id="email"  placeholder="أدخل البريد الالكتروني رجاءُ" required>
                                    </div>


                                    <div class="form-group m-form__group">
                                        <label for="qualification">المؤهل الحالي</label>
                                        <select class="form-control m-input" id="qualification" name="qualification" required>

                                            <option value="دكتوراه" @if($data->qualification == 'دكتوراه') selected @endif>دكتوراه</option>
                                            <option value="ماجستير" @if($data->qualification == 'ماجستير') selected @endif>ماجستير</option>
                                            <option value="بكالوريوس" @if($data->qualification == 'بكالوريوس') selected @endif>بكالوريوس</option>
                                            <option value="دبلوم" @if($data->qualification == 'دبلوم') selected @endif>دبلوم</option>

                                        </select>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="uni">الجامعة</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->uni }}" name="uni" id="uni"  placeholder="أدخل الجامعة رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="college">الكلية</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->college }}" name="college" id="college"  placeholder="أدخل الكلية رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="specialization">التخصص</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->specialization }}" name="specialization" id="specialization"  placeholder="أدخل التخصص رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group" >
                                        <label for="search_title">عنوان البحث</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->search_title }}" name="search_title" id="search_title"  placeholder="أدخل عنوان البحث رجاءُ" required>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="search_goal">الهدف من البحث</label>
                                        <select class="form-control m-input" id="search_goal" name="search_goal" required>

                                            <option value="دكتوراه" @if($data->search_goal == 'دكتوراه') selected @endif>دكتوراه</option>
                                            <option value="ماجستير" @if($data->search_goal == 'ماجستير') selected @endif>ماجستير</option>
                                            <option value="3" @if($data->search_goal != 'ماجستير' && $data->search_goal != 'دكتوراه') selected @endif>أخرى</option>

                                        </select>
                                    </div>

                                    <div class="form-group m-form__group @if($data->search_goal != 'ماجستير' && $data->search_goal != 'دكتوراه')  @else d-none @endif" id="search_goal_div">
                                        <label for="search_goal_other">أدخل الهدف من البحث</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               @if($data->search_goal != 'ماجستير' && $data->search_goal != 'دكتوراه') value="{{ $data->search_goal }}" @endif name="search_goal_other" id="search_goal_other"  placeholder=" أدخل الهدف من البحث رجاءُ">
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="chapter_date">تاريخ التطبيق</label>
                                        <select class="form-control m-input" id="chapter_date" name="chapter_date" required>

                                            <option value="الفصل 1" @if($data->chapter_date == 'الفصل 1') selected @endif>الفصل 1</option>
                                            <option value="الفصل 2" @if($data->chapter_date == 'الفصل 2') selected @endif>الفصل 2</option>

                                        </select>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="targets">المستهدفون</label>
                                        <textarea class="form-control m-input m-input--square"
                                                  name="targets" placeholder="أدخل المستهدفون رجاءً" required>{{ $data->targets }}</textarea>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="authority">الجهة المشرفة</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->authority }}" name="authority" id="authority"  placeholder=" أدخل الجهة المشرفة رجاءُ">
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="authority_address">عنوان الجهة</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->authority_address }}" name="authority_address" id="authority_address"  placeholder=" أدخل عنوان الجهة رجاءُ">
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="target">الجهة المستفيدة</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->target }}" name="target" id="target"  placeholder=" أدخل الجهة المستفيدة رجاءُ">
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="search_tool">اداة البحث</label>
                                        <input type="text" class="form-control m-input m-input--square"
                                               value="{{ $data->search_tool }}" name="search_tool" id="search_tool"  placeholder=" أدخل اداة البحث رجاءُ">
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="search_tool">(المرفقات) ادوات البحث - استبانة</label>
                                        <input type="file" class="form-control m-input m-input--square" name="search_tools" id="search_tools"  placeholder=" أدخل (المرفقات) ادوات البحث - استبانة رجاءُ">
                                        <p style="color: red;">إذا كنت لا تريد تغييره ، أتركه فارغاً</p>
                                    </div>

                                    <div class="form-group m-form__group">
                                        <label for="letter_approval">(المرفقات) خطاب الموافقة على إجراء البحث</label>
                                        <input type="file" class="form-control m-input m-input--square" name="letter_approval" id="letter_approval"  placeholder=" أدخل (المرفقات) ادوات البحث - استبانة رجاءُ">
                                        <p style="color: red;">إذا كنت لا تريد تغييره ، أتركه فارغاً</p>
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



    @push('js')

        <script>
            {{-- Code For Show Or Hide School Name--}}
            $("#search_goal").change(function () {
                var val = $(this).val();
                if (val == "3") {
                    $("#search_goal_div").removeClass('d-none');
                }
                else {
                    $("#search_goal_div").addClass('d-none');
                }
            });

            {{-- End Code --}}
        </script>
    @endpush
@stop