<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item active ">
        <a href="/agent/dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Agent Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Manage Vehicles</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{ route('addVehicleFromSellerPerson') }}">Add Vehicle</a>
            </li>
            <li class="submenu-item ">
                <a href="{{ route('ViewRole') }}">View View Vehicles</a>
            </li>

        </ul>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('logout')}}" class='sidebar-link'>
            <div class="icon dripicons-exit"></div>
            <span>Logout</span>
        </a>
    </li>

</ul>
