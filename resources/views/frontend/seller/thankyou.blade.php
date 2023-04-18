@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')


@section('headerClass','thnkPage')
@section('headerUlClass','')
@section('logoMain','https://motorific.co.uk/frontend/seller/assets/image/logo.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')

<!-- You will receive your tailored offer shortly via text or email. -->

<section class="thanks">
    <div class="container-1151">
        <div class="thnk-content">
            <span class="icon"><i class="fas fa-check-circle"></i></span>
            <h2>Thank You For Choosing Us</h2>
            {{-- <h6>Your Vehicle Has Been Submited. Wait For Admin Approvel</h6> --}}
            <p>Your Advert is added  While you wait for admin approval, please call us if you need further assistance 07888185014. 
                <a href="tel:07888185014"><i class="fa-solid fa-phone"></i> 07888185014.</a>
                <br>
                <a href="{{route('acceptedVehicles')}}">Check My Vehicle</a>
                You wil receive your tailored offer shortly via text or email.
                <br>
            </p>
        </div>
    </div>
</section>
    
@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
