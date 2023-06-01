@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')

    <section class="inner-banner blog">
        <div class="container-1151">
            <div class="banner-inner-cont">
                <h1>{{$blogsdetail->title}}</h1>
            </div>
        </div>
    </section>
    
    <section class="help-acc-sec">
        <div class="container-1151">
            
            <img src="{{ asset('/blogs/images/'.$blogsdetail->image) }}">
            
            <div class="row blogs-details">
                
                    <div class="blog-content">
                        {!! $blogsdetail->long_description !!}
                    </div>
                
                
                    
                </div>
            </div>
            
        </div>
    </section>
    
    <section class="career-sec-cta contact-cta">
         <div class="container-1151">
             <div class="career-content">
                 <h2 class="sec-title">Have more questions?</h2>
                 <!-- <p class="sec-desc">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam
                 </p> -->
                 <a href="/get-in-touch" class="globel-btn career-btn">Contact us</a>
             </div>
         </div>
    </section>


 
    

@endsection
@push('child-scripts')
@endpush
