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
                <a href="#">
                    <li>How It Works</li>
                </a>
                <a href="#">
                    <li>Reviews</li>
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

                    <a href="{{ route('DealerLogin') }}">For Dealers</a>


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

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">My Account</a>
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
                    <li><a  href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- SECTION-1 -->
<section class="sec-2 productPageTn">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-3 productsFiltersCol">
                <div class="productsFilters">
                   @include('frontend.seller.partials.myAccountSidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-9">

                <div class="row">
                    <h4>Bids On This  Vehicle</h4>
                    <br>
                    <div class="col-lg-12 col-md-12">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vehilce Name</th>
                                <th scope="col">Vehicle Price</th>
                                <th scope="col">Bided User</th>
                                <th scope="col">Bided Price</th>
                                <th scope="col">Bided Assign To</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $key=>$order)
                                <tr>

                                <td>{{$key + 1}}</td>
                                <td>{{$order->vehicle->vehicle_name}}</td>
                                <td>{{$order->vehicle->vehicle_price}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->bid_price}}</td>
                                @if($order->status == 1)
                                <td><span class="btn btn-warning">Solded User</span>
                                    <button type="button" class="btn btn-outline-primary block " data-bs-toggle="modal"
                                    data-bs-target="#default">
                                    View Meeting
                                </button>
                                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel1">Your Meeting Schedule</h5>
                                            <button type="button" class="close rounded-pill"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <span>Your Meeting Date And Time </span>

                                          <b>@if($order->meeting_date_time == null)
                                           No Meeting Has Been Schedule Yet
                                           @else
                                           {{$order->meeting_date_time}}
                                       @endif
                                       </b>
                                          <br>
                                          <form class="mt-4" method="POST" action="{{route('meetingBidStatus')}}">
                                           @csrf
                                           <span>Tell Us Your Meeting Status ?</span>
                                           <input type="hidden"  name="id" value="{{$order->id}}">
                                           <select class="form-control " name="status" required>
                                               <option disabled selected>Select Status</option>
                                               <option value="Pending">Pending</option>
                                               <option value="Completed">Completed</option>
                                               <option value="No Response From Dealer">No Response From Dealer</option>
                                           </select>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button type="disable" class="btn btn-primary ml-1 {{$order->meeting_date_time ?? 'disabled'}}">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Update</span>
                                            </button>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                               </div>
                            </td>
                                    @else

                                 <td>   <span class="btn btn-info">Not Sold User</span>
                                 </td>
                                    @endif
                                @empty
                                <td>No Order Found On This Vehicle</td>

                            </tr>
                            @endforelse
                            </tbody>
                          </table>
                        <br>

                    </div>
                    <!-- BOX-1 -->

                </div>

            </div>
        </div>
    </div>
    </section>
@endsection
@push('child-scripts')
<script type="text/javascript">

    $("#myform").on("submit", function(e) {
           e.preventDefault(); // prevent the form submission

           $.ajax({
               type: "post",
               dataType: 'JSON',
               url: '{{ route('users') }}',
               data: $('#myform').serialize(), // serialize all form inputs
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function(response) {

                if(response.success=='success')
                {
                     $("#vehicle_registration_details").html('<div class="container-1151"><div class="row"><div class="sec-1-txt col-lg-6"><h2>'+response.users.name+' <span>Motorific</span></h2><p>'+response.users.email+'</p><form id="myForm">@csrf Confirm mileage<input type="text" id="id" name="vehicle_registration_no" value="111" placeholder="Enter REG"><button id="submitid" type="submit" >Continue</button></form></div><div class="sec-1-img col-lg-6"><img src="{{ URL::asset("frontend/seller/assets/image/sec-1-vector.png") }}" alt=""></div><div id="title"></div></div></div>');
                     $("#vehicle_registration").hide();
                     window.history.pushState({"html":"abcdefg"},"", "mileage");
                }else{
                    console.log("some thing wrong")
                }
               },
               error: function(data) {
                   console.log(data)
               }
           });
       });
</script>
@endpush
