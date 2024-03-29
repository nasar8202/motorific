@extends('frontend.dealer.layouts.app')
@section('title','Purchase your dealership Stock With motorific')
@section('section')
<!-- form css -->
<style>

</style>


<!--Dealer User Reg Form-->
<!--<section class="userform-sec user-dealer reg">-->
<!--    <div class="container-1151">-->
<!--        <div class="form-box">-->
<!--            <h2>Sign Up Your User Account</h2>-->
<!--            <p>Fill all form field to go to next step</p>-->
<!--            <div class="errorBox">-->
<!--                @if ($errors->any())-->
<!--                    <div class="alert alert-danger">-->
<!--                        <ul>-->
<!--                            @foreach ($errors->all() as $error)-->
<!--                                <li>{{ $error }}</li>-->
<!--                            @endforeach-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                @endif-->
<!--            </div>-->
<!--                <form id="" action="{{ route('register.post.step.1') }}" method="POST" enctype="multipart/form-data" autocomplete="false">-->
<!--                    @csrf-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-group">-->
<!--                                <label>Full name *</label>-->
<!--                                <input type="text" name="name" placeholder="" value="{{ session()->get('name')?? old('name') }} form-control" >-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-group">-->
<!--                                <label>Email address *</label>-->
<!--                                <input type="email" name="email" value="{{ session()->get('email') ?? old('email')}} form-control" >-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-group">-->
<!--                                <label>Password *</label>-->
<!--                                <input type="password" name="password" value="{{ session()->get('password') }} form-control" >-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-group">-->
<!--                                <label>Company Name *</label>-->
<!--                                <input type="text" name="company_name" placeholder="Enter name" value="{{ session()->get('company_name') ?? old('company_name') }}" >-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <div class="form-group">-->
<!--                                <label>Mobile number (11 digits) *</label>-->
<!--                                <input type="number" name="phone_number" value="{{ session()->get('phone_number') ?? old('phone_number') }}" >-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group form-btn">-->
<!--                            <button>Continue</button>-->
<!--                            <a href="{{route('DealerLogin')}}">If You Have Already Account. <strong>Login</strong></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--Dealer User Reg Form End-->

<!-- MultiStep Form -->
<div class="container-fluid logins-container" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-10 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Sign Up Your User Account</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- @dd(session()->get('register')) --}}
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Your details</strong></li>
                                <li id="personal"><strong>Dealership details</strong></li>
                                {{-- <li id="payment"><strong>Purchasing requirements</strong></li> --}}
                            </ul>
                            <!-- fieldsets -->
                            <form id="msform" class="dealerlogins" action="{{ route('register.post.step.1') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Your details</h2>
                                    <div class="form-group">
                                        <label>Full name *</label>
                                        <input type="text" name="name" placeholder="Enter name" value="{{ session()->get('name')?? old('name') }}" >

                                    </div>
                                    <div class="form-group">
                                        <label>Email address *</label>
                                        <input type="email" name="email" value="{{ session()->get('email') ?? old('email')}}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Password *</label>
                                        <input type="password" name="password" value="{{ session()->get('password') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name *</label>
                                        <input type="text" name="company_name" placeholder="Enter name" value="{{ session()->get('company_name') ?? old('company_name') }}" >
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Position *</label>
                                        <select name="position" >
                                            <option selected="" value="">Select position</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "Buyer" ? 'selected' :  '' }} value="Buyer" @endif>Buyer</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "CEO / Managing Director" ? 'selected' :  '' }} value="CEO / Managing Director" @endif>CEO / Managing Director</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "Director" ? 'selected' :  '' }} value="Director" @endif>Director</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "Group Buyer" ? 'selected' :  '' }} value="Group Buyer" @endif>Group Buyer</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "Group Sales Manager" ? 'selected' :  '' }} value="Group Sales Manager" @endif>Group Sales Manager</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "" ? 'selected' :  '' }} value="Owner / Proprietor" @endif>Owner / Proprietor</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "Sales Manager" ? 'selected' :  '' }} value="Sales Manager" @endif>Sales Manager</option>
                                            <option @if(session()->get('position') != null) {{ session()->get('position') == "Stock Controller" ? 'selected' :  '' }} value="Stock Controller" @endif>Stock Controller</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Mobile number (11 digits) *</label>
                                        <input type="number" name="phone_number" value="{{ session()->get('phone_number') ?? old('phone_number') }}" >
                                    </div>

                                    {{-- <div class="form-group">
                                        <select name="hear_about_us">
                                            <option value="">Select how you heard about us</option>
                                            <option @if(session()->get('hear_about_us') != null) {{ session()->get('hear_about_us') == "Search engine" ? 'selected' :  '' }} value="Search engine" @endif >Search engine</option>
                                            <option @if(session()->get('hear_about_us') != null) {{ session()->get('hear_about_us') == "TV" ? 'selected' :  '' }} value="TV" @endif>TV</option>
                                            <option @if(session()->get('hear_about_us') != null) {{ session()->get('hear_about_us') == "Radio" ? 'selected' :  '' }} value="Radio" @endif>Radio</option>
                                            <option @if(session()->get('hear_about_us') != null) {{ session()->get('hear_about_us') == "Printed advert" ? 'selected' :  '' }} value="Printed advert" @endif>Printed advert</option>
                                            <option @if(session()->get('hear_about_us') != null) {{ session()->get('hear_about_us') == "Event" ? 'selected' :  '' }} value="Event" @endif>Event</option>
                                            <option @if(session()->get('hear_about_us') != null) {{ session()->get('hear_about_us') == "Word of mouth" ? 'selected' :  '' }} value="Word of mouth" @endif>Word of mouth</option>
                                            <option @if(session()->get('hear_about_us') != null) {{ session()->get('hear_about_us') == "Other" ? 'selected' :  '' }} value="Other" @endif>Other</option>
                                        </select>
                                    </div> --}}
                                    {{-- <div class="form-group radio-group">
                                        <label for="policy">
                                            <input type="radio" name="privacy_policy" value="1"  id="policy" checked>
                                            <span>I have read the <a href="" rel="noopener noreferrer" target="_blank" >Privacy Policy</a> and accept the <a class="SignupPage_termsLink__GuXm5" href="" rel="noopener noreferrer" target="_blank">Terms &amp; Conditions</a>.</span>
                                        </label>
                                    </div> --}}
                                </div>
                                {{-- <button type="submit"  class="next action-button">Next Step</button> --}}
                                <button type="submit" class="btn btn-primary">Next Step</button>
                            </fieldset>

                            <span>If You Have Already Account. <a style="text-decoration: none;" href="{{route('DealerLogin')}}"> Login</a></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


