<section class="sec-7 subscribe-sec">
    <div class="sec-7-bg-img sec-1-txt">
        <div class="container-1151">
            <div class="subs-wraper">
                
                    <div class="sec-7-box">
                        <h4>What are you waiting for?</h4>
                        <p>Bid to traditional used car selling methods and join strong community of thousands happy
                            customers!</p>
                        <form class="millage_area1" method="get" action="{{ route('photoUpload') }}">

                            <span class="text mt-4 found1" style="color: white">Enter Mileage <i
                                    class="fa-solid fa-check"></i></span>

                            <br>
                            <input type="number" name="millage" placeholder="Enter Millage" required>
                            <input type="hidden" name="registeration" class="registeration1" value="">
                            <button type="submit" class="btn-submit"><span>Continue</span></button>

                        </form>
                        <div class="check_area1">

                            <input type="text" name="registeration1" id="registeration1" style="text-transform: uppercase" placeholder="Enter REG"
                                value="{{ old('registeration') }}" style="text-transform: uppercase">
                            <span class="text-danger show_error1"></span>
                            <button type="button" id="check_registeration1" class="btn-prim"><a href="javascript:void(0);">Value Your Car</a></button>
                            <div class="spinner-container">
                                <span class="spinner spinner--dotted sSecond"></span>
                                </div>
                        </div>
                        @if ($errors->has('millage'))
                        <span class="text-danger">{{ $errors->first('millage') }}</span>
                        @endif


                    </div>
                    <div class="sec-7-box">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and stay on top of industry news. </p>
                        <input class="mb-3" type="text" placeholder="email" name="subscriber_email"
                            id="subscriber_email">
                        <button onclick="addSubscriber()" class="btn-submit"><span>SUBSCRIBE</span></button>
                    </div>
                
            </div>
        </div>
    </div>
</section>