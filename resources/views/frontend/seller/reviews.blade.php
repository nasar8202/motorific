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

                @guest
                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">

                    <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>


                   <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                    </div>
                </div>
                @endguest
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
                    <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                    <a href="{{ route('howItWorksforSeller') }}">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('reviews') }}">
                        <li>Reviews</li>
                    </a>
                    <li><a href="#">Help</a></li>
                    @guest
                        <li> <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>

                        </li>
                    @endguest
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
<section class="sec-review" >
 <div class="container-1151">
     
     <div class="exelent">
         <h2>Excellent</h2>
        <span> <i class="fa fa-star"></i></span>
          <span> <i class="fa fa-star"></i></span>
            <span> <i class="fa fa-star"></i></span>
              <span> <i class="fa fa-star"></i></span>
                <span> <i class="fas fa-star-half"></i></span>
         </div>
          <p class="shown">Showing our 4 & 5 star reviews
            </p>
            
            <div class="list-wraper">
                <div class="reviews-add">
                    <div class="reviews-box">
               
                        <div class="rev-content">
                            <div class="exelent scnd">
                           <span> <i class="fa fa-star"></i></span>
                             <span> <i class="fa fa-star"></i></span>
                               <span> <i class="fa fa-star"></i></span>
                                 <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                   <strong><i class="fas fa-check-circle"></i> Invited</strong>
                                      </div>
                            </div>
                                  <div class="time-period">
                                <span>Richard Orr,    </span>
                                <span>59 minutes ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>If you want a genuine safe and secure…</h2>
                                <p><span>If you want a genuine safe and secure experience selling your car for the highest possible price and you are prepared to make an effort to take a good number  photos and then to comply with detailed instructions then the Motorway way is the way.</span></p>
                            </div>
                    </div>
                </div>
                    <div class="reviews-add">
                    <div class="reviews-box">
               
                        <div class="rev-content">
                            <div class="exelent scnd">
                           <span> <i class="fa fa-star"></i></span>
                             <span> <i class="fa fa-star"></i></span>
                               <span> <i class="fa fa-star"></i></span>
                                 <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                   <strong><i class="fas fa-check-circle"></i> Invited</strong>
                                      </div>
                            </div>
                                  <div class="time-period">
                                <span>Richard Orr,    </span>
                                <span>59 minutes ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>If you want a genuine safe and secure…</h2>
                                <p><span>If you want a genuine safe and secure experience selling your car for the highest possible price and you are prepared to make an effort to take a good number  photos and then to comply with detailed instructions then the Motorway way is the way.</span></p>
                            </div>
                    </div>
                </div>
                    <div class="reviews-add">
                    <div class="reviews-box">
               
                        <div class="rev-content">
                            <div class="exelent scnd">
                           <span> <i class="fa fa-star"></i></span>
                             <span> <i class="fa fa-star"></i></span>
                               <span> <i class="fa fa-star"></i></span>
                                 <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                   <strong><i class="fas fa-check-circle"></i> Invited</strong>
                                      </div>
                            </div>
                                  <div class="time-period">
                                <span>Richard Orr,    </span>
                                <span>59 minutes ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>If you want a genuine safe and secure…</h2>
                                <p><span>If you want a genuine safe and secure experience selling your car for the highest possible price and you are prepared to make an effort to take a good number  photos and then to comply with detailed instructions then the Motorway way is the way.</span></p>
                            </div>
                    </div>
                </div>
          
            </div>
              <div id="pagination-container"></div>
  </div>    
  </section>
<!-- SECTION-3 -->




@endsection
@push('child-scripts')
<script type=""></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script type="text/javascript">
// jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

var items = $(".list-wraper .reviews-add");
    var numItems = items.length;
    var perPage = 2;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
</script>
@endpush
