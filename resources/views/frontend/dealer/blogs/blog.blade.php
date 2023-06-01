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
                
                    @forelse($blogs as $blog)
                    <div class="blogs-inner">
                        <div class="blog image">
                        <img src="{{ asset('/blogs/images/'.$blog->image) }}" width="100" height="100">
                           
                        </div>
                        <div class="blog-content">
                            <a href="{{route('dealerBlogsdetail',$blog->slug)}}" class="blog-title">
                                <h4>{{$blog->title}}</h4>
                            </a>
                            <p class="blog-text">{{$blog->short_description}}</p>
                            <button class="btn-prim btn-second"><a href="{{route('dealerBlogsdetail',$blog->slug)}}">Read More</a></button>
                        </div>
                    </div>
                    @empty
                    
                    <div class="blogs-inner">
                        
                        <div class="blog-content">
                            
                            <p class="blog-text">No Blog Found!</p>
                            
                        </div>
                    </div>
                    @endforelse
                   
                
                
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
