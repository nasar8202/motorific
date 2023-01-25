@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<style>
    .dropdown {
position: relative;
display: inline-block;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
padding: 12px 16px;
z-index: 1;
}

.dropdown:hover .dropdown-content {
display: block;
}
</style>
<header>
    <div class="container-1600 d-flex justify-content-between pt-4" >
        <div class="logo-navlinks d-flex align-items-center">
            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt=""></a>
            <ul class="navlinks mb-0 align-items-center">
                <a href="{{ route('sellMyCar') }}">
                    <li>Sell My Car</li>
                </a>
                <a href="{{ route('howItWorksforSeller') }}">
                    <li>How It Works</li>
                </a>
                <a href="{{ route('reviews') }}">
                    <li>Reviews</li>
                </a>
                <a href="#">
                    <li>Help</li>
                </a>

                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">
                   <a href="{{ route('DealerLogin') }}">For Dealers</a>
                   <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                    </div>
                </div>
            </ul>
        </div>

        <div class="head-btns  justify-content-between">
            @guest
            <button><a href="{{ route('myLogin') }}">Sign In</a></button>
            @if (Route::has('register'))
            <button><a href="{{ route('registration') }}">Sign Up</a></button>
            @endif
            @else

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('acceptedVehicles')}}">My Account</a>
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
                    <li><a  href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- SECTION-1 -->

<section class="sec-1" id="vehicle_registration">
    <div class="container-1151">
        <div class="row">
            <div class="sec-1-txt col-lg-6">
                <h2>Sell your car the
                    with <span>Motorific</span></h2>
                <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>
            
            </div>
            <div class="sec-1-img col-lg-6">
                <img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- SECTION-2 -->
 <div class="container-1151">
     
     <div class="exelent">
         <h2>Excellent</h2>
        <span> <i class="fa fa-star"></i></span>
          <span> <i class="fa fa-star"></i></span>
            <span> <i class="fa fa-star"></i></span>
              <span> <i class="fa fa-star"></i></span>
                <span> <i class="fas fa-star-half"></i></span>
         </div>
 
  </div>     
<!-- SECTION-3 -->




@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
