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
    
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link {{ (Request::is('admin') ||  request()->IS('admin/view-user') ) ? 'active open' : '' }}'>
            <i class="bi bi-stack"></i>
            <span>Sellers </span>
        </a>
        <ul class="submenu">
            <li class="submenu-item">
                <a href="{{route('viewUsers')}}">All Sellers</a>
            </li>

        </ul>
    </li>
   
  
    <li class="sidebar-item  has-sub {{ (Request::is('admin') || request()->IS('admin/add-vehicle') || request()->IS('admin/deleted-vehicles')  || request()->IS('admin/view-vehcile') ? 'active' : '') }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Manage Your Vehicle</span>
        </a>
        <ul class="submenu" style="display:{{ (Request::is('admin') || request()->IS('admin/add-vehicle') || request()->IS('admin/deleted-vehicles')  || request()->IS('admin/view-vehcile') ? 'block' : '') }}">
            <li class="submenu-item {{ request()->IS('admin/add-vehicle') ? 'active' : '' }}">
                <a href="{{ route('createVehicleForm') }} ">Add Vehicle</a>
            </li>
            <li class="submenu-item {{ request()->IS('admin/view-vehcile') ? 'active' : '' }}">
                <a href="{{ route('viewVehicle') }}">View Vehicle</a>
            </li>
            <li class="submenu-item {{ request()->IS('admin/deleted-vehicles') ? 'active' : '' }}">
                <a href="{{ route('deletedVehicleItems') }}">Deleted Vehicle</a>
            </li>
            
        </ul>
    </li>

    <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        <a href="{{route('allBiddingVehicle')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Live Sell Bided Vehicle</span>
        </a>
       
    </li>
    <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        <a href="{{route('orderVehicle')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Vehicle With Bids</span>
        </a>
       
    </li>
    <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        <a href="{{route('viewDealerVehicle')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Dealer's Vehicle</span>
        </a>
       
    </li>
    <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        
        <a href="{{route('dealersOrderdVehicle')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Vehicle With Bids <br><small>Dealer To Dealer Vehicles</small></span>
            
            
        </a>
    </li>
   
    {{-- <li class="sidebar-item  has-sub {{ (Request::is('admin') || request()->IS('/admin/all-bidding-vehicle') || request()->IS('/admin/all-bidding-vehicle') ? 'active' : '') }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Seller Vehicles</span>
        </a>
        <ul class="submenu" style="display:{{ (Request::is('admin') || request()->IS('admin/view-vehcile') || request()->IS('admin/view-vehcile') ? 'block' : '') }}">
            <li class="submenu-item {{ request()->IS('admin/add-vehicle') ? 'active' : '' }}">
                <a href="{{ route('viewSellerVehicle') }} ">View New Vehicle</a>
            </li>
            
            
        </ul>
    </li> --}}
    {{-- <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        <a href="{{route('liveSell')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Live Sell Time</span>
        </a>
       
    </li> --}}
    
    
    <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        <a href="{{route('viewPricing')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Set Vehicle Charges</span>
        </a>
       
    </li>
    <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        <a href="{{route('cardDetailsShowAdmin')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Dealer Charges Details</span>
        </a>
       
    </li>
    
    
    <li class="   {{ (Request::is('admin') || request()->IS('/admin/live-sell') || request()->IS('/admin/live-sell') ? 'active' : '') }} ">
        
        <a href="{{route('cancelVehicle')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Canceled Vehicle </span>
            
            
        </a>
    </li>

    <li class="   {{ (Request::is('admin') || request()->IS('/admin/sold-vehicles') || request()->IS('/admin/sold-vehicles') ? 'active' : '') }} ">
        
        <a href="{{route('soldVehicles')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Sold Vehicle </span>
            
            
        </a>
    </li>

    <li class="sidebar-item  has-sub {{ request()->IS('admin/view-seller-persons') ||request()->IS('admin/register-sell-person') ? 'active' : '' }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Sales Agent</span>
        </a>
        <ul class="submenu" style="display:{{  request()->IS('admin/register-sell-person') ? 'active' : '' }}">
            <li class="submenu-item {{ request()->IS('admin/register-sell-person') ? 'active' : '' }}">
                <a href="{{ route('createSellesPersonForm') }} ">Add Agent </a>
            </li>
            <li class="submenu-item {{ request()->IS('admin/view-seller-persons') ? 'active' : '' }}">
                <a href="{{ route('viewSellerPersons') }}">View Agent </a>
            </li>
            
        </ul>
    </li>
    
    <li class="sidebar-item  has-sub {{ request()->IS('admin/view-blogs') ||request()->IS('admin/add-blog') ? 'active' : '' }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Blogs</span>
        </a>
        <ul class="submenu" style="display:{{  request()->IS('admin/view-blogs') ? 'active' : '' }}">
            <li class="submenu-item {{ request()->IS('admin/add-blog') ? 'active' : '' }}">
                <a href="{{ route('addBlogForm') }} ">Add Blog </a>
            </li>
            <li class="submenu-item {{ request()->IS('admin/view-seller-persons') ? 'active' : '' }}">
                <a href="{{ route('viewBlogs') }}">View Blogs </a>
            </li>
            
        </ul>
    </li>

    <li class="   {{ (Request::is('admin') || request()->IS('/admin/get-contacts') || request()->IS('/admin/get-contacts') ? 'active' : '') }} ">
        
        <a href="{{route('getContacts')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Get In Touch</span>
            
            
        </a>
    </li>

    <li class="sidebar-item  has-sub {{ request()->IS('admin/view-all-subscribers') ||request()->IS('admin/view-all-subscribers') ? 'active' : '' }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Subscribers</span>
        </a>
        <ul class="submenu" style="display:{{  request()->IS('admin/send-notification-to-subscribers') ? 'active' : '' }}">
            <li class="submenu-item {{ request()->IS('admin/send-notification-to-subscribers') ? 'active' : '' }}">
                <a href="{{ route('createNotificationToSubscriberForm') }} ">Send Notification </a>
            </li>
            <li class="submenu-item {{ request()->IS('admin/view-all-subscribers') ? 'active' : '' }}">
                <a href="{{ route('viewAllSubscribers') }}">View Subscribers </a>
            </li>
            
        </ul>
    </li>
    <li class="   {{ (Request::is('admin') ||  request()->IS('/admin/getCvs') ? 'active' : '') }} ">
        
        <a href="{{route('getCvs')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Job Request</span>
            
            
        </a>
    </li>

    <!-- <li class=" {{ (Request::is('admin') ||  request()->IS('/admin/valuationNotifications') ? 'active' : '') }} ">
        
        <a href="{{route('valuationNotifications')}}" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Valuation Notification</span>
            
            
        </a>
    </li> -->


    <li class="sidebar-item  has-sub {{ (Request::is('admin') ||  request()->IS('admin/view-vehicle-features') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/view-seat-materials') ||  request()->IS('admin/add-seat-material') ? 'active open' : '') }} ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Manage User Side Qts </span>
        </a>
        <ul class="submenu">
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link {{ (Request::is('admin') ||  request()->IS('admin/view-vehicle-features') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/add-vehicle-feature') ||  request()->IS('admin/view-seat-materials') ||  request()->IS('admin/add-seat-material') ? '' : '') }}'>
                    <i class="bi bi-stack"></i>
                    <span>Vehicle Details </span>
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
                    <li class="submenu-item">
                        <a href="{{ route('viewFinance') }}">Finance</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('viewVehicleHistory') }}">Vehicle History</a>
                    </li>
                </ul>
            </li>
           
            {{-- <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Pictures </span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="">Vehicle Feature</a>
                    </li>

                </ul>
            </li> --}}

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Vehicle Category</span>
                </a>
                <ul class="submenu">
                   
                    <li class="submenu-item">
                        <a href="{{route('viewCategories')}}">View Category</a>
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
