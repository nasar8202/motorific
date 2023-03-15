@extends('frontend.seller.layouts.app')
@section('title','Get In Touch')
@section('section')
<style>
.dropdown > span{
    position: relative;
    display: inline-block;
    color:white;
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
    <!-- HEADER -->
    <header>
        <div class="container-1600 d-flex justify-content-between pt-4">
            <div class="logo-navlinks d-flex align-items-center">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo-w.png')}}" alt=""></a>
                <ul class="navlinks navlinks-w mb-0 align-items-center">
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
                    
                    @auth

                @endauth

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
                <button><a href="{{ route('myLogin') }}">Sign In</a></button>
                @if (Route::has('register'))
                <button><a href="{{ route('registration') }}">Sign Up</a></button>
                @endif
                <button onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</button>
            </div>
            <div class="menu">
                <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="navi">
                    <ul>
                        <li class="logoMob">
                            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}"
                            alt=""></a>
                        </li>
                        <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                        <li>
                            <a href="{{ route('howItWorksforSeller') }}">How It Works</a>
                        </li>
                        <li>
                            <a href="{{ route('reviews') }}">Reviews</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        
                    @guest
                    <li><a href="{{ route('myLogin') }}">Sign In</a></li>
                    
                        <li><a href="{{ route('registration') }}">Sign Up</a></li>
                        @endguest
                        @guest
                            <li> <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>

                            </li>
                        @endguest

                    </div>
                        
                    </ul>
                </div>
            </div>
        </div>
    </header>
      <!-- PHOTO-UPLOAD-SECTION-1 -->
      <section class="photo-up-sec-1 reg-page-sec1">
        <div class="container-1151">
            <div class="d-flex">
                <div class="my-auto">
                {{-- <img src="{{ URL::asset('frontend/seller/assets/image/bmw.png')}}" alt=""> --}}
                </div>
                <div class="">
                <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </section>
    
    <!--Contact Form Sec-->
    <section class="contact-sec">
        <div class="container-1151">
            <h2>Get In Touch</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-content">
                        <h3>DON'T BE SHY</h3>
                        <p>Feel free to get in touch with me. I am always open to discussing new projects, creative ideas or opportunities to be part of your visions.</p>
                        <ul class="contact-info">
                            <li><span>Mail Me:</span> <a href="info@motorific.co.uk">info@motorific.co.uk</a></li>
                            <li><span>Call Me:</span> <a href="tel:+447593839364">+44 7593 839364</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <button class="btn submit-btn btn-green prim-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Form Sec End-->
 
    

    
    

    

    <!-- SECTION-7 -->

    <section class="sec-7">
        <div class="sec-7-bg-img sec-1-txt">
            <div class="container-1151">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="sec-7-box">
                            <h4>What are you waiting for?</h4>
                            <p>Bid adieu to traditional used car selling methods and join strong community of 200,000 + happy customers!</p>
                            <form class="millage_area1" method="get" action="{{ route('photoUpload') }}">

                                <span class="text mt-4 found1" style="color: white">Enter Mileage <i class="fa-solid fa-check"></i></span>
        
                                <br>
                                <input type="number" name="millage" placeholder="Enter Millage" required>
                                <input type="hidden" name="registeration" class="registeration1" value="">
                                <button type="submit">Continue</button>
        
                            </form>
                            <div class="check_area1">

                                <input type="text" name="registeration1" id="registeration1" placeholder="Enter REG"
                                    value="{{ old('registeration') }}">
                                <span class="text-danger show_error1"></span>
                                <button type="button" id="check_registeration1">Value Your Car</button>
                            </div>
                            @if ($errors->has('millage'))
                                <span class="text-danger">{{ $errors->first('millage') }}</span>
                            @endif
                            
                            
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="sec-7-box">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and stay on top of industry news. </p>
                            <input class="mb-3" type="text" name="subscriber_email" placeholder="email" id="subscriber_email" >
                            <button onclick="addSubscriber()">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('child-scripts')
    <script type="text/javascript">
        function addSubscriber() {
            var subscriber_email = $("#subscriber_email").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//   return regex.test(email);
            if(subscriber_email == '' || subscriber_email == null){
                alert('email field is required')
                return false;
            }
            else if(regex.test(subscriber_email) == false)
            {
                alert('invalid email format');
                return false;
            }
            $.ajax({
                type:"post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('addSubscriberEmail') }}',
                data: {
                    subscriber_email,
                    subscriber_email
                },
                success: function(response) {
                    if(response == "exists"){
                        alert("This Email Already Subscribed!");
                    }else if(response == "inserted"){
                        window.location.href = "{{ route('subscribeEmail')}}";
                        //alert("Congrats You Have Subscribe Successfully!");
                    }
                },
                error:function(){
                    alert('error')
                }
            });
          }
        $('.millage_area').hide();
        $('.show_error').hide();

        $('.millage_area1').hide();
        $('.show_error1').hide();
        // $('.found').hide();
        $("#check_registeration1").on("click",function(e){
            var registeration = $("#registeration1").val();
       
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
                        $('.show_error1').hide();
                        $('.check_area1').hide();
                        $('.millage_area1').show();
                        $('.found1').show();
                        $('.registeration1').val(registeration);
                    }
                    
                    else {
                        $('.show_error1').show();
                        $('.show_error1').text('Record Not Found')



                    }
                }
        });
    });
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
@endpush
