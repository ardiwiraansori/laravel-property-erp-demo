@php
    $menuGroups = [
        [
            'label' => 'Master Data',
            'icon' => 'fa-database',
            'match' => 'erp.properties,erp.blocks,erp.units,erp.units.*,erp.customers',
            'items' => [
                ['label' => 'Properties', 'route' => 'erp.properties', 'icon' => 'fa-building'],
                ['label' => 'Blocks', 'route' => 'erp.blocks', 'icon' => 'fa-border-all'],
                ['label' => 'Units', 'route' => 'erp.units', 'icon' => 'fa-home'],
                ['label' => 'Customers', 'route' => 'erp.customers', 'icon' => 'fa-users'],
            ],
        ],
        [
            'label' => 'Sales CRM',
            'icon' => 'fa-chart-line',
            'match' => 'erp.leads,erp.bookings,erp.sales-pipeline',
            'items' => [
                ['label' => 'Leads', 'route' => 'erp.leads', 'icon' => 'fa-user-plus'],
                ['label' => 'Bookings', 'route' => 'erp.bookings', 'icon' => 'fa-calendar-check'],
                ['label' => 'Sales Pipeline', 'route' => 'erp.sales-pipeline', 'icon' => 'fa-stream'],
            ],
        ],
        [
            'label' => 'Finance',
            'icon' => 'fa-wallet',
            'match' => 'erp.invoices,erp.payments,erp.cashier',
            'items' => [
                ['label' => 'Invoices', 'route' => 'erp.invoices', 'icon' => 'fa-file-invoice-dollar'],
                ['label' => 'Payments', 'route' => 'erp.payments', 'icon' => 'fa-money-check-alt'],
                ['label' => 'Cashier', 'route' => 'erp.cashier', 'icon' => 'fa-cash-register'],
            ],
        ],
        [
            'label' => 'Operations',
            'icon' => 'fa-cogs',
            'match' => 'erp.contracts,erp.ppjb-bast,erp.maintenance',
            'items' => [
                ['label' => 'Contracts', 'route' => 'erp.contracts', 'icon' => 'fa-file-signature'],
                ['label' => 'PPJB / BAST', 'route' => 'erp.ppjb-bast', 'icon' => 'fa-file-contract'],
                ['label' => 'Maintenance', 'route' => 'erp.maintenance', 'icon' => 'fa-tools'],
            ],
        ],
        [
            'label' => 'Documents',
            'icon' => 'fa-folder-open',
            'match' => 'erp.kpr-tracking,erp.certificate-tracking,erp.handover',
            'items' => [
                ['label' => 'KPR Tracking', 'route' => 'erp.kpr-tracking', 'icon' => 'fa-university'],
                ['label' => 'Certificate Tracking', 'route' => 'erp.certificate-tracking', 'icon' => 'fa-certificate'],
                ['label' => 'Handover', 'route' => 'erp.handover', 'icon' => 'fa-clipboard-check'],
            ],
        ],
        [
            'label' => 'Reports',
            'icon' => 'fa-chart-pie',
            'match' => 'erp.sales-report,erp.finance-report,erp.occupancy-report',
            'items' => [
                ['label' => 'Sales Report', 'route' => 'erp.sales-report', 'icon' => 'fa-chart-bar'],
                ['label' => 'Finance Report', 'route' => 'erp.finance-report', 'icon' => 'fa-coins'],
                ['label' => 'Occupancy Report', 'route' => 'erp.occupancy-report', 'icon' => 'fa-percentage'],
            ],
        ],
        [
            'label' => 'Settings',
            'icon' => 'fa-sliders-h',
            'match' => 'erp.company-profile,user-profile,user-management',
            'items' => [
                ['label' => 'Company Profile', 'route' => 'erp.company-profile', 'icon' => 'fa-id-card'],
                ['label' => 'My Profile', 'route' => 'user-profile', 'icon' => 'fa-user-cog'],
                ['label' => 'Team Users', 'route' => 'user-management', 'icon' => 'fa-user-shield'],
            ],
        ],
    ];
@endphp

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex align-items-center text-wrap" href="{{ route('dashboard') }}">
            <div
                class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-md d-flex align-items-center justify-content-center">
                <i class="fas fa-city text-white text-sm opacity-10"></i>
            </div>
            <span class="ms-3 font-weight-bold">Property ERP<br><small class="text-xs text-secondary">Portfolio
                    Demo</small></span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fas fa-tachometer-alt text-dark text-sm {{ request()->routeIs('dashboard') ? 'text-white' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ERP Modules</h6>
            </li>

            @foreach ($menuGroups as $index => $group)
                @php
                    $collapseId = 'erpMenu' . $index;
                    $isGroupActive = request()->routeIs(...explode(',', $group['match']));
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{ $isGroupActive ? 'active' : '' }}" data-bs-toggle="collapse"
                        href="#{{ $collapseId }}" role="button"
                        aria-expanded="{{ $isGroupActive ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fas {{ $group['icon'] }} text-dark text-sm {{ $isGroupActive ? 'text-white' : '' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ $group['label'] }}</span>
                    </a>
                    <div class="collapse {{ $isGroupActive ? 'show' : '' }}" id="{{ $collapseId }}">
                        <ul class="nav ms-4 ps-3">
                            @foreach ($group['items'] as $item)
                                @php
                                    $isItemActive = request()->routeIs($item['route'], $item['route'] . '.*');
                                @endphp

                                <li class="nav-item">
                                    <a class="nav-link py-2 {{ $isItemActive ? 'active' : '' }}"
                                        href="{{ route($item['route']) }}">
                                        <span class="sidenav-mini-icon text-xs me-2"><i
                                                class="fas {{ $item['icon'] }}"></i></span>
                                        <span class="sidenav-normal text-sm">{{ $item['label'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="sidenav-footer mx-3 mt-3 pt-3">
        <div class="card card-background shadow-none card-background-mask-primary" id="sidenavCard">
            <div class="full-background"
                style="background-image: url('{{ asset('assets/img/curved-images/white-curved.jpg') }}')">
            </div>
            <div class="card-body text-start p-3 w-100">
                <div
                    class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                    <i class="fas fa-layer-group text-dark text-gradient text-lg top-0"></i>
                </div>
                <div class="docs-info">
                    <h6 class="text-white up mb-0">Demo Scope</h6>
                    <p class="text-xs font-weight-bold text-white mb-2">CRM, finance, document tracking, dan operation
                        flow.</p>
                    <a href="{{ route('erp.sales-pipeline') }}" class="btn btn-white btn-sm w-100 mb-0">View
                        Pipeline</a>
                </div>
            </div>
        </div>
    </div>
</aside>
