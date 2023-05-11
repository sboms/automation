<div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{  route('dashboard.index')  }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">الرئيسية</span></a>
                {{-- <ul class="menu-content">
                    <li class=""><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce">eCommerce</a>
                    </li>
                    <li><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">Crypto</a>
                    </li>
                    <li><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Sales</a>
                    </li>
                </ul>  --}}
            </li>
            <li class=" nav-item "><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">الاختصاصات</span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'specialty.index' ? 'active' : '' }} {{ Route::current()->getName() == 'specialty.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('specialty.index') }}" data-i18n="nav.templates.vert.classic_menu">كل الاختصاصات</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'specialty.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('specialty.create') }}">إضافة اختصاص</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">المجالس العلمية</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'committee.index' ? 'active' : '' }} {{ Route::current()->getName() == 'committee.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('committee.index') }}" data-i18n="nav.templates.vert.classic_menu">كل المجالس</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'committee.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('committee.create') }}">إضافة مجلس</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">المقيمن</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'resident.index' ? 'active' : '' }}{{ Route::current()->getName() == 'resident.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('resident.index') }}" data-i18n="nav.templates.vert.classic_menu">كل المقيمين</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'resident.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('resident.create') }}">إضافة مقيم</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">الكادر</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'user.index' ? 'active' : '' }}{{ Route::current()->getName() == 'user.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('user.index') }}" data-i18n="nav.templates.vert.classic_menu">كل الكوادر</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'user.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('user.create') }}">إضافة عضو</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">المسميات الوظيفية</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'role.index' ? 'active' : '' }} {{ Route::current()->getName() == 'role.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('role.index') }}" data-i18n="nav.templates.vert.classic_menu">كل المسميات</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'role.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('role.create') }}">إضافة مسمى وظيفي</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">الإجازات</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'vacation.index' ? 'active' : '' }}{{ Route::current()->getName() == 'vacation.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('vacation.index') }}" data-i18n="nav.templates.vert.classic_menu">كل الإجازات</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'vacation.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('vacation.create') }}">إضافة إجازة</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">العقوبات</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'penalty.index' ? 'active' : '' }}{{ Route::current()->getName() == 'penalty.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('penalty.index') }}" data-i18n="nav.templates.vert.classic_menu">كل العقوبات</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'penalty.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('penalty.create') }}">إضافة عقوبة</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">الحالات</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'state.index' ? 'active' : '' }}{{ Route::current()->getName() == 'state.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('state.index') }}" data-i18n="nav.templates.vert.classic_menu">كل الحالات</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'state.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('state.create') }}">إضافة حالة</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">المراكز الامتحانية</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'examCenter.index' ? 'active' : '' }}{{ Route::current()->getName() == 'examCenter.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('examCenter.index') }}" data-i18n="nav.templates.vert.classic_menu">كل المراكز الامتحانية</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'examCenter.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('examCenter.create') }}">إضافة مركز امتحاني</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">الدورات الامتحانية</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'cycle.index' ? 'active' : '' }}{{ Route::current()->getName() == 'cycle.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('cycle.index') }}" data-i18n="nav.templates.vert.classic_menu">كل الدورات الامتحانية</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'cycle.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('cycle.create') }}">إضافة دورة امتحانية</a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">الامتحانات</span></a>
                <ul class="menu-content">

                    <ul class="menu-content">
                        <li class="{{ Route::current()->getName() == 'exam.index' ? 'active' : '' }}{{ Route::current()->getName() == 'exam.edit' ? 'active' : '' }}"><a class="menu-item" href="{{ route('exam.index') }}" data-i18n="nav.templates.vert.classic_menu">كل الامتحانات</a>
                        </li>
                        <li class="{{ Route::current()->getName() == 'exam.create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('exam.create') }}">إضافة امتحان</a>
                        </li>
                    </ul>
                </ul>
            </li>
        </ul>
    </div>
</div>
