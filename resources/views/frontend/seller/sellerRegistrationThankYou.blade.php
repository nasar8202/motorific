@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
@section('headerClass','thnkPage')
@section('headerUlClass','logo-navlinks')
@section('logoMain','frontend/seller/assets/image/logo.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')



<section class="thanks">
    <div class="container-1151">
        <div class="thnk-content">
            <span class="icon"><i class="fas fa-check-circle"></i></span>
            <h2>Thank You For Registration</h2>
            <p>
                We have send you email and password please check your email!
                please call us on <a href="tel:07888185014"><i class="fa-solid fa-phone"></i> 07888185014.</a>

                {{-- You wil receive your admin approved shortly via text or email. --}}
                {{-- <br>
                We're taking our responsibilities to respond to Coronavirus (COVID 19) seriously and continue to follow the advice from Government and the NHS daily. --}}
            </p>
        </div>
    </div>
</section>
    
@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
