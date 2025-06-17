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
        <li class="menu-item {{ request()->is('admin') || request()->is('admin/dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
         <div data-i18n="Analytics">Dashboard</div>
         </a>
          </li>

        <!-- System Management -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">System Management</span>
        </li>

        @if (session('user_role') === 'Super Admin')
        <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User interface">Users Management</div>
            </a>
        </li>
        @endif

        <!-- Content Management -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Content Management</span>
        </li>

        <!-- Website Pages -->
        <li class="menu-item {{ request()->is('admin/home*') || request()->is('admin/about*') || request()->is('admin/team*') || request()->is('admin/careers*') || request()->is('admin/contact*') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-content"></i>
                <div data-i18n="User interface">Website Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/home*') ? 'active' : '' }}">
                    <a href="{{ route('admin.home.preview') }}" class="menu-link">
                        <div data-i18n="Home">Home</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/about*') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.preview') }}" class="menu-link">
                        <div data-i18n="About">About</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/team*') ? 'active' : '' }}">
                    <a href="{{ route('admin.team.preview') }}" class="menu-link">
                        <div data-i18n="Team">People</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/careers*') ? 'active' : '' }}">
                    <a href="{{ route('admin.careers.preview') }}" class="menu-link">
                        <div data-i18n="Careers">Careers</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/contact*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.preview') }}" class="menu-link">
                        <div data-i18n="Contact">Contact</div>
                    </a>
                </li>
            </ul>
        </li>

<!-- Services -->
<li class="menu-item {{ request()->is('admin/services*') ? 'active open' : '' }}">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-briefcase-alt"></i>
        <div data-i18n="Services">Services</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ request()->is('admin/services') || request()->is('admin/services/preview') || request()->is('admin/services/edit') ? 'active' : '' }}">
            <a href="{{ route('admin.services.preview') }}" class="menu-link">
                <div data-i18n="Services Overview">Services Overview</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/audit*') ? 'active' : '' }}">
            <a href="{{ route('admin.audit.preview') }}" class="menu-link">
                <div data-i18n="Audit">Audit & Assurance</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/advisory*') ? 'active' : '' }}">
            <a href="{{ route('admin.advisory.preview') }}" class="menu-link">
                <div data-i18n="Advisory">Business Advisory</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/services/outsourcing*') ? 'active' : '' }}">
            <a href="{{ route('admin.outsourcing.preview') }}" class="menu-link">
                <div data-i18n="Outsourcing">Outsourcing</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/services/restructuring*') ? 'active' : '' }}">
            <a href="{{ route('admin.restructuring.preview') }}" class="menu-link">
                <div data-i18n="Restructuring">Business Restructuring</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/finance*') ? 'active' : '' }}">
            <a href="{{ route('admin.finance.preview') }}" class="menu-link">
                <div data-i18n="Finance">Corporate Finance</div>
            </a>
        </li>
        <!-- ADD THIS NEW MENU ITEM -->
        <li class="menu-item {{ request()->is('admin/forensic*') ? 'active' : '' }}">
            <a href="{{ route('admin.forensic.preview') }}" class="menu-link">
                <div data-i18n="Forensic">Forensic & Litigation</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/governance*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <div data-i18n="Governance">Governance & Risk</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/taxation*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <div data-i18n="Taxation">Taxation</div>
            </a>
        </li>
    </ul>
</li>

        <!-- Navigation Components -->
        <li class="menu-item {{ request()->is('admin/header*') || request()->is('admin/footer*') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Navigation">Navigation & Layout</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/header*') ? 'active' : '' }}">
                    <a href="{{ route('admin.header.preview') }}" class="menu-link">
                        <div data-i18n="Header">Header & Navigation</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/footer*') ? 'active' : '' }}">
                    <a href="{{ route('admin.footer.preview') }}" class="menu-link">
                        <div data-i18n="Footer">Footer</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Quick Actions -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Quick Actions</span>
        </li>

        <li class="menu-item">
        <a href="http://mtco-comp.test/" class="menu-link" target="_blank">
        <i class="menu-icon tf-icons bx bx-globe"></i>
        <div data-i18n="Preview">Preview Website</div>
        </a>
        </li>

        <!-- Settings -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>

        <li class="menu-item {{ request()->is('admin/settings*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Settings">General Settings</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/backup*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-download"></i>
                <div data-i18n="Backup">Backup & Restore</div>
            </a>
        </li>
    </ul>
</aside>
