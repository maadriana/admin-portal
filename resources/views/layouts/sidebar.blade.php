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
        <li class="menu-item {{ request()->is('admin/home*') || request()->is('admin/about*') || request()->is('admin/international*') || request()->is('admin/team*') || request()->is('admin/careers*') || request()->is('admin/contact*') ? 'active open' : '' }}">
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
                <li class="menu-item {{ request()->is('admin/international*') ? 'active' : '' }}">
                    <a href="{{ route('admin.international.preview') }}" class="menu-link">
                        <div data-i18n="International">International</div>
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

        <!-- People Management -->
        <li class="menu-item {{ request()->is('admin/people*') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="People">People Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/people/emmanuel*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.emmanuel.preview') }}" class="menu-link">
                        <div data-i18n="Emmanuel">Emmanuel Y. Mendoza</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/people/ephraim*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.ephraim.preview') }}" class="menu-link">
                        <div data-i18n="Ephraim">Ephraim T. Tugano</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/people/pamela*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.pamela.preview') }}" class="menu-link">
                        <div data-i18n="Pamela">Pamela Grace S. Tangso</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/people/jekell*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.jekell.preview') }}" class="menu-link">
                        <div data-i18n="Jekell">Jekell G. Salosagcol</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Services -->
        @php
            $isServicesActive = request()->is('admin/services*') ||
                              request()->is('admin/audit*') ||
                              request()->is('admin/advisory*') ||
                              request()->is('admin/outsourcing*') ||
                              request()->is('admin/restructuring*') ||
                              request()->is('admin/finance*') ||
                              request()->is('admin/forensic*') ||
                              request()->is('admin/governance*') ||
                              request()->is('admin/taxation*');
        @endphp
        <li class="menu-item {{ $isServicesActive ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-briefcase-alt"></i>
                <div data-i18n="Services">Services</div>
            </a>
            <ul class="menu-sub">
                @php
                    $isServicesOverviewActive = (request()->is('admin/services') ||
                                               request()->is('admin/services/preview') ||
                                               request()->is('admin/services/edit')) &&
                                              !request()->is('admin/services/outsourcing*') &&
                                              !request()->is('admin/services/restructuring*');
                @endphp
                <li class="menu-item {{ $isServicesOverviewActive ? 'active' : '' }}">
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
                @php
                    $isOutsourcingActive = request()->is('admin/outsourcing*') ||
                                          request()->is('admin/services/outsourcing*');
                @endphp
                <li class="menu-item {{ $isOutsourcingActive ? 'active' : '' }}">
                    <a href="{{ route('admin.outsourcing.preview') }}" class="menu-link">
                        <div data-i18n="Outsourcing">Outsourcing</div>
                    </a>
                </li>
                @php
                    $isRestructuringActive = request()->is('admin/restructuring*') ||
                                            request()->is('admin/services/restructuring*');
                @endphp
                <li class="menu-item {{ $isRestructuringActive ? 'active' : '' }}">
                    <a href="{{ route('admin.restructuring.preview') }}" class="menu-link">
                        <div data-i18n="Restructuring">Business Restructuring</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/finance*') ? 'active' : '' }}">
                    <a href="{{ route('admin.finance.preview') }}" class="menu-link">
                        <div data-i18n="Finance">Corporate Finance</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/forensic*') ? 'active' : '' }}">
                    <a href="{{ route('admin.forensic.preview') }}" class="menu-link">
                        <div data-i18n="Forensic">Forensic & Litigation</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/governance*') ? 'active' : '' }}">
                    <a href="{{ route('admin.governance.preview') }}" class="menu-link">
                        <div data-i18n="Governance">Governance & Risk</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/taxation*') ? 'active' : '' }}">
                    <a href="{{ route('admin.taxation.preview') }}" class="menu-link">
                        <div data-i18n="Taxation">Taxation</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Navigation Components -->
        @php
            $isNavigationActive = request()->is('admin/header*') || request()->is('admin/footer*');
        @endphp
        <li class="menu-item {{ $isNavigationActive ? 'active open' : '' }}">
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
    </ul>
</aside>
