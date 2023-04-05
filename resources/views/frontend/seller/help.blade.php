@extends('frontend.seller.layouts.app')
@section('title','Careers')
@section('section')
<style>
.dropdown > span{
    position: relative;
    display: inline-block;
    color:white;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
padding: 12px 16px;
z-index: 1;
}

.dropdown:hover .dropdown-content {
display: block;
}
    </style>
    <!-- HEADER -->
    <header class="header-career">
        <div class="container-1600 d-flex justify-content-between">
            <div class="logo-navlinks d-flex align-items-center">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo-w.png')}}" alt=""></a>
                <ul class="navlinks navlinks-w mb-0 align-items-center">
                    <a href="{{ route('sellMyCar') }}">
                        <li>Sell My Car</li>
                    </a>
                    
                    <a href="{{ route('howItWorksforSeller') }}">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('reviews') }}">
                        <li>Reviews</li>
                    </a>
                    {{-- <a href="#">
                        <li>Help</li>
                    </a> --}}
                    
                    @auth

                @endauth

                @guest
                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">

                    <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>


                   <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                    </div>
                </div>
                @endguest
                </ul>
            </div>
            <div class="head-btns  justify-content-between">
                <button><a href="{{ route('myLogin') }}">Sign In</a></button>
                @if (Route::has('register'))
                <button><a href="{{ route('registration') }}">Sign Up</a></button>
                @endif
                <button onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</button>
            </div>
            <div class="menu">
                <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="navi">
                    <ul>
                        <li class="logoMob">
                            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}"
                            alt=""></a>
                        </li>
                        <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                        <li>
                            <a href="{{ route('howItWorksforSeller') }}">How It Works</a>
                        </li>
                        <li>
                            <a href="{{ route('reviews') }}">Reviews</a>
                        </li>
                        {{-- <li>
                            <a href="#">Help</a>
                        </li> --}}
                            <li>
                            <a onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</a>
                        </li>
                        
                    @guest
                    <li><a href="{{ route('myLogin') }}">Sign In</a></li>
                    
                        <li><a href="{{ route('registration') }}">Sign Up</a></li>
                        @endguest
                        @guest
                            <li> <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>

                            </li>
                        @endguest

                    </div>
                        
                    </ul>
                </div>
            </div>
        </div>
    </header>
    
    
    <div class="career-sec">
        <div class="container-1151">
            <div class="career-top-content">
                <span class="tag">We're hiring!</span>
                <h1>Be Part of Our Mission</h1>
                <p>We're looking for passionate people to join our mission. We value flat hierarchies, clear communication, and full ownership and responsibility.</p>
            </div>
            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <strong>{{ $message }}</strong>
  </div>
@endif
            <div class="jobs-wraper">
                <ul class="tags-wraper">
                    <li>
                        <a class="job-tag active">View All</a>
                    </li>
                    <li>
                        <a class="job-tag">Development</a>
                    </li>
                    <li>
                        <a class="job-tag">Design</a>
                    </li>
                </ul>
                
                <div class="jobs-box">
                    <div class="job-content">
                        <h2>Product Designer</h2>
                        <p>We're looking for a mid-level product designer to join our team.</p>
                        <ul class="job-times">
                            <li><p><span><i class="fas fa-map-marker-alt"></i> </span> 100%</p></li>
                            <li><p><span><i class="fas fa-clock"></i> </span> Full-time</p></li>
                        </ul>
                    </div>
                    <a href="#careerForm" class="job-btn" data-bs-toggle="modal" >Apply <span><i class="fas fa-arrow-up"></i></span></a>
                </div>
                <div class="jobs-box">
                    <div class="job-content">
                        <h2>Product Designer</h2>
                        <p>We're looking for a mid-level product designer to join our team.</p>
                        <ul class="job-times">
                            <li><p><span><i class="fas fa-map-marker-alt"></i> </span> 100%</p></li>
                            <li><p><span><i class="fas fa-clock"></i> </span> Full-time</p></li>
                        </ul>
                    </div>
                    <a href="#careerForm" class="job-btn"  data-bs-toggle="modal">Apply <span><i class="fas fa-arrow-up"></i></span></a>
                </div>
                <div class="jobs-box">
                    <div class="job-content">
                        <h2>Product Designer</h2>
                        <p>We're looking for a mid-level product designer to join our team.</p>
                        <ul class="job-times">
                            <li><p><span><i class="fas fa-map-marker-alt"></i> </span> 100%</p></li>
                            <li><p><span><i class="fas fa-clock"></i> </span> Full-time</p></li>
                        </ul>
                    </div>
                    <a href="#careerForm" class="job-btn" data-bs-toggle="modal">Apply <span><i class="fas fa-arrow-up"></i></span></a>
                </div>
            </div>
        </div>
    </div>


<!-- Career Modal Form -->
<div class="modal fade careerFormModal" id="careerForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Work With Us</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="careerForm">
            <form action="{{route('applyForJob')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone_number" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" name="cv" class="form-control" >
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn-submit">Submit</button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>



 
    

@endsection
@push('child-scripts')
@endpush
