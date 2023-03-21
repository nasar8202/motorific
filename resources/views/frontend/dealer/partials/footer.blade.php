
 <!-- FOOTER -->

 <section class="sec-8">
    <div class="container-1151">
        <div class="main-footer">
            <div class="footer-sub about">
                <h5>About</h5>
                <ul>
                    <li>
                        <a href="#">About us</a>
                    </li>
                    <li>
                        <a href="#">Contact us</a>
                    </li>
                    <li>
                        <a href="#">Press</a>
                    </li>
                    <li>
                        <a href="#">Careers</a>
                    </li>
                </ul>
            </div>
              <div class="footer-sub product">
                <h5>Product</h5>
                <ul>
                    <li>
                        <a href="{{route('CarValueTracker')}}">Sell my car</a>
                    </li>
                    <li>
                        <a href="{{route('CarValueTracker')}}">Sell my van</a>
                    </li>
                    <li>
                        <a href="{{route('CarValueTracker')}}">Car buyers</a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="">Cash for cars</a>-->
                    <!--</li>-->
                    <li>
                        <a href="{{route('SellMyCarOnFinance')}}">Sell My Car On Finance</a>
                    </li>
                    <li>
                        <a href="{{route('CarValueTracker')}}">Car Valuation</a>
                    </li>
                    <li>
                        <a href="{{route('CarValueTracker')}}">Who will buy my car?</a>
                    </li>
                </ul>
            </div>
            <div class="footer-sub product-2">
                <ul>
                    <li>
                        <a href="{{route('CarValueTracker')}}">Car buying sites</a>
                    </li>
                    <li>
                        <a href="{{route('sellToADealer')}}">Sell to a dealer</a>
                    </li>
                    <li>
                        <a href="{{route('sellMyElectricCars')}}">Sell my electric car</a>
                    </li>
                </ul>
            </div>
            <div class="footer-sub contact">
                <div>
                    <h5>Whatsapp</h5>
                    <p>+44 7593 839364</p>
                </div>
                <div>
                    <h5>Customer Support </h5>
                    <p>+44 7593 839364</p>
                </div>
                <div>
                    <h5>Email</h5>
                    <p>info@motorific.co.uk</p>
                </div>
            </div>
            <div class="footer-sub contact-2">
            <a  href="{{route('dealer.newDashboard')}}" class="d-block"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png')}}" alt=""> </a>
                <div class="d-flex mt-4 mb-4">
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h4 class="copyright-txt">© Motorific Online Ltd. <?php echo date("Y"); ?></h4>
            </div>
        </div>
    </div>
</section>
