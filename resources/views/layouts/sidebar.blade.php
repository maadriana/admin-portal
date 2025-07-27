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

        <!-- System Management - Only show header and items for Super Admin -->
        @if (auth()->user()->role === 'Super Admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">System Management</span>
            </li>

            <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="User interface">Users Management</div>
                </a>
            </li>

            {{-- Approval Requests with notification badge --}}
            <li class="menu-item {{ request()->is('admin/approvals*') ? 'active' : '' }}">
                <a href="{{ route('approvals.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-check-shield"></i>
                    <div data-i18n="Approvals">Approval Requests</div>
                    @php
                        $pendingCount = \App\Models\ApprovalRequest::where('status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <div class="badge bg-danger ms-2">{{ $pendingCount }}</div>
                    @endif
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
                    <a href="{{ route('admin.home.index') }}" class="menu-link">
                        <div data-i18n="Home">Home</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/about*') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.index') }}" class="menu-link">
                        <div data-i18n="About">About</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/international*') ? 'active' : '' }}">
                    <a href="{{ route('admin.international.index') }}" class="menu-link">
                        <div data-i18n="International">International</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/team*') ? 'active' : '' }}">
                    <a href="{{ route('admin.team.index') }}" class="menu-link">
                        <div data-i18n="Team">People</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/careers*') ? 'active' : '' }}">
                    <a href="{{ route('admin.careers.index') }}" class="menu-link">
                        <div data-i18n="Careers">Careers</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/contact*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.index') }}" class="menu-link">
                        <div data-i18n="Contact">Contact</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- MTC Care -->
        @php
            $isMTCCareActive = request()->is('admin/mtc-care*') ||
                              request()->is('admin/csr*') ||
                              request()->is('admin/galleries*');
        @endphp
        <li class="menu-item {{ $isMTCCareActive ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-heart"></i>
                <div data-i18n="MTC Care">MTC Care</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/mtc-care*') ? 'active' : '' }}">
                    <a href="{{ route('admin.mtc-care.index') }}" class="menu-link">
                        <div data-i18n="MTC Care Overview">MTC Care Overview</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/csr*') ? 'active' : '' }}">
                    <a href="{{ route('admin.csr.index') }}" class="menu-link">
                        <div data-i18n="CSR">Corporate Social Responsibility</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/galleries*') ? 'active' : '' }}">
                    <a href="{{ route('admin.galleries.index') }}" class="menu-link">
                        <div data-i18n="Galleries">Galleries</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- News & Updates -->
        <li class="menu-item {{ request()->is('admin/news*') ? 'active' : '' }}">
            <a href="{{ route('admin.news.preview') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="News">News & Updates</div>
            </a>
        </li>

        <!-- People Management -->
        <li class="menu-item {{ request()->is('admin/people*') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="People">People Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/people/emmanuel*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.emmanuel.index') }}" class="menu-link">
                        <div data-i18n="Emmanuel">Emmanuel Y. Mendoza</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/people/ephraim*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.ephraim.index') }}" class="menu-link">
                        <div data-i18n="Ephraim">Ephraim T. Tugano</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/people/pamela*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.pamela.index') }}" class="menu-link">
                        <div data-i18n="Pamela">Pamela Grace S. Tangso</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/people/jekell*') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.jekell.index') }}" class="menu-link">
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
                    <a href="{{ route('admin.services.index') }}" class="menu-link">
                        <div data-i18n="Services Overview">Services Overview</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/audit*') ? 'active' : '' }}">
                    <a href="{{ route('admin.audit.index') }}" class="menu-link">
                        <div data-i18n="Audit">Audit & Assurance</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/advisory*') ? 'active' : '' }}">
                    <a href="{{ route('admin.advisory.index') }}" class="menu-link">
                        <div data-i18n="Advisory">Business Advisory</div>
                    </a>
                </li>
                @php
                    $isOutsourcingActive = request()->is('admin/outsourcing*') ||
                                          request()->is('admin/services/outsourcing*');
                @endphp
                <li class="menu-item {{ $isOutsourcingActive ? 'active' : '' }}">
                    <a href="{{ route('admin.outsourcing.index') }}" class="menu-link">
                        <div data-i18n="Outsourcing">Outsourcing</div>
                    </a>
                </li>
                @php
                    $isRestructuringActive = request()->is('admin/restructuring*') ||
                                            request()->is('admin/services/restructuring*');
                @endphp
                <li class="menu-item {{ $isRestructuringActive ? 'active' : '' }}">
                    <a href="{{ route('admin.restructuring.index') }}" class="menu-link">
                        <div data-i18n="Restructuring">Business Restructuring</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/finance*') ? 'active' : '' }}">
                    <a href="{{ route('admin.finance.index') }}" class="menu-link">
                        <div data-i18n="Finance">Corporate Finance</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/forensic*') ? 'active' : '' }}">
                    <a href="{{ route('admin.forensic.index') }}" class="menu-link">
                        <div data-i18n="Forensic">Forensic & Litigation</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/governance*') ? 'active' : '' }}">
                    <a href="{{ route('admin.governance.index') }}" class="menu-link">
                        <div data-i18n="Governance">Governance & Risk</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/taxation*') ? 'active' : '' }}">
                    <a href="{{ route('admin.taxation.index') }}" class="menu-link">
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
                    <a href="{{ route('admin.header.index') }}" class="menu-link">
                        <div data-i18n="Header">Header & Navigation</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/footer*') ? 'active' : '' }}">
                    <a href="{{ route('admin.footer.index') }}" class="menu-link">
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
