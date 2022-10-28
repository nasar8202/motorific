<header>
    <div class="container-1600 d-flex justify-content-between pt-4">
        <div class="logo-navlinks d-flex align-items-center">
            <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt="">
            <ul class="navlinks mb-0 align-items-center">
                <a href="#">
                    <li>Browse Vehicles</li>
                </a>
                <a href="#">
                    <li>How It Works</li>
                </a>
                
            </ul>
        </div>
        <div class="head-btns  justify-content-between">
            @guest

            <button><a href="{{ route('signup') }}">Sign Up</a></button>
            <button ><a href="{{ route('DealerLogin') }}">Sign In</a></button>
            @else

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        <div class="menu">
            <div class="toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="navi">
                <ul>
                    <li><a href="#">Sell My Car</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
