@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
@section('headerClass','header-light')
@section('headerUlClass','')
@section('logoMain','frontend/seller/assets/image/logo.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')


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



<!-- SECTION-1 -->

<section class="sec-1 seller-main-banner banner-sec seller-main" id="vehicle_registration">
    <div class="container-1151">
        <div class="row banner-content">
            <div class="sec-1-txt col-lg-6">
                <h2>Sell your car 
                    with <span>Motorific</span></h2>
                <p class="banner-desc"> Find your best offer from over thousands of dealers and sell for up to £1,000* more. It’s that easy.</p>
                <form class="millage_area" method="get" action="{{ route('photoUpload') }}">

                    <span class="text text-success mt-4 found">Enter Mileage <i class="fa-solid fa-check"></i></span>

                    <br>
                    <input type="number" name="millage" placeholder="Enter Millage" required>
                    <input type="hidden" name="registeration" class="registeration" value="">
                    <button type="submit" class="btn-prim"><a href="javascript:void(0)">Continue</a></button>

                </form>
                <div class="check_area">

                    <input type="text" name="registeration" id="registeration" placeholder="Enter REG"
                        value="{{ old('registeration') }}" style="text-transform: uppercase">
                    <span class="text-danger show_error"></span>
                    <button type="button" id="check_registeration" class="btn-prim"><a href="javascript:void(0);">Value Your Car</a></button>
                </div>
                @if ($errors->has('millage'))
                    <span class="text-danger">{{ $errors->first('millage') }}</span>
                @endif
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
         <h2  class="sec-heading">Excellent</h2>
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
                                <span>Antonio,    </span>
                                <span>5 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>Went above and beyond! Amazing!</h2>
                                <p><span>The employees made the process so simple but effective! Extremely trustworthy! Will definitely use again; no doubt!</span></p>
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
                                <span>Jason Adams,    </span>
                                <span>5 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>I had a great experience</h2>
                                <p><span>If you want a genuine safe and secure experience selling your car for the highest possible price and you are prepared to make an effort to take a good number  photos and then to comply with detailed instructions then the Motorific way is the way.I had a great experience! Very quick, very reliable. It was my first time using Motorific but I had a great experience. I would highly recommend them.</span></p>
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
                                <span>Abbas Dhirani (Ace),    </span>
                                <span>3 weeks ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>I had a great experience</h2>
                                <p><span>Phenomenal services, the chap managed to go through each and everything with my partner and myself, I was slightly worried, how we they educated us how it all works and can not recommend them enough! Thank you very very much!</span></p>
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
                                <span>Gellert Kiss,    </span>
                                <span>5 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>Wow, what an experience!</h2>
                                <h2>Wow, what a pleasant experience!</h2>
                                <p><span>I used Motorific to sell my car, and whilst I usually prefer to sell and buy cars privately, Motorific has changed my views. The team was very helpful, and on hand to assist. I got numerous offers for my car, and was sold in no time for the price I wanted without the hassle.
Don't look further, Motorific is the company you need to use!</span></p>
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
                                <span>Gellert Kiss    </span>
                                <span>6 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>Wow, what an experience!</h2>
                                
                                <p><span>Wow, what a pleasant experience! I used Motorific to sell my car, and whilst I usually prefer to sell and buy cars privately, Motorific has changed my views. The team was very helpful, and on hand to assist. I got numerous offers for my car, and was sold in no time for the price I wanted without the hassle. <br> Don't look further, Motorific is the company you need to use!</span></p>
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
                                <span>Miss Begum  </span>
                                <span>5 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>I had a great experience</h2>
                                
                                <p><span>I had a great experience! Very quick, very reliable. It was my first time using Motorific but I had a great experience. I would highly recommend them.</span></p>
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
                                <span>Jason Adams</span>
                                <span>6 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>I had a great experience</h2>
                                
                                <p><span>I had a great experience! Very quick, very reliable. It was my first time using Motorific but I had a great experience. I would highly recommend them.</span></p>
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
                                <span>vj kmr</span>
                                <span>6 Apr 2023</span>
                            </div>
                            <div class="tit-par">
                                <h2>Just sold my bmw 3 series through…</h2>
                                
                                <p><span>Just sold my bmw 3 series through Motorific, sale done within two days. Found them to be Professional and helpful, website was user friendly and the whole process was simple and smooth. <br> Dealer was friendly and respectful on collection. Would definitely recommend.</span></p>
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
                                <span>Zed Sadik</span>
                                <span>6 Apr 2023</span>
                            </div>
                            <div class="tit-par">
                                <h2>Recently I have had my car sold through…</h2>
                                
                                <p><span>Recently I have had my car sold through Motorific. I must say the experience was superb, due to its broader customer reach, faster and efficient customer service and reliable payment gateway. Credible and highly recommended!!</span></p>
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
                                <span>Antonio</span>
                                <span>6 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>Went above and beyond! Amazing!</h2>
                                
                                <p><span>The employees made the process so simple but effective! Extremely trustworthy! Will definitely use again; no doubt!</span></p>
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
                                <span>Mohammad Alam</span>
                                <span>4 Apr 2023</span>
                            </div>
                            <div class="tit-par">
                                <h2>Sold my Peugeot e-208 through Motorific…</h2>
                                
                                <p><span>Sold my Peugeot e-208 through Motorific <br><br>it was easy, fast, and stress-free! <br>I got a great price for my car and was able to complete the transaction quickly.<br><br>Highly recommend Motorific for anyone looking to sell their car fastly!</span></p>
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
                                <span>Gary Carr</span>
                                <span>30 Mar 2023</span>
                            </div>
                            <div class="tit-par">
                                <h2>Sitting on the my drive</h2>
                                
                                <p><span>Thank you Motorific, my car was sitting on the driveway for far to long before I was introduced to you guys.I was really taken back and surprised how quickly my car sold. I also received a reasonable price, I will surely tell my family and friends to look you guys up if they want to sell their car hassle free. You can have all my stars *****</span></p>
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
                                <span>Haris Ali</span>
                                <span>7 days ago</span>
                            </div>
                            <div class="tit-par">
                                <h2>Best place to sell your car if you…</h2>
                                
                                <p><span>Best place to sell your car if you wanna sell it quickly with a best price go ahead then you're on right page</span></p>
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
<script type="text/javascript">
    $('.millage_area').hide();
            $('.show_error').hide();
    
     $("#check_registeration").on("click", function(e) {
                var registeration = $("#registeration").val();
                e.preventDefault(); // prevent the form submission
    
                $.ajax({
                    type: "post",
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ route('testlocation') }}',
                    data: {
                        registeration,
                        registeration
                    },
    
                    success: function(response) {
                        console.log(response.registrationNumber);
    
                        if (response && !response.errors) {
                            $('.show_error').hide();
                            $('.check_area').hide();
                            $('.millage_area').show();
                            $('.found').show();
                            $('.registeration').val(registeration);
                        }
                        
                        else {
                            $('.show_error').show();
                            $('.show_error').text('Record Not Found')
    
    
    
                        }
                    }
    
                });
            });
    </script>
<script type=""></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script type="text/javascript">
// jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

var items = $(".list-wraper .reviews-add");
    var numItems = items.length;
    var perPage = 8;

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
