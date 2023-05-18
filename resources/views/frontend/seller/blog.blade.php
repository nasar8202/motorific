@extends('frontend.seller.layouts.app')
@section('title','Blogs')
@section('section')
@section('headerClass','transparent-header')
@section('headerUlClass','navlinks-w')
@section('logoMain','frontend/seller/assets/image/logo-w.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')


    <section class="inner-banner blog">
        <div class="container-1151">
            <div class="banner-inner-cont">
                <h1>Blogs</h1>
            </div>
        </div>
    </section>
    
    <section class="help-acc-sec">
        <div class="container-1151">
            
            <div class="row blogs-main">
                <div class="blogs-inner">
                    <div class="blog image">
                        <img src="https://motorific.co.uk/frontend/seller/assets/image/sec-1-vector.png" alt="">
                    </div>
                    <div class="blog-content">
                        <a href="https://motorific.co.uk/blogs1" class="blog-title">
                            <h4>Blog Name1</h4>
                        </a>
                        <p class="blog-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <button class="btn-prim btn-second"><a href="https://motorific.co.uk/blogs1">Read More</a></button>
                    </div>
                </div>
                
                <div class="blogs-inner">
                    <div class="blog image">
                        <img src="https://motorific.co.uk/frontend/seller/assets/image/sec-1-vector.png" alt="">
                    </div>
                    <div class="blog-content">
                        <a href="https://motorific.co.uk/blogs2" class="blog-title">
                            <h4>Blog Name2</h4>
                        </a>
                        <p class="blog-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <button class="btn-prim btn-second"><a href="https://motorific.co.uk/blogs2">Read More</a></button>
                    </div>
                </div>
                
                <div class="blogs-inner">
                    <div class="blog image">
                        <img src="https://motorific.co.uk/frontend/seller/assets/image/sec-1-vector.png" alt="">
                    </div>
                    <div class="blog-content">
                        <a href="https://motorific.co.uk/blogs3" class="blog-title">
                            <h4>Blog Name3</h4>
                        </a>
                        <p class="blog-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <button class="btn-prim btn-second"><a href="https://motorific.co.uk/blogs3">Read More</a></button>
                    </div>
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