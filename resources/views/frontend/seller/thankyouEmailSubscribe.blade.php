@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
@section('headerClass','thnkPageTN')
@section('headerUlClass','')
@section('logoMain','frontend/seller/assets/image/logo.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')



<section class="thanks">
    <div class="container-1151">
        <div class="thnk-content">
            <span class="icon"><i class="fas fa-check-circle"></i></span>
            <h2>Thank You For Choosing Us</h2>
            <h6>You have Subscribe Successfully</h6>
            
                <br>
                {{-- <a href="{{route('index')}}">Go Back to Site</a> --}}
                You wil receive your tailored offer shortly via text or email.
                
            </p>
        </div>
    </div>
</section>
    
@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
