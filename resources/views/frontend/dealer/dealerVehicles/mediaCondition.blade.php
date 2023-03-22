@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>

</style>

<!-- MultiStep Form -->
<br>

<section class="advert-details-sec section">
<div class="container-1200">
    <div class="row">

        <!-- BOX-1 -->
        <div class="col-lg-6 col-md-8">

            <div class="advert-details-form step1 show">
                <form action="{{ route('dealer.mediaConditionPost') }}" method="POST">
                    @csrf
                    {{-- <h2 class="headingqa-2 f-40">Advertise details</h2>
                    <div class="details-field-main">
                        <p class="label-main-text f-20"> Listing type </p>
                        <div>
                            <ul class='list-unstyled d-flex gap-4 mb-0'>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="listing_type" id="online_auction" value="Online auction" @if(old('listing_type') == "Online auction") checked @endif @if(request()->session()->get('listing_type') == 'Online auction') checked @endif  />
                                        <label class="dflex-gap10" for="online_auction">
                                            <span class="radio-circle"></span>
                                            <span>Online auction</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="listing_type" id="buy_now_only" value="Buy now only" @if(old('listing_type') == "Buy now only") checked @endif @if(request()->session()->get('listing_type') == 'Buy now only') checked @endif />
                                        <label class="dflex-gap10" for="buy_now_only">
                                            <span class="radio-circle"></span>
                                            <span>Buy now only</span>
                                        </label>
                                    </div>
                                </li>

                            </ul>
                            @if ($errors->has('listing_type'))
                            <span class="text-danger">{{ $errors->first('listing_type') }}</span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="details-field-main">
                        <label class="label-main-text f-20"> Stand in value </label>
                        <input class="inp-qa f-20" type="number" placeholder="0" name="stand_in_value" value="{{ old('stand_in_value') ?? request()->session()->get('stand_in_value') }}" >
                        @if ($errors->has('stand_in_value'))
                        <span class="text-danger">{{ $errors->first('stand_in_value') }}</span>
                        @endif
                    </div>

                    <div class="details-field-main mb-0">
                        <p class="label-main-text f-20"> VAT </p>
                        <div>
                            <ul class='list-unstyled d-flex gap-4 mb-0'>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="vat" id="plus_vat" value="VAT Qualifying" @if(old('vat') == "VAT Qualifying") checked @endif @if(request()->session()->get('vat') == 'VAT Qualifying') checked @endif/>
                                        <label class="dflex-gap10" for="plus_vat">
                                            <span class="radio-circle"></span>
                                            <span>VAT Qualifying</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="vat" id="no_vat"  value="VAT Marginal" @if(old('vat') == "VAT Marginal") checked @endif @if(request()->session()->get('vat') == 'VAT Marginal') checked @endif/>
                                        <label class="dflex-gap10" for="no_vat">
                                            <span class="radio-circle"></span>
                                            <span>VAT Marginal</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            @if ($errors->has('vat'))
                            <span class="text-danger">{{ $errors->first('vat') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="details-field-main confirmation-div">
                        <div class="custom-checkbox d-flex my-4">
                            <input class="hide-inp" type="checkbox" name="confirm" @if(old('confirm') == "1") checked @endif @if(request()->session()->get('confirm') == '1') checked @endif value="1" id="confirm_tac"  />
                            <label class="dflex-gap10 align-items-start" for="confirm_tac">
                                <span class="checkbox-square f-15">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <span>
                                    I confirm that all information on this advert is truthfully
                                    represented, and adheres to Motorific T&C’s.
                                </span>
                            </label>
                        </div>
                        @if ($errors->has('confirm'))
                        <span class="text-danger">{{ $errors->first('confirm') }}</span>
                        @endif
                    </div>

                    {{-- <div>
                        <button type="button" class="btn-qa1 f-25 w-100">
                            Publish advert
                        </button>
                    </div> --}}

                    <div class="bt-btns-main d-flex">
                        <button type="button" class="btn-trans step4-back-btn btn-Prev">
                            <i class="fa-solid fa-arrow-left-long"></i>
                            <span><a href="{{route('dealer.mediaCondition')}}">Go Back</a></span>
                        </button>
                        <button type="submit" class="btn-trans step4-btn-save btn-Next">
                            
                            <i class="fa-solid fa-arrow-left-long"></i>
                            Next Step

                        </button>
                    </div>
                </form>
            </div>


        </div>

        <!-- BOX-2 -->
        <div class="col-lg-6 col-md-8">
            <div class="description-box graybox">
                <div class="item-img">
                    <img src="{{ URL::asset('frontend/dealers/assets/image/your-image-vehicle.png')}}" alt="">
                    
                    {{-- <img src="{{ URL::asset('frontend/dealers/assets/image/car1.png')}}" alt=""> --}}
                </div>
                <div>
                    <h3 class="item-descp f-18">
                 
                        {{ request()->session()->get('vehicle_name') }}
                    </h3>
                    <ul class="item-features">
                        <li> {{ request()->session()->get('vehicle_registartion_number') ??'N/F' }}</li>
                        <li> {{ request()->session()->get('vehicle_year')??'N/F' }}</li>
                        <li>{{ request()->session()->get('vehicle_color')??'N/F' }}</li>
                        <li> {{ request()->session()->get('vehicle_body')}}</li>
                        <li>{{ request()->session()->get('vehicle_mileage')??'N/F' }}</li>
                        <li> {{ request()->session()->get('vehicle_transmission')??'N/F' }}</li>
                      
                    </ul>
     
                </div>
            </div>
            {{-- <div class="d-flex gap-2 justify-content-end mt-4">
                <button type="button" class="btn-qa1 f-16 btn-border-sm">Save Advert</button>
                <button type="button" class="btn-qa1 f-16 btn-filled-sm">Publish Advert</button>
            </div> --}}
        </div>

    </div>

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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut
                        labore</p>
                    <input class="inp-qa f-20" type="text" placeholder="Enter REG" >
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
