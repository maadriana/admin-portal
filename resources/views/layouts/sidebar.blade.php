<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo/mylogo.png') }}" alt="Logo" style="height: 80px;" />
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Components</span>
        </li>

        @if (session('user_role') === 'Super Admin')
        <li class="menu-item {{ request()->is('users') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User interface">Users List</div>
            </a>
        </li>
        @endif
        <!-- Website Pages -->
        <li
            class="menu-item {{ request()->is('home') || request()->is('about') || request()->is('services') || request()->is('team') || request()->is('careers') || request()->is('international') || request()->is('contact') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-content"></i>
                <div data-i18n="User interface">Website Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{ route('pages.home') }}" class="menu-link">
                        <div data-i18n="Accordion">Home</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('about') ? 'active' : '' }}">
                    <a href="{{ route('pages.about') }}" class="menu-link">
                        <div data-i18n="Alerts">About</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('services') ? 'active' : '' }}">
                    <a href="{{ route('pages.services') }}" class="menu-link">
                        <div data-i18n="Badges">Services</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('team') ? 'active' : '' }}">
                    <a href="{{ route('pages.team') }}" class="menu-link">
                        <div data-i18n="Buttons">People</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('careers') ? 'active' : '' }}">
                    <a href="{{ route('pages.careers') }}" class="menu-link">
                        <div data-i18n="Carousel">Careers</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('international') ? 'active' : '' }}">
                    <a href="{{ route('pages.international') }}" class="menu-link">
                        <div data-i18n="Collapse">International</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('contact') ? 'active' : '' }}">
                    <a href="{{ route('pages.contact') }}" class="menu-link">
                        <div data-i18n="Dropdowns">Contact</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Navigation components -->
        <li class="menu-item {{ request()->is('nav*') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Extended UI">Navigation</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('nav/header') ? 'active' : '' }}">
                    <a href="{{ route('nav.header') }}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Header</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('nav/footer') ? 'active' : '' }}">
                    <a href="{{ route('nav.footer') }}" class="menu-link">
                        <div data-i18n="Text Divider">Footer</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
