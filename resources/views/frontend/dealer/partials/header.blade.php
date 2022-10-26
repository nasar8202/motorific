<header>
    <div class="container-1600 d-flex justify-content-between pt-4">
        <div class="logo-navlinks d-flex align-items-center">
            <img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt="">
            <ul class="navlinks mb-0 align-items-center">
                <a href="#">
                    <li>Sell My Car</li>
                </a>
                <a href="#">
                    <li>How It Works</li>
                </a>
                <a href="#">
                    <li>Reviews</li>
                </a>
                <a href="#">
                    <li>Help</li>
                </a>
            </ul>
        </div>
        <div class="head-btns  justify-content-between">
            <button><a href="{{ route('signup') }}">Sign In</a></button>
            <button>Contact Us</button>
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
