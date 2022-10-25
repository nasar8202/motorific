<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ (Request::is('admin/dashboard')  ? 'active open' : '') }} ">
        <a href="{{ route('admin') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub {{ (Request::is('admin') || request()->IS('admin/dealers') || request()->IS('admin/approved-dealers-list') || request()->IS('admin/block-dealers-list') ? 'active open' : '') }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Manage Dealers</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item {{ request()->IS('admin/dealers') ? 'active' : '' }}">
                <a href="{{ route('ViewDealers') }} ">Dealers Requests</a>
            </li>
            <li class="submenu-item {{ request()->IS('admin/approved-dealers-list') ? 'active' : '' }}">
                <a href="{{ route('dealer.approvedDealersByAdmin') }}">Approved Dealers</a>
            </li>
            <li class="submenu-item {{ request()->IS('admin/block-dealers-list') ? 'active' : '' }}">
                <a href="{{ route('dealer.blockDealersByAdmin') }}">Block Dealers</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  has-sub {{ (Request::is('admin') ||  request()->IS('admin/view-vehicle-features') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/view-seat-materials') ||  request()->IS('admin/add-seat-material') ? 'active open' : '') }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Manage User Side Qts </span>
        </a>
        <ul class="submenu">
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link {{ (Request::is('admin') ||  request()->IS('admin/view-vehicle-features') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/view-seat-materials') ||  request()->IS('admin/add-seat-material') ? '' : '') }}'>
                    <i class="bi bi-stack"></i>
                    <span>Vehricle Details </span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item {{ request()->IS('admin/view-vehicle-features') ? 'active' : '' }}">
                        <a href="{{ route('ViewVehicleFeatures') }}">Vehicle Feature</a>
                    </li>
                    <li class="submenu-item {{ request()->IS('admin/view-seat-materials') ? 'active' : '' }}">
                        <a href="{{ route('ViewSeatMaterials') }}">View Seat Materials</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('ViewNumberOfkeys') }}">Number of keys</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('ViewToolPack') }}">Tools Pack</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('viewWheelNut') }}">Wheel Nut</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('viewSmooking') }}">Smooking</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('viewlogbook') }}">Logbook</a>
                    </li>
                     <li class="submenu-item">
                        <a href="{{ route('viewVehicalOwner') }}">Vehicle Owner</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('viewPrivatePlate') }}">Private plate</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>User Details </span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="">Vehicle Feature</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Pictures </span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="">Vehicle Feature</a>
                    </li>

                </ul>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="{{route('logout')}}" class='sidebar-link'>
            <div class="icon dripicons-exit"></div>
            <span>Logout</span>
        </a>
    </li>

</ul>
