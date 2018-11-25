<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
            class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
         m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">


            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{ route('admin.index') }}"
                                                                                   class="m-menu__link "><i
                            class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span
                                class="m-menu__link-wrap"> <span class="m-menu__link-text">الرئيسية</span>
											</span></span>
                </a>
            </li>


            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-group"></i>
                    <span class="m-menu__link-text">الأعضاء المسجلين</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>

                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.users',1) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الأعضاء بإنتظار الموافقة</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.users',2) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الأعضاء الموافق عليهم</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.users',3) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الأعضاء المرفوضين</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-align-justify"></i>
                    <span class="m-menu__link-text">القوائم المنسدلة</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>

                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('strategic-goals-menus.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الأهداف الاستراتيجية</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('initiatives-menus.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">المبادرات</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('measurement-menus.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">مؤشرات قياس الاداء</span>
                            </a>
                        </li>


                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('ministerial-initiatives-menus.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">المبادرات الوزارية</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('strategic-initiatives-menus.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">المبادرات الاستراتيجية</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

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
                            <a href="{{ route('admin.strategic.plans.type',1) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط الموافق عليها</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.strategic.plans.type',2) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط بإنتظار الموافقة</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.strategic.plans.type',3) }}" class="m-menu__link ">
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
                    <span class="m-menu__link-text">الخطط التشغيلية</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>

                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.operational.plans.type',1) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط الموافق عليها</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.operational.plans.type',2) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط بإنتظار الموافقة</span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('admin.operational.plans.type',3) }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">الخطط المحذوفة</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>

<!-- END: Left Aside -->