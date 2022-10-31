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
<section class="sec-2">
    <div class="container-1151">
        <div class="sec-2-txt pb-4">
            <h2>Live Sell ends in 2 hrs</h2>
            <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>
        </div>
        <div class="row">

            <!-- BOX-1 -->
            <div class="col-lg-3 col-md-3">
                <div class="box">
                    <h4>Sold by Sydney</h4>
                    <div class="box-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/box-1.png') }}" width="200px" alt="">
                    </div>
                    <h5>Mercedes C180 KOMP Avantgarde...,</h5>
                    <div class="d-flex justify-content-between">
                        <p>Sold for £1,400</p>
                        <h5>a day ago</h5>
                    </div>
                </div>
            </div>

            <!-- BOX-2 -->
            <div class="col-lg-3 col-md-3">
                <div class="box">
                    <h4>Sold by Sydney</h4>
                    <div class="box-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/box-2.png') }}" width="200px" alt="">
                    </div>
                    <h5>Mercedes C180 KOMP. Avantgarde…,</h5>
                    <div class="d-flex justify-content-between">
                        <p>Sold for £1,400</p>
                        <h5>a day ago</h5>
                    </div>
                </div>
            </div>
 <!-- BOX-2 -->
 <div class="col-lg-3 col-md-3">
    <div class="box">
        <h4>Sold by Sydney</h4>
        <div class="box-img">
            <img src="{{ URL::asset('frontend/seller/assets/image/box-2.png') }}" width="200px" alt="">
        </div>
        <h5>Mercedes C180 KOMP. Avantgarde…,</h5>
        <div class="d-flex justify-content-between">
            <p>Sold for £1,400</p>
            <h5>a day ago</h5>
        </div>
    </div>
</div>

            <!-- BOX-3 -->
            <div class="col-lg-3 col-md-3 mx-auto">
                <div class="box">
                    <h4>Sold by Sydney</h4>
                    <div class="box-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/box-3.png') }}" width="200px" alt="">
                    </div>
                    <h5>Mercedes C180 KOMP. Avantgarde…,</h5>
                    <div class="d-flex justify-content-between">
                        <p>Sold for £1,400</p>
                        <h5>a day ago</h5>
                    </div>
                </div>
            </div>

        </div>


        <div class="sec-2-btns text-center">
            <button>VALUE YOUR CAR</button>
            <button>GET IN TOUCH</button>
        </div>
    </div>
</section>

    @endsection


