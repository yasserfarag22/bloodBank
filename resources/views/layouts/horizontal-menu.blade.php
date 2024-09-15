<!-- Horizontal-main -->
<div class="sticky">
    <div class="horizontal-main hor-menu clearfix side-header">
        <div class="horizontal-mainwrapper container clearfix">
            <!-- Nav -->
            <nav class="horizontalMenu clearfix">
                <ul class="horizontalMenu-list">
                    <!-- Dashboard -->
                    <li aria-haspopup="true">
                        <a href="{{ url('dashboard') }}">
                            <i class="fe fe-home side-menu__icon"></i>الرئيسية
                        </a>
                    </li>

                    <!-- Categories -->
                    <li aria-haspopup="true">
                        <a href="{{ route('categories.index') }}" class="sub-icon">
                            <i class="fe fe-tag side-menu__icon"></i> الأقسام<i
                                class="fe fe-chevron-down horizontal-icon"></i>
                        </a>
                        @permission('categories-create')
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="{{ route('categories.create') }}" class="slide-item">أضف
                                        قسم</a></li>
                            </ul>
                        @endpermission
                    </li>

                    <!-- Posts -->
                    <li aria-haspopup="true">
                        <a href="{{ route('posts.index') }}" class="sub-icon">
                            <i class="fe fe-file-text side-menu__icon"></i> المقالات<i
                                class="fe fe-chevron-down horizontal-icon"></i>
                        </a>
                        @permission('posts-create')
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="{{ route('posts.create') }}" class="slide-item">أضف
                                        مقاله</a></li>
                            </ul>
                        @endpermission
                    </li>

                    <!-- Governorates -->
                    <li aria-haspopup="true">
                        <a href="{{ route('governorates.index') }}" class="sub-icon">
                            <i class="fe fe-map-pin side-menu__icon"></i> المحافظات<i
                                class="fe fe-chevron-down horizontal-icon"></i>
                        </a>
                        <ul class="sub-menu">
                            <li aria-haspopup="true"><a href="{{ route('governorates.create') }}" class="slide-item">أضف
                                    محافظه</a></li>
                        </ul>
                        <ul class="sub-menu">
                            <li aria-haspopup="true"><a href="{{ route('cities.index') }}" class="slide-item">
                                    المدن</a></li>
                        </ul>
                    </li>

                    <!-- Cities -->
                    {{-- <li aria-haspopup="true">
                        <a href="{{ route('cities.index') }}" class="sub-icon">
                            <i class="fe fe-briefcase side-menu__icon"></i> المدن<i
                                class="fe fe-chevron-down horizontal-icon"></i>
                        </a>
                        <ul class="sub-menu">
                            <li aria-haspopup="true"><a href="{{ route('cities.create') }}" class="slide-item">أضف
                                    المدينه</a></li>
                        </ul>
                    </li> --}}

                    <!-- Settings -->
                    <li aria-haspopup="true">
                        <a href="{{ route('settings.index') }}" class="sub-icon">
                            <i class="fe fe-settings side-menu__icon"></i> الأعدادات
                        </a>
                    </li>

                    <!-- Contacts -->
                    <li aria-haspopup="true">
                        <a href="{{ route('contacts.index') }}" class="sub-icon">
                            <i class="fe fe-mail side-menu__icon"></i> الرسائل الوارده
                        </a>
                    </li>

                    <!-- Donations -->
                    <li aria-haspopup="true">
                        <a href="{{ route('donations.index') }}" class="sub-icon">
                            <i class="fe fe-heart side-menu__icon"></i> طلبات التبرع
                        </a>
                    </li>

                    <!-- Clients -->
                    <li aria-haspopup="true">
                        <a href="{{ route('clients.index') }}" class="sub-icon">
                            <i class="fe fe-users side-menu__icon"></i> العملاء
                        </a>
                    </li>

                    <!-- Users -->
                    <li aria-haspopup="true">
                        <a href="{{ route('users.index') }}" class="sub-icon">
                            <i class="fe fe-users side-menu__icon"></i> المشرفين
                        </a>
                    </li>

                    <!-- Roles (Modified) -->
                    <li aria-haspopup="true">
                        <a href="{{ route('roles.index') }}" class="sub-icon">
                            <i class="fe fe-star side-menu__icon"></i> الرتب
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Nav -->
        </div>
    </div>
</div>
<!-- Horizontal-main -->
