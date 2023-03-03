@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>

</style>


<section class="thanks">
    <div class="container-1151">
        <div class="thnk-content">
            <span class="icon"><i class="fas fa-check-circle"></i></span>
            <h2>Congratulations!</h2>
            <p>Your Advert is added Wait for admin approved,
                please call us on <a href="tel:07888185014"><i class="fa-solid fa-phone"></i> 07888185014.</a>

                You wil receive your tailored offer shortly via text or email.
                <br>
                We're taking our responsibilities to respond to Coronavirus (COVID 19) seriously and continue to follow the advice from Government and the NHS daily.
            </p>
            <a href="{{route('dealer.dashboard')}}"><i class="fa-solid "></i> Go Browse vehicle</a>
        </div>
    </div>
</section>
    
@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
