@extends('frontend.dealer.layouts.app')
@section('title', 'Dealer Profile')
@section('section')

    <!-- SECTION-1 -->
    <section class="sec-2 productPageTn">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3 productsFiltersCol">
                    <div class="productsFilters">
                        @include('frontend.dealer.include.biddsOffer')
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">

                    <div class="row">
                        <h4>Your Account Details</h4>
                        <br>
                        <form method="POST" action="{{ route('updateMyProfileDealer', $currentUser->id) }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $currentUser->name }}" placeholder="Full Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Post Code</label>
                                <input type="text" name="post_code" class="form-control"
                                    value="{{ $currentUser->post_code }}" placeholder="Post Code">
                                @if ($errors->has('post_code'))
                                    <span class="text-danger">{{ $errors->first('post_code') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Phone Number</label>
                                <input type="number" name="phone_number" class="form-control"
                                    value="{{ $currentUser->phone_number }}" placeholder="+44 01548544">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Email address </label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $currentUser->email }}" id="inputCity" placeholder="abc@gmail.com">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>


                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <!-- BOX-1 -->

                    </div>
                    <br>
                    <div class="row">
                        <h4>Update Your Password</h4>
                        <br>
                        <form method="POST" action="{{ route('updateMyPasswordDealer', $currentUser->id) }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Current Password *</label>
                                    <input type="text" name="current_pass" class="form-control"
                                        placeholder="Enter Your Old Password">
                                    @if ($errors->has('current_pass'))
                                        <span class="text-danger">{{ $errors->first('current_pass') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputAddress">New Password *</label>
                                <input type="text" name="new_pass" class="form-control"
                                    placeholder="Enter New Password">
                                @if ($errors->has('new_pass'))
                                    <span class="text-danger">{{ $errors->first('new_pass') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Confirm New Password *</label>
                                <input type="text" name="confirm_pass" class="form-control"
                                    placeholder="Confirm New Password">
                                @if ($errors->has('confirm_pass'))
                                    <span class="text-danger">{{ $errors->first('confirm_pass') }}</span>
                                @endif
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
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

                    if (response.success == 'success') {
                        $("#vehicle_registration_details").html(
                            '<div class="container-1151"><div class="row"><div class="sec-1-txt col-lg-6"><h2>' +
                            response.users.name + ' <span>Motorific</span></h2><p>' + response.users
                            .email +
                            '</p><form id="myForm">@csrf Confirm mileage<input type="text" id="id" name="vehicle_registration_no" value="111" placeholder="Enter REG"><button id="submitid" type="submit" >Continue</button></form></div><div class="sec-1-img col-lg-6"><img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt=""></div><div id="title"></div></div></div>'
                            );
                        $("#vehicle_registration").hide();
                        window.history.pushState({
                            "html": "abcdefg"
                        }, "", "mileage");
                    } else {
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
