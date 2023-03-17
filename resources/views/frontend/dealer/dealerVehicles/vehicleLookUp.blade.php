@extends('frontend.dealer.layouts.app')
    @section('title','Sell your car the with Motorific')
    @section('section')
    <!-- form css -->
    <style>

    </style>

    <!-- MultiStep Form -->
<br>
<br>
<br>
<br>
<br>

<section class="create-advert-sec section">
    <div class="container-1151">
        <div class="row">
            <!-- BOX-1 -->
            <div class="col-lg-7 col-md-7">
                <div class="graybox">
                    <form action="{{ route('dealer.addVehicleToSellFromDealerPost') }}" method="POST">
                        @csrf
                    <h2 class="headingqa-2 f-50">Create Advert for <span class="d-block">which Vehicle?</span> </h2>
                    <div class="details-field-main">
                        <label class="label-main-text f-18"> What is your vehicle registration or VIN number? </label>
                        <input class="inp-qa inp-round" name="vehicle_registartion_number" type="text" value=" {{  request()->session()->get('vehicle_registartion_number') }}" >
                        @if ($errors->has('vehicle_registartion_number'))
                        <span class="text-danger">{{ $errors->first('vehicle_registartion_number') }}</span>
                        @endif
                    </div>

                    <div class="details-field-main">
                        <label class="label-main-text f-18"> What is the mileage? </label>
                        <input class="inp-qa inp-round" type="number" name="vehicle_mileage" type="number"  value="{{ request()->session()->get('vehicle_mileage') }}">
                        @if ($errors->has('vehicle_mileage'))
                        <span class="text-danger">{{ $errors->first('vehicle_mileage') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn-qa1 f-16 btn-filled-sm c-dull-green">Find Vehicle</button>
                    {{-- <a href="{{ route('dealer.mediaCondition') }}" class="btn btn-primary pull-right">Find Vehicle</a> --}}
                </div>

            </div>
            <!-- BOX-2 -->
            <div class="col-lg-5 col-md-5">

            </div>
        </div>

    </div>

    <div class="car-img">
        <img src="{{ URL::asset('frontend/dealers/assets/image/car2.png')}}" class="img-fluid" alt="">
    </div>

</section>


<!-- NEWSLETTER SECTION -->
<section class="newsletter-sec" style="background-image: url({{ URL::asset('frontend/dealers/assets/image/newsletter-bg.png')}})">
    <div>
        <div class="container-1200">
            <div class="row">
                {{-- <div class="col-lg-6 col-md-8">
                    <div class="newsletter-box">
                        <h4>What are you waiting for?</h4>
                        <p>Bid to traditional used car selling methods and join strong community of thousands happy customers!</p>
                        <input class="inp-qa f-20" type="text" name="registeration" id="registeration" placeholder="Enter REG" >

                        <button type="button" class="btn-mts f-25">
                            Value Your Car
                        </button>
                    </div>
                </div> --}}

                <div class="col-lg-12 col-md-8">
                    <div class="newsletter-box">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and stay on top of industry news.</p>
                        <input class="inp-qa f-20" type="text" name="subscriber_email" id="subscriber_email" placeholder="Enter Email">
                        <button type="button" onclick="addSubscriber()" class="btn-mts f-25">
                            SUBSCRIBE
                        </button>
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
       
       
    </script>
@endpush

