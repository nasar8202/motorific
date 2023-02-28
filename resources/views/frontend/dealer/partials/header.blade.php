<style>
    a.disabled {
          pointer-events: none;
          cursor: default;
          opacity: .6;
        }
        .logo-text a{
            text-decoration: none;
            color: white
        }
</style>
<header class="header">
    <!--<h2 class="logo-text">motorific</h2>-->
    <div class="container-1400 position-relative">
        <div class="row header-nav-row align-items-center">
            <div class="col-lg-2 d-lg-block d-none">
                @if(Auth::check())
                <h2 class="logoMain"><a  href="{{route('dealer.newDashboard')}}" class="d-block">motorific</a></h2>
                @else
                <h2 class="logoMain"><a  href="{{route('myLogin')}}" class="d-block">motorific</a></h2>
                @endif
            </div>
            <div class="col-lg-7 desktop-header">
                <div class="header-nav dflex-gap10">
                    @if(\Request::route()->getName() == 'dealer.newDashboard' || \Request::route()->getName() == 'dealer.dashboard' || \Request::route()->getName() == 'howItWorks' || \Request::route()->getName() == 'pricing' || \Request::route()->getName() == 'onlyCars' || \Request::route()->getName() == 'onlyVans' || \Request::route()->getName() == 'vehicle.vehicleDetail' || \Request::route()->getName() == 'vehicle.liveSell' || \Request::route()->getName() == 'buyItNow' || \Request::route()->getName() == 'dealerToDealer' || \Request::route()->getName() == 'dealersVehicleDetail' || \Request::route()->getName() == 'dealer.BidsAndOffers' || \Request::route()->getName() == 'bids.ActiveBiddedVehicle' || \Request::route()->getName() == 'bids.UnderBiddedOfferVehicle' || \Request::route()->getName() == 'bids.DidnotWinBiddedVehicle' || \Request::route()->getName() == 'dealer.PurchasesVehicle' || \Request::route()->getName() == 'bids.CompletedBiddedVehicle' || \Request::route()->getName() == 'bids.CancelledBiddedOfferVehicle' || \Request::route()->getName() == 'dealer.addVehicleToSellFromDealer' || \Request::route()->getName() == 'dealer.mediaCondition' || \Request::route()->getName() == 'dealer.vehicleAndDetails' || \Request::route()->getName() == 'dealer.vehicleListing' || \Request::route()->getName() == 'CompletedRequestedVehicle' || \Request::route()->getName() == 'CancelRequestedVehicle' || \Request::route()->getName() == 'myVehicles' || \Request::route()->getName() == 'orderOnMyVehicle'  || \Request::route()->getName() == 'sellerDetails' || \Request::route()->getName() == 'ownerDealerRequestedDetails' || \Request::route()->getName() == 'sellerRequestedDetails')
                    <nav>
                        <ul>
                            <li>
                                <a  class="{{ Request::route()->getName() == 'dealer.dashboard'  ? 'active' : ''}}" href="{{route('dealer.dashboard')}}">
                                       Browse vehicles
                                </a>
                            </li>
                            <li>
                                <a href="{{route('howItWorks')}}" class="{{ Request::route()->getName() == 'howItWorks'  ? 'active' : ''}}">
                                        How it works
                                </a>
                            </li>
                            <!--<li>-->
                            <!--    <a class="" href="javascript:void(0)">-->
                            <!--            Reviews-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li>
                                <a  href="{{route('pricing')}}" class="{{ Request::route()->getName() == 'pricing'  ? 'active' : ''}}">
                                        Pricing
                                </a>
                            </li>
                        </ul>
                    </nav>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 desktop-header user">
                <div class="header-btns dealer">
                    <!--<button class="btn-mts" > Sign In </button>-->
                    <!--<button class="btn-mts"> Contact Us </button>-->

                    @guest

                    <button class="btn-mts header-btn "><a href="{{ route('signup') }}">Sign Up</a></button>
                    <button class="btn-mts header-btn "><a href="{{ route('DealerLogin') }}">Sign In</a></button>
                    @else

                    
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('bids.ActiveBiddedVehicle') }}">
                            {{ __('Bids & offers') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('CompletedRequestedVehicle') }}">
                            {{ __('Purchases') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('dealer.addVehicleToSellFromDealer') }}">
                            {{ __('Add Vehicle To Sell') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('myVehicles') }}">
                            {{ __('My Vehicles') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                    @endguest
                </div>
            </div>
        </div>
            <div class="col-12 mob-header">
                <h3><a  href="{{route('dealer.newDashboard')}}" class="d-block">motorific</a></h3>
                <div class="mob-header-nav dealer align-items-center">
                @guest
                    <div class="userBtns">
                        <a href="{{ route('signup') }}">Sign Up</a>
                        <a href="{{ route('DealerLogin') }}">Sign In</a>
                    </div>
                    @else
                    
                    <button class="btn-icon toglleBtn">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    @endguest
                </div>
            </div>
    </div>
{{-- @dd(Request::route()->getName()) --}}
    @if(\Request::route()->getName() == 'dealer.addVehicleToSellFromDealer' || \Request::route()->getName() == 'dealer.mediaCondition' || \Request::route()->getName() == 'dealer.vehicleAndDetails' || \Request::route()->getName() == 'dealer.vehicleListing')

    <div class="container-1200">
        <div class="row">
            <div class="col-lg-12">
                <ul class="header-submenu d-flex">
                    <li>
                        <a href="{{ route('dealer.addVehicleToSellFromDealer') }}" class="{{ Request::route()->getName() == 'dealer.addVehicleToSellFromDealer'  ? 'active' : 'disabled'}}">
                                Vehicle Lookup
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dealer.mediaCondition') }}" class="{{ Request::route()->getName() == 'dealer.mediaCondition'  ? 'active' : 'disabled' }} ">
                                Media & Condition
                        </a>
                    </li>
                    <li>
                        <a  href="{{ route('dealer.vehicleListing') }}" class="{{ Request::route()->getName() == 'dealer.vehicleListing'  ? 'active' : 'disabled' }} ">
                                Listing Details
                        </a>
                    </li>
                    <li>
                        <a  href="{{ route('dealer.vehicleAndDetails') }}" class="{{ Request::route()->getName() == 'dealer.vehicleAndDetails'  ? 'active' : 'disabled' }} ">
                                Vehicle & Details
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
</header>
