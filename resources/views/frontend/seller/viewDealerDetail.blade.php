@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')

<style>
    .dropdown {
position: relative;
display: inline-block;
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

div#first {
    display: flex;
}
.dropdown:hover .dropdown-content {
display: block;
}
</style>
<header>
    <div class="container-1600 d-flex justify-content-between pt-4">
        <div class="logo-navlinks d-flex align-items-center">
            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt=""></a>
            <ul class="navlinks mb-0 align-items-center">
                <a href="{{ route('sellMyCar') }}">
                    <li>Sell My Car</li>
                </a>
                <a href="{{ route('howItWorksforSeller') }}">
                    <li>How It Works</li>
                </a>
                <a href="{{ route('reviews') }}">
                    <li>Reviews</li>
                </a>
                </a>
                <a href="#">
                    <li>Help</li>
                </a>

                @auth

                @endauth

                @guest
                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">

                    <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>


                   <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                    </div>
                </div>
                @endguest
            </ul>
        </div>

        <div class="head-btns  justify-content-between">
            @guest
            <button><a href="{{ route('myLogin') }}">Sign In</a></button>
            @if (Route::has('register'))
            <button><a href="{{ route('registration') }}">Sign Up</a></button>
            @endif
            @else

                    <a style="color: black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('acceptedVehicles') }}">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>

            @endguest

            <button>Contact Us</button>
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
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <button id="navbarDropdown" class="nav-link dropdown-toggle userPro-btn" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </button>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('acceptedVehicles') }}">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                        @guest
                            <li> <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>

                            </li>
                        @endguest
                        
                    </ul>
                </div>
        </div>
    </div>
</header>

<!-- SECTION-1 -->
<div class="container">
<div class="" style="margin-top:100px ">
  
  <section class="section">
      <div class="card">
       
          <div class="card-body">
              <!-- Student Profile -->
              <div class="student-profile py-4">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-4">
                              <div class="card shadow-sm">
                                  <div class="card-header bg-transparent text-center">
                                      <img class="profile_img"
                                          src="{{ URL::asset('backend\admin\assets\images\dealerprofile\man.png') }}"
                                          alt="">
                                      <h3>{{ $dealers->name }}</h3>
                                  </div>
                                  <div class="card-body">
                                      <p class="mb-0"><strong class="pr-1">Email :</strong>{{ $dealers->email }}
                                      </p>
                                      <p class="mb-0"><strong class="pr-1">Phone Number
                                              :</strong>{{ $dealers->phone_number }}</p>
                                  </div>
                              </div>

                          </div>

                          <div class="col-lg-8">
                              <form action="{{ route('dealer.approveRequestDocuments') }}" method="POST"
                                  enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $dealers->id }}">
                                  <div class="card shadow-sm">
                                      <div class="card-header bg-transparent border-0">
                                          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                                      </div>
                                      <div class="card-body pt-0">
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th width="30%">Address</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->address_line_1 ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">City </th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->city ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Postcode</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->postcode ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Website</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->website ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Company Phone</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->company_phone ??"" }}</td>
                                              </tr>
                                              {{-- <tr>
                                                  <th width="30%">Lower Purchase Price</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->lowest_purchase_price  ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Highest Purchase Price </th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->highest_purchase_price ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Age Range To</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->age_range_to ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Age Range From</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->age_range_from ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Mileage From</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->mileage_from  ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Milage To</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->mileage_to ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">How Far Distance</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->how_far_distance ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Purchase Rach Month Vehicles</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->purchase_each_month_vehicles ??"" }}</td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Any Thing Else</th>
                                                  <td width="2%">:</td>
                                                  <td>{{ $dealers->userDetails->any_thing_else ??"" }}</td>
                                              </tr> --}}


                                          </table>
                                      </div>
                                  </div>
                                  
                                  @if($dealers->userDetails->dealer_identity_card == null && $dealers->userDetails->dealer_documents == null)
                                  <div class="card shadow-sm">
                                      <div class="card-header bg-transparent border-0">
                                          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Upload ID And Documents
                                              Required <span style="color: red"> *</span></h3>
                                      </div>
                                      <div class="card-body pt-0 resp-set">
                                          <table class="table table-bordered">
                                              
                                              <tr>
                                                  <th width="30%">ID</th>
                                                  <td width="2%">:</td>
                                                  <td class="set-scr"><input type="file"
                                                          name="dealer_identity_card">
                                                      @if ($errors->has('dealer_identity_card'))
                                                          <span
                                                              class="text-danger ">{{ $errors->first('dealer_identity_card') }}</span>
                                                      @endif
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th width="30%">Documents</th>
                                                  <td width="2%">:</td>
                                                  <td class="set-scr"><input type="file" name="dealer_documents">
                                                      <br>
                                                      @if ($errors->has('dealer_documents'))
                                                          <span
                                                              class="text-danger">{{ $errors->first('dealer_documents') }}</span>
                                                      @endif
                                                  </td>

                                              </tr>
                                              

                                          </table>
                                      </div>
                                  </div>
                                  @else
                                  <div class="card shadow-sm">
                                      <div class="card-header bg-transparent border-0">
                                          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Uploaded ID And Documents
                                          </h3>
                                      </div>
                                      <div class="card-body pt-0 resp-set">
                                          <table class="table table-bordered">
                                              
                                              <tr>
                                                  <th width="3%">ID</th>
                                                  <td width="2%">:</td>
                                                  <td class="set-scr">
                                                      <img src="{{ asset('/dealers/documents/'.$dealers->userDetails->dealer_identity_card) }}" width="400px" height="200px">
                                                      
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th width="3%">Documents</th>
                                                  <td width="2%">:</td>
                                                  <td class="set-scr"> <img src="{{ asset('/dealers/documents/'.$dealers->userDetails->dealer_documents) }}" width="400px" height="200px">
                                                  </td>

                                              </tr>
                                              

                                          </table>
                                      </div>
                                  </div>
                                  @endif
                               
                                  </div>

                          </div>

                      </div>

                  </div>
              </div>


          </div>
      </div>

  </section>
</div>
</div>
@endsection

