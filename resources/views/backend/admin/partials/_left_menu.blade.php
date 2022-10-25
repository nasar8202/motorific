<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item active">
        <a href="index.html" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Manage Dealers</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item">
                <a href="{{ route('ViewDealers') }}">Dealers Requests</a>
            </li>
            <li class="submenu-item">
                <a href="{{ route('dealer.approvedDealersByAdmin') }}">Approved Dealers</a>
            </li>
            <li class="submenu-item">
                <a href="{{ route('dealer.blockDealersByAdmin') }}">Block Dealers</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Manage Vehicle </span>
        </a>
        <ul class="submenu">
            <li class="submenu-item">
                <a href="{{ route('ViewVehicleFeatures') }}">Vehicle Feature</a>
            </li>
            <li class="submenu-item">
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
    <li class="sidebar-item">
        <a href="{{route('logout')}}" class='sidebar-link'>
            <div class="icon dripicons-exit"></div>
            <span>Logout</span>
        </a>
    </li>

</ul>
