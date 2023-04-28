@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>
    .sec-2-txt h2 div,.sec-2-txt h2 div span {
        font-size: inherit;
        display: initial;
        color: inherit;
    }
</style>

<!-- MultiStep Form -->

<section class="sec-2 productPageTn hm-hiw-sec">
<div class="container">
    <div class="row">
        
        <!--<div class="col-lg-9 col-md-9">-->
            
        <!--    <div class="HowItWorks_sectionWrapper__HFXQB"><section class="Content-module_content__EnZoh HowItWorks_section__yUlox"><h2>How it works</h2><div><div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow1__engRN"><div class="HowItWorks_leftBlock___VKpI"><div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8"><picture><source srcset="/_next/static/media/how_it_works_step_1.bd8f24a8.webp" type="image/webp"><img alt="Step 1" src="/_next/static/media/how_it_works_step_1.c49c62c7.png"></picture></div></div><div class="HowItWorks_rightBlock__wZjbr"><span>1</span><h3>Join Motorific for free</h3><p>Sign up today to access all cars in our daily online sale. It’s free to get exclusive access to hundreds of fresh, premium vehicles to buy every day.<br><br>Once approved, we’ll guide you through buying cars on the platform. It’s quick to get started and our team is on hand to help you secure your first cars on Motorific.</p></div></div><div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow2__TED78"><div class="HowItWorks_leftBlock___VKpI"><div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8"><picture><source srcset="/_next/static/media/how_it_works_step_2.4aff2af5.webp" type="image/webp"><img alt="Step 2" src="/_next/static/media/how_it_works_step_2.739774c8.png"></picture></div></div><div class="HowItWorks_rightBlock__wZjbr"><span>2</span><h3>Browse exclusive stock</h3><p>We offer a huge range of high quality, privately-owned cars across all the major brands and alert you when suitable stock becomes available.<br><br>Each vehicle is fully profiled by our team, with detailed photos, specs, condition and service history. Sellers are vetted and price expectations are set to the right level for a fuss-free sale for both parties.</p></div></div><div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow3__Cvhel"><div class="HowItWorks_leftBlock___VKpI"><div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8"><picture><source srcset="/_next/static/media/how_it_works_step_3.b41a94c2.webp" type="image/webp"><img alt="Step 3" src="/_next/static/media/how_it_works_step_3.3070eb19.png"></picture></div></div><div class="HowItWorks_rightBlock__wZjbr"><span>3</span><h3>Bid easily online</h3><p>It’s easy to view stock on any device and place bids instantly online.<br><br>Thanks to our proxy bidding system, you just need to set your maximum bid for a vehicle during the sale, and it will automatically bid on your behalf in increments of £50. Never overpay to secure a vehicle.<br><br>With no middlemen, and the flexibility to bid as you see fit, Motorific puts you in control.</p></div></div><div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow4__ORlir"><div class="HowItWorks_leftBlock___VKpI"><div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8"><picture><source srcset="/_next/static/media/how_it_works_step_4.514768d1.webp" type="image/webp"><img alt="Step 4" src="/_next/static/media/how_it_works_step_4.1901637c.png"></picture></div></div><div class="HowItWorks_rightBlock__wZjbr"><span>4</span><h3>We close the sale for you</h3><p>If you place the winning bid, our team will automatically confirm the transaction with the seller and connect both parties to complete the handover.<br><br>Our sale closing process is fast, automated and designed to be quick and stress-free for everyone.</p></div></div><div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow5__UBF6a"><div class="HowItWorks_leftBlock___VKpI"><div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8"><picture><source srcset="/_next/static/media/how_it_works_step_5.ac2c0d3c.webp" type="image/webp"><img alt="Step 5" src="/_next/static/media/how_it_works_step_5.2f7476e4.png"></picture></div></div><div class="HowItWorks_rightBlock__wZjbr"><span>5</span><h3>Complete the purchase</h3><p>Our dedicated team is always on hand to assist with every purchase. Our collection service can inspect and collect on your behalf, then deliver directly to your dealership.<br><br>We charge fees on successful purchases only.<br><br>With Motorific, it’s easy to acquire the best stock with minimum hassle and maximum efficiency.</p></div></div></div></section></div>-->

        <!--</div>-->
        
        <div class="col-lg-9 col-md-9">

    <div class="HowItWorks_sectionWrapper__HFXQB">
        <section class="Content-module_content__EnZoh HowItWorks_section__yUlox">
            <h2>How it works</h2>
            <div>
                <div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow1__engRN">
                    <div class="HowItWorks_leftBlock___VKpI">
                        <div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8">
                            {{-- <picture>
                                <source srcset="/_next/static/media/how_it_works_step_1.bd8f24a8.webp"
                                    type="image/webp"><img alt="Step 1"
                                    src="/_next/static/media/how_it_works_step_1.c49c62c7.png">
                            </picture> --}}
                        </div>
                    </div>
                    <div class="HowItWorks_rightBlock__wZjbr"><span>1</span>
                      
                        <p>Join Motorific for free</p>
                    </div>
                </div>
                <div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow2__TED78">
                    <div class="HowItWorks_leftBlock___VKpI">
                        <div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8">
                            {{-- <picture>
                                <source srcset="/_next/static/media/how_it_works_step_2.4aff2af5.webp"
                                    type="image/webp"><img alt="Step 2"
                                    src="/_next/static/media/how_it_works_step_2.739774c8.png">
                            </picture> --}}
                        </div>
                    </div>
                    <div class="HowItWorks_rightBlock__wZjbr"><span>2</span>
                        
                        <p>Register to get access to all the vehicles with regular online sales by registering right now. We have 100s of dealer to dealer vehicles up for grabs.</p>
                    </div>
                </div>
                <div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow3__Cvhel">
                    <div class="HowItWorks_leftBlock___VKpI">
                        <div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8">
                            {{-- <picture>
                                <source srcset="/_next/static/media/how_it_works_step_3.b41a94c2.webp"
                                    type="image/webp"><img alt="Step 3"
                                    src="/_next/static/media/how_it_works_step_3.3070eb19.png">
                            </picture> --}}
                        </div>
                    </div>
                    <div class="HowItWorks_rightBlock__wZjbr"><span>3</span>
                       
                        <p> Once your registration is accepted, we will assist you in buying a car through the platform with indepth training on the platform  .</p>
                    </div>
                </div>
                <div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow4__ORlir">
                    <div class="HowItWorks_leftBlock___VKpI">
                        <div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8">
                            {{-- <picture>
                                <source srcset="/_next/static/media/how_it_works_step_4.514768d1.webp"
                                    type="image/webp"><img alt="Step 4"
                                    src="/_next/static/media/how_it_works_step_4.1901637c.png">
                            </picture> --}}
                        </div>
                    </div>
                    <div class="HowItWorks_rightBlock__wZjbr"><span>4</span>
                       
                        <p>We provide a large selection of high-quality private sale Vehicles as well as trade to trade vehicles we have 100s of new cars daily listed on our site.
                        </p>
                    </div>
                </div>
                <div class="HowItWorks_stepRow__OKQRb HowItWorks_stepRow5__UBF6a">
                    <div class="HowItWorks_leftBlock___VKpI">
                        <div class="ImageLazy_pictureWrapper__oSL78 ImageLazy_loaded__nnAo8">
                            {{-- <picture>
                                <source srcset="/_next/static/media/how_it_works_step_5.ac2c0d3c.webp"
                                    type="image/webp"><img alt="Step 5"
                                    src="/_next/static/media/how_it_works_step_5.2f7476e4.png">
                            </picture> --}}
                        </div>
                    </div>
                    <div class="HowItWorks_rightBlock__wZjbr"><span>5</span>
                  
                        <p>Each vehicle is fully profiled by our team, with detailed photos, specs, condition and service history. Sellers are vetted and price expectations are set to the right level for a fuss-free sale for both parties.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
    </div>
</div>
</section>

@endsection
@push('child-scripts')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


@endpush

