<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
            class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
         m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">


                <a href="{{ route('dashboard.index') }}"
                                                                                   class="m-menu__link "><i
                            class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span
                                class="m-menu__link-wrap"> <span class="m-menu__link-text">الرئيسية</span>
											</span></span>
                </a>
            </li>


            @if(Auth::user()->account_type == 1)
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-comment"></i>
                    <span class="m-menu__link-text">الخطط الاستراتيجية</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>

                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('strategic.create') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">إضافة خطة جديدة</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('dashboard.strategic.type',1) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط الموافق عليها</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('dashboard.strategic.type',2) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط بإنتظار الموافقة</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('dashboard.strategic.type',3) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط المحذوفة</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            @endif


            @if(Auth::user()->account_type == 1 || Auth::user()->account_type == 3)
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="javascript:;" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon la la-comment"></i>
                        <span class="m-menu__link-text">الخطط التشغيلية</span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="m-menu__submenu ">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('operational-plans.create') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">إضافة خطة جديدة</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.operational.type',1) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">الخطط الموافق عليها</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.operational.type',2) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">الخطط بإنتظار الموافقة</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.operational.type',3) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">الخطط المحذوفة</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="javascript:;" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon la la-comment"></i>
                        <span class="m-menu__link-text">نماذج SWAT</span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="m-menu__submenu ">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('swat.create') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">إضافة نموذج جديد</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.swat.type',1) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج الموافق عليها</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.swat.type',2) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج بإنتظار الموافقة</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.swat.type',3) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج المحذوفة</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            @endif

            @if(Auth::user()->account_type == 1)

                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="javascript:;" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon la la-comment"></i>
                        <span class="m-menu__link-text">نماذج ادارة المخاطر</span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="m-menu__submenu ">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('risks-forms.create') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">إضافة نموذج جديد</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.risks-forms.type',1) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج الموافق عليها</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.risks-forms.type',2) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج بإنتظار الموافقة</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.risks-forms.type',3) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج المحذوفة</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


            @endif



            @if(Auth::user()->account_type == 2)

                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="javascript:;" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon la la-comment"></i>
                        <span class="m-menu__link-text">نماذج البحوث التربوية</span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="m-menu__submenu ">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('educational-research.create') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">إضافة نموذج جديد</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.educational-research.type',1) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج الموافق عليها</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.educational-research.type',2) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج بإنتظار الموافقة</span>
                                </a>
                            </li>

                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{ route('dashboard.educational-research.type',3) }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">النماذج المحذوفة</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


            @endif

        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>

<!-- END: Left Aside -->